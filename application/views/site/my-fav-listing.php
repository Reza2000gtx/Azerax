<?php include_once 'include/header.php' ; ?>
<style type="text/css">
	.banner_name_page{
		width: 100%;
		background-image: url('img/banner222.jpg');
		background-color: rgba(0,0,0,.6);
		box-sizing: border-box;
		background-size: 100%;
		border-radius: 15px;
		background-position: top;
	}


</style>

<section class="banner_area add_product_img">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>My Favorite Listing </h2>
				<div class="page_link">
					<a href="<?php echo base_url();?>">Home</a>
					<a href="<?php echo base_url();?>my-product-listing">My Favorite Listing</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cat_product_area">
	<?php echo $this->session->flashdata('message'); ?>
		<div class="alert alert-success print-success" style="display:none">
          <ul></ul>
        </div>
	<div class="container-fluid">
		<div class="row flex-row-reverse">
	 		<div class="latest_product_inner row">

	<?php 

foreach ($productlist as $row) {

$product = $this->common_model->GetSingleData('product',array('id'=>$row['device_id']));

$imageFirst = $this->common_model->GetSingleData('product_gallery_image',array('product_id'=>$row['device_id']));

?>
	<div class="col-sm-12 list_page<?php echo $row['id']; ?>">
		<div class="boder_image">
			<div class="f_p_img">
			<?php if($imageFirst['gallery_image']){ ?>
			<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
			<?php } else { ?>
			<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
			<?php } ?>
			</div>
		<div class="contt">
		<!-- ?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$row['manufacturer_id']));  ?> -->
		<!-- <h4><a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$manufacturer['name']?></a></h4> -->
	<h4><a href="<?php echo base_url();?>details/<?=$product['id']?>"><?=$product['device_model']?></a><span><?=$product['device_brand']?><br>
				<?=substr($product['dealer_notes'],0,200)?>...<br>
				</span>
	</h4>
		
	 	<a class="btn main_btn signup_btn" onclick="confirm('Are you sure want to delete this product?')? deleteproduct(<?php echo $row['id']; ?>):'' ;" href="javascript:void(0)"  >Remove</a>

			</div>
		</div>
	</div>
<?php } ?>
					
		</div>
	
</div>
	</div>
</section>

<?php include_once 'include/footer2.php' ; ?>

<script type="text/javascript">
	function deleteproduct(id){  
	$.ajax({
        type: 'POST', 
        url: "<?php echo base_url(); ?>Product/deletefavproduct?id="+id,
        beforeSend:function()
    {
     // $('.btn-load-addMoreSpecilities').show();
    },
    success:function(html)
    { 
        $(".list_page" + id).fadeOut('slow');         
        $(".print-success").find("ul").html('');
        $(".print-success").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success").find("ul").append('Success! Product has been deleted successfully.');
        $('.print-success').fadeIn('slow', function(){
        $('.print-success').delay(4000).fadeOut(); 
        });
        return false;
    }
    });    
}
</script>