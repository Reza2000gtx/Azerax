<?php include_once 'include/header2.php'; ?>

<style>
.az-page-hero {
    background: #14213D;
    padding: 40px;
    text-align: center;
    margin-top: -20px;
}
.az-page-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 6px;
}
.az-page-hero p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(255,255,255,0.5);
    margin: 0;
}
.az-listing-body {
    background: #F5F5F5;
    padding: 32px 40px;
    min-height: calc(100vh - 280px);
}
.az-listing-inner { max-width: 1100px; margin: 0 auto; }
.boder_image {
    display: flex !important;
    flex-direction: row !important;
    position: static !important;
    padding: 16px !important;
    min-height: auto !important;
    gap: 20px;
    align-items: center;
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    margin-bottom: 16px;
    transition: border-color 0.2s;
}
.boder_image:hover { border-color: #FCA311; }
.f_p_img {
    width: 160px !important;
    height: 120px !important;
    flex-shrink: 0 !important;
    position: static !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: #F5F5F5;
    border-radius: 8px;
    overflow: hidden;
}
.f_p_img img {
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: contain !important;
    width: auto !important;
    height: auto !important;
}
.contt { flex: 1 !important; min-width: 0 !important; padding: 0 !important; }
.contt h4 a {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #14213D;
    text-decoration: none;
}
.contt h4 a:hover { color: #FCA311; }
.contt h4 span {
    display: block;
    font-size: 13px;
    color: #999;
    font-weight: 400;
    margin-top: 4px;
}
.contt h4 { margin-bottom: 12px; }
.btn-remove {
    background: transparent;
    color: #dc3545;
    border: 1.5px solid #dc3545;
    padding: 7px 16px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
}
.btn-remove:hover { background: #dc3545; color: #fff; }
.print-success { display: none; }

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.az-listing-body {
    flex: 1;
}
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>My Favourites</h1>
    <p>Broadcast devices you've saved for reference</p>
</div>

<!-- Body -->
<div class="az-listing-body">
    <div class="az-listing-inner">

        <?php echo $this->session->flashdata('message'); ?>
        <div class="alert alert-success print-success"><ul></ul></div>

        <?php if(!empty($productlist)): ?>
        <?php foreach ($productlist as $row):
            $product = $this->common_model->GetSingleData('product', array('id' => $row['device_id']));
            $imageFirst = $this->common_model->GetSingleData('product_gallery_image', array('product_id' => $row['device_id']));
        ?>
        <div class="col-sm-12 list_page<?php echo $row['id']; ?>" style="padding:0;">
            <div class="boder_image">
                <div class="f_p_img">
                    <a href="<?php echo base_url(); ?>details/<?=$product['id']?>">
                    <?php if($imageFirst['gallery_image']): ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
                    <?php endif; ?>
                    </a>
                </div>
                <div class="contt">
                    <h4>
                        <a href="<?php echo base_url(); ?>details/<?=$product['id']?>"><?=$product['device_model']?></a>
                        <span><?=$product['device_brand']?> <span style="color:#BCC0C4;font-size:11px;font-weight:500;letter-spacing:0.5px;margin-left:8px;">ID: <?=$product['id']?></span></span>
                    </h4>
                    <button class="btn-remove" onclick="confirm('Remove from favourites?') ? deleteproduct(<?php echo $row['id']; ?>) : ''">
                        ♥ Remove from favourites
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div style="text-align:center;padding:60px 0;">
            <p style="font-family:'Inter',sans-serif;font-size:16px;color:#999;">You haven't saved any favourites yet.</p>
            <a href="<?php echo base_url(); ?>search-listing" style="background:#FCA311;color:#14213D;padding:12px 28px;border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;text-decoration:none;">Browse devices</a>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include_once 'include/footer2.php'; ?>

<script>
function deleteproduct(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>Product/deletefavproduct?id=" + id,
        success: function(html){
            $(".list_page" + id).fadeOut('slow');
            $(".print-success").find("ul").html('').append('Removed from favourites.');
            $(".print-success").css('display', 'block').delay(4000).fadeOut();
        }
    });
}
</script>