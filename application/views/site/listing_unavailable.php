<?php include_once 'include/header2.php' ; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<div id="az-unavailable-content" style="max-width:520px;margin:0 auto;padding:80px 20px 0;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:flex-start;box-sizing:border-box;">
    <i class="ti ti-package-off" style="font-size:48px;color:#BCC0C4;"></i>
    <h2 style="font-family:'Inter',sans-serif;font-weight:700;color:#14213D;margin:20px 0 10px;">This listing is no longer available</h2>
    <p style="font-family:'Inter',sans-serif;color:#666;font-size:15px;line-height:1.6;margin-bottom:28px;">
        This device is no longer offered by this vendor. It may still be available from another vendor - try searching for it below.
    </p>
    <a href="<?php echo base_url(); ?>search-listing" style="display:inline-block;background:#FCA311;color:#14213D;padding:12px 32px;border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;text-decoration:none;">Search devices</a>
</div>

<script>
// The site has no genuine sticky-footer CSS anywhere, so a short page's
// footer just rides up wherever the content happens to end. Rather than
// guess a fixed height (which varies by header/footer content and screen
// size), measure the real header and footer heights directly and size
// this content area to fill exactly what's left.
(function(){
    function az_fitUnavailablePage(){
        var content = document.getElementById('az-unavailable-content');
        if(!content) return;
        var header = document.querySelector('.header_area');
        var footer = document.querySelector('.footer-area');
        var headerH = header ? header.offsetHeight : 0;
        var footerH = footer ? footer.offsetHeight : 0;
        content.style.minHeight = (window.innerHeight - headerH - footerH) + 'px';
    }
    // This script sits before the footer include in the file, so the
    // footer element doesn't exist in the page yet when this first runs -
    // wait for the whole page to finish loading before measuring it.
    if(document.readyState === 'complete'){
        az_fitUnavailablePage();
    } else {
        window.addEventListener('load', az_fitUnavailablePage);
    }
    window.addEventListener('resize', az_fitUnavailablePage);
})();
</script>

<?php include_once 'include/footer2.php' ; ?>
