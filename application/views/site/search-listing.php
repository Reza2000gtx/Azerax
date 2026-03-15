<?php include_once 'include/header2.php' ; ?>
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
	.cat_product_area.p_80 {
	padding: 30px 0;
}
</style>


<section class="cat_product_area p_120">
	<div class="container-fluid">
		<div class="row flex-row-reverse ">
			<div class="col-lg-2">
				<div class="google_ad">
					<img src="<?php echo base_url();?>assets/site/img/google_ad.png">
				</div>
			</div>
			<div class="col-lg-7">
				<div class="product_top_bar">

					<div class="left_dorp">
						<select class="sorting">
							<option value="1">Default sorting</option>
							<option value="2">Default sorting 01</option>
							<option value="4">Default sorting 02</option>
						</select>

						<!-- <select class="show">
							<option value="1">Show 12</option>
							<option value="2">Show 14</option>
							<option value="4">Show 16</option>
						</select> -->
						
					</div>

					<div class="right_page ml-auto">
						<nav class="cat_page" aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item blank"><a class="page-link" href="#">...</a></li>
								<li class="page-item"><a class="page-link" href="#">6</a></li>
								<li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>

				<div class="latest_product_inner row" id="devicefilterdatalist"> 

<?php foreach ($productlist as $row) {
	$imageFirst = $this->common_model->GetSingleData('product_gallery_image',array('product_id'=>$row['id']));

 ?>
				 <div class="col-lg-4 col-md-4 col-sm-6">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
							</div>
							<!-- <?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$row['manufacturer_id']));  ?>
							<a href="<?php echo base_url();?>details/<?=$row['id']?>"><h4><?=$manufacturer['name']?></h4></a> -->
 							
								<a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$row['device_model']?></a><br>
								
									<?=$row['device_brand']?><br>
									<?=substr($row['dealer_notes'],0,200)?>...<br>
								
							
 						</div>
					</div> 
<?php } ?>

				</div>
			</div>

			<div class="col-lg-3">
				<div class="left_sidebar_area">
					<!-- <aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li>
							<a href="#">Manufacturer <span class="lnr lnr-chevron-down"></span></a>
                           <ul class="list" style="display: block;">
<?php foreach ($manufacturerlist as $row) {
	
 ?>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox<?=$row['id']?>" >
										<label for="default-checkbox<?=$row['id']?>"></label>
									</div>
									<a href="#"><?=$row['name']?></a>
								</li>
<?php  } ?> -->
								<!-- <li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox10">
										<label for="default-checkbox10"></label>
									</div>
									<a href="#">Amplifiers & Comparators </a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox11" checked> 
										<label for="default-checkbox11"></label>
									</div><a href="#">Microcontrollers - MCU</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox12">
										<label for="default-checkbox12"></label>
									</div><a href="#">Logic</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox13">
										<label for="default-checkbox13"></label>
									</div><a href="#">Drivers & Interfaces</a>
								</li> -->
						<!-- 	</ul>
						</li>
					</ul>
						</div>
					</aside>
 -->

					<!-- <aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li>
							<a href="#">Input Voltage Max <span class="lnr lnr-chevron-down"></span></a>
                           <ul class="list" style="display: block;">
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox14">
										<label for="default-checkbox14"></label>
									</div>
									<a href="#">3.3V</a>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox17" checked>
										<label for="default-checkbox17"></label>
									</div>
									<a href="#">4.3V </a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox18">
										<label for="default-checkbox18"></label>
									</div><a href="#">5.3V</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox19">
										<label for="default-checkbox1219"></label>
									</div><a href="#">6V</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox20">
										<label for="default-checkbox20"></label>
									</div><a href="#">7V</a></li>
							</ul>
						</li>
					</ul>
						</div>
					</aside> -->


					<!-- <aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li>
							<a href="#">Availability <span class="lnr lnr-chevron-down"></span></a>
                           <ul class="list" style="display: block;">
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox21">
										<label for="default-checkbox21"></label>
									</div>
									<a href="#">All</a>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox22" checked>
										<label for="default-checkbox22"></label>
									</div>
									<a href="#">Amplifiers & Comparators </a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox23">
										<label for="default-checkbox23"></label>
									</div><a href="#">Microcontrollers - MCU</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox24">
										<label for="default-checkbox25"></label>
									</div><a href="#">Logic</a></li>
								<li class="d-flex justify-content-between align-items-center">
									<div class="primary-checkbox">
										<input type="checkbox" id="default-checkbox26">
										<label for="default-checkbox26"></label>
									</div><a href="#">Drivers & Interfaces</a></li>
							</ul>
						</li>
					</ul>
						</div>
					</aside> -->

					<aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<input class="form-control" id="device_name" placeholder="Search for a devices" >
						</div>
					</aside>


					<aside class="left_widgets cat_widgets side_bar_nw">
					<center><a href="javascript:void(0);" onclick="devicefilter();" class="btn main_btn signup_btn spance_nav">
						<i style="display: none;" class="spinner fa fa-spinner fa-spin fa-fw btn-load-filter"></i>Filter
					</a></center>
					</aside>


				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once 'include/footer.php' ; ?>


<script>

function devicefilter()
{
	
	 var device_name = $('device_name').val();
	  alert(device_name);
	
	   $.ajax({
        type: 'POST',
        url: '<?php echo base_url('devicefilter'); ?>',
        data:'&device_name='+device_name,

        beforeSend: function(){
            $('.btn-load-filter').show();
        },
        success: function(html){
        	//console.log(html);

            $('#devicefilterdatalist').html(html);
            $('.btn-load-filter').fadeOut("slow");
           // $(".serach-section").scrollTop();
             window.scrollTo({ top: 0, behavior: 'smooth' });

        }
    });
}
</script>

<script>
$(document).ready(function(){
	alert("hello");
	$(".filter-show .btn").click(function(){
	(".left_sidebar_area").addClass("show-filterdiv");
	("body").addClass("hiddenover");
});
$(".close-filter").click(function(){
	(".left_sidebar_area").removeClass("show-filterdiv");
	("body").removeClass("hiddenover");
});
});
</script>



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        