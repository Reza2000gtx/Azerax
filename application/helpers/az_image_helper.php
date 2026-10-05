<?php
/*
 * Product photos are uploaded at full size (often 1MB+) but shown small in lists and galleries.
 * az_img_url($file, 'thumb' | 'medium') returns the URL of a small WebP (or JPEG) copy - 480px or
 * 1200px wide - creating it the first time it is needed and reusing it afterwards.
 * If anything goes wrong (no image library, unreadable or huge file, folder not writable) it returns
 * the original photo's URL, so a page never breaks.
 */
if(!function_exists('az_img_bytes')){
    function az_img_bytes($v){
        $v = trim((string)$v); if($v === '' ) return 0;
        $n = (float)$v; $u = strtolower(substr($v, -1));
        if($u === 'g') $n *= 1073741824; elseif($u === 'm') $n *= 1048576; elseif($u === 'k') $n *= 1024;
        return (int)$n;
    }
}
if(!function_exists('az_img_make')){
    function az_img_make($src, $out, $max, $ext){
        $info = @getimagesize($src);
        if(!$info) return false;
        $w = (int)$info[0]; $h = (int)$info[1]; $type = $info[2];
        if($w < 1 || $h < 1) return false;
        // Memory guard: GD holds about 4-5 bytes per pixel. Ask for more if the photo is big; skip it if we still can't.
        $need = $w * $h * 5 + 16 * 1048576;
        $limit = az_img_bytes(ini_get('memory_limit'));
        if($limit > 0 && $need > $limit - memory_get_usage()){
            @ini_set('memory_limit', (string)min(512, (int)ceil($need / 1048576) + 32).'M');
            $limit = az_img_bytes(ini_get('memory_limit'));
            if($limit > 0 && $need > $limit - memory_get_usage()) return false;
        }
        switch($type){
            case IMAGETYPE_PNG:  $im = @imagecreatefrompng($src); break;
            case IMAGETYPE_JPEG: $im = @imagecreatefromjpeg($src); break;
            case IMAGETYPE_GIF:  $im = @imagecreatefromgif($src); break;
            case IMAGETYPE_WEBP: $im = function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($src) : false; break;
            default: return false;
        }
        if(!$im) return false;
        // Phone photos carry a rotation flag that browsers honour on the original; apply it to the copy too.
        if($type === IMAGETYPE_JPEG && function_exists('exif_read_data') && function_exists('imagerotate')){
            $ex = @exif_read_data($src);
            $o = isset($ex['Orientation']) ? (int)$ex['Orientation'] : 1;
            $angle = ($o === 3) ? 180 : (($o === 6) ? -90 : (($o === 8) ? 90 : 0));
            if($angle){ $r = @imagerotate($im, $angle, 0); if($r){ imagedestroy($im); $im = $r; $w = imagesx($im); $h = imagesy($im); } }
        }
        if($w > $max){ $nw = $max; $nh = max(1, (int)round($h * $max / $w)); } else { $nw = $w; $nh = $h; }
        $dst = imagecreatetruecolor($nw, $nh);
        if($ext === 'webp'){
            imagealphablending($dst, false); imagesavealpha($dst, true);
            imagefill($dst, 0, 0, imagecolorallocatealpha($dst, 0, 0, 0, 127));
        } else {
            imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
        }
        imagecopyresampled($dst, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
        $dir = dirname($out);
        if(!is_dir($dir)) @mkdir($dir, 0755, true);
        $tmp = $out.'.tmp'.getmypid();
        $ok = ($ext === 'webp') ? @imagewebp($dst, $tmp, 80) : @imagejpeg($dst, $tmp, 82);
        imagedestroy($im); imagedestroy($dst);
        if(!$ok || !is_file($tmp)){ @unlink($tmp); return false; }
        return @rename($tmp, $out);
    }
}
if(!function_exists('az_img_url')){
    function az_img_url($file, $size = 'thumb'){
        $file = basename((string)$file);
        $base = rtrim(base_url(), '/').'/assets/product_image/';
        if($file === '' || $file === '.'){ return $base.'no.jpg'; }
        $dir  = FCPATH.'assets/product_image/';
        $src  = $dir.$file;
        $orig = $base.rawurlencode($file);
        if(!is_file($src) || !function_exists('imagecreatetruecolor') || !function_exists('getimagesize')){ return $orig; }
        $max  = ($size === 'medium') ? 1200 : 480;
        $sub  = ($size === 'medium') ? 'medium' : 'thumbs';
        $ext  = (function_exists('imagewebp') && !defined('AZ_IMG_FORCE_JPEG')) ? 'webp' : 'jpg';
        $name = $file.'.'.$ext;
        $out  = $dir.$sub.'/'.$name;
        if(!is_file($out) || filemtime($out) < filemtime($src)){
            if(!az_img_make($src, $out, $max, $ext)){ return $orig; }
        }
        return $base.$sub.'/'.rawurlencode($name);
    }
}
