<?php include_once 'include/header.php' ; ?>


<?php echo $product_detail['id'];?>

<div class="row flex-row-reverse m-0">
			<div class="col-lg-2">
				<div class="google_ad product_image_area">
					<img src="<?php echo base_url();?>assets/site/img/google_ad.png">
				</div>
			</div>

			<div class="col-lg-10">
				<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


							<div class="carousel-inner">
								<?php

								$j=1;
         $product_gallery = $this->common_model->GetAllData('product_gallery_image',array('product_id'=>$product_detail['id']));
//print_r($product_gallery);

                              foreach ($product_gallery as $key => $gallery) {

                              	                              	$active1 = '';
                              	if($j==1 || count($product_gallery)==1){
                              		$active1 = 'active';
                              	}
                                ?>
								<div class="carousel-item <?php echo $active1 ?>">
									<img class="d-block w-100" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>" alt="First slide">
								</div>
							
								<?php   $j++;
                              }
                              ?>
							</div>
							<ol class="carousel-indicators">
								<?php
$i = 1;
                              foreach ($product_gallery as $key => $gallery) {
                              	$active = '';
                              	if($i==1 || count($product_gallery)==1){
                              		$active = 'active';
                              	}
                                ?>

								<li data-target="#carouselExampleIndicators" data-slide-to="<?=$i-1;?>" class="<?php echo $active ?>">
									<img src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>" alt="">
								</li>
								<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1">
									<img src="img/pro2.png" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2">
									<img src="img/pro3.jpg" alt="">
								</li> -->
								<?php  $i++;
                              }
                              ?>
							</ol>

						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="s_product_text detail-righ">
						<!-- <h3><?php echo $product_detail['title'];?></h3>
						<h2>$<?php echo $product_detail['price'];?></h2> -->



					<ul class="list">
						<?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$product_detail['manufacturer_id']));  ?>
						
						<li><h4><?php echo $product_detail['device_model'];?></h4></li>
						<li><h5>Brand: <?php echo $product_detail['device_brand'];?></h5></li>
						<!-- <li><a class="active" href="#"><span>Manufacturer:</span> : <?=$manufacturer['name']?></a></li> -->

						<!-- <li><a href="#"><span> Manufacturer Part No: </span> : <?php echo $product_detail['manufacturer_part_no'];?></a></li> -->
						<li><span>Ordering Information</span> <?php echo $product_detail['order_code'];?></li>
						<li><span>Release notes</span> <?php echo $product_detail['release_version'];?></li>
						<li><span>Released date</span> <?php echo date('d-m-Y', strtotime($product_detail['date_released']));?></li>
						<li><span>Latest Firmware Version</span> <?php echo $product_detail['latest_firmware_version'];?></li>
						<li><span>Device manual brochure</span> 
<?php
if ($product_detail['device_manual_brochure']) {
	?>
<a class="btn btn-xs btn-info" download href="<?php echo base_url();?>assets/pdf/<?php echo $product_detail['device_manual_brochure'];?>">Download</a>
<?php	
} else { echo "No file available or exist";}
?>							
						</li>						
						<li><span>Dealer Contact</span> <?php echo $product_detail['dealer_contact'];?></li>
						<li><span style="width:100%;">Mechanical Demension</span> <?php echo $product_detail['mechanical_demension_mounting'];?></li>
						<li><span style="width:100%;"> Rack Units</span> <?php echo $product_detail['rack_unit'];?></li>
						<li><span style="width:100%;">Dealer Notes</span><br> <?php echo $product_detail['dealer_notes'];?></li>
						<!-- <li><a href="#"><span> Product Range: </span> : <?php echo $product_detail['product_range'];?></a></li> -->
					</ul>


						<!-- <p><?php echo $product_detail['description'];?></p> -->

						<!-- <div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div> -->
						<div class="card_area">
							<!--<a class="main_btn" onclick="alert('comming soon');" href="#">Add to Cart</a>-->
							<!-- <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a> -->
							
							
							<!--<a class="icon_btn" onclick="alert('comming soon');" href="#"><i class="lnr lnr lnr-heart"></i></a>-->
							
							<?php if($this->session->userdata('user_id')){?>
						
						<?php

						 $is_like = $this->common_model->GetSingleData('fav_device_list',array('device_id'=>$product_detail['id'],'user_id'=>$this->session->userdata('user_id')));
						 //echo $this->db->last_query();
						?>
					

						<?php if($is_like){ ?> 
						
						<a class="icon_btn" href="<?php echo base_url();?>fav-device-remove/<?php echo $product_detail['id'] ; ?>" style="color: #dc3545;"><i class="fa fa-heart"></i></a>
						 
						 <?php } else{ ?>
						 
						 <a class="icon_btn" href="<?php echo base_url();?>fav-device/<?php echo $product_detail['id'] ; ?>"><i class="lnr lnr lnr-heart"></i></a>
						  
						  <?php }?>

						<?php }else{}?>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			</div>

		</div>




<div class="row flex-row-reverse m-0">
			<div class="col-lg-2">
				<div class="google_ad product_image_area">
					<img src="<?php echo base_url();?>assets/site/img/google_ad.png">
				</div>
			</div>

			<div class="col-lg-10">
		<section class="product_description_area">
							<div class="container">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

										<p>Warranty Details : <?php echo $product_detail['warranty_detail'];?></p>
										<p>Support Details : <?php echo $product_detail['support_detail'];?></p>
										<!-- <p><?php echo $product_detail['description'];?></p> -->
										<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->
									</div>
									<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<!-- <tr>
														<td>
															<h5>Manufacturer:</h5>
														</td>
														<td>
															<h5><?=$manufacturer['name']?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5> Manufacturer Part No:</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['manufacturer_part_no'];?></h5>
														</td>
													</tr> -->
													<tr>
														<td>
															<h5>Ordering Information</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['order_code'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Release notes</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['release_version'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Device Model</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['device_model'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Device brand</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['device_brand'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Latest Firmware Version</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['latest_firmware_version'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Mechanical Demension</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['mechanical_demension_mounting'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Rack Units</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['rack_unit'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Dealer website</h5>
														</td>
														<td>
														<a class="btn btn-xs btn-danger" href="<?php echo $product_detail['dealer_web_cont'];?>" target="_blank">Go</a>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Dealer Contact</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['dealer_contact'];?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Dealer Notes</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['dealer_notes'];?></h5>
														</td>
													</tr>
													<tr>
													<td>
															<h5>Process Standard</h5>
														</td>
														<td>
															<h5>
<?php

$process_stand = explode(",", $product_detail['process_stand']);
foreach ($process_stand as $stand) {
	echo $stand."<br>";
}

?></h5>
														</td>
													</tr>
													<tr>
													<td>
															<h5>Process</h5>
														</td>
														<td>
															<h5>
<?php
$parts = explode(",", $product_detail['process']);
foreach ($parts as $process) {
	echo $process."<br>";
}

?></h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Input Details</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["input_conn"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
	
}

?>	
</h5>
														</td>
													</tr>
													<tr>
														<td>
										<h5>Input Standard</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["input_process_stand"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
}

?>	
</h5>
														</td>
													</tr>
													<tr>
														<td>
											<h5>Input Connection Type 
</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["process_connection"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
}

?>	
</h5>
														</td>
													</tr>
													<tr>
														<td>
															<h5>Output Details</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["out_conn"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
}

?>	
</h5>
														</td>
													</tr>
													<tr>
														<td>
										<h5>Output Standard</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["out_process_stand"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
}

?>	
</h5>
														</td>
													</tr>
													<tr>
														<td>
											<h5>Output Connection Type 
</h5>
														</td>
														<td>
<h5>
<?php
foreach ($inputOutput as $Input) {
	$parts = explode(",", $Input["out_process_connection"]);
	foreach ($parts as $value) {
		echo $value."<br>";
	}
}

?>	
</h5>
														</td>
													</tr>


													<!-- <tr>
														<td>
															<h5>Product Range</h5>
														</td>
														<td>
															<h5><?php echo $product_detail['product_range'];?></h5>
														</td>
													</tr> -->
													
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
										<div class="row">
											<div class="col-lg-6">
												<div class="comment_list">
													<div class="review_item">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-1.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<h5>12th Feb, 2021 at 05:56 pm</h5>
																<a class="reply_btn" href="#">Reply</a>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
													<div class="review_item reply">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-2.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<h5>12th Feb, 2021 at 05:56 pm</h5>
																<a class="reply_btn" href="#">Reply</a>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
													<div class="review_item">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-3.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<h5>12th Feb, 2021 at 05:56 pm</h5>
																<a class="reply_btn" href="#">Reply</a>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="review_box">
													<h4>Post a comment</h4>
													<form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
														<div class="col-md-12">
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
															</div>
														</div>
														<div class="col-md-12 text-right">
															<button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
										<div class="row">
											<div class="col-lg-6">
												<div class="row total_rate">
													<div class="col-6">
														<div class="box_total">
															<h5>Overall</h5>
															<h4>4.0</h4>
															<h6>(03 Reviews)</h6>
														</div>
													</div>
													<div class="col-6">
														<div class="rating_list">
															<h3>Based on 3 Reviews</h3>
															<ul class="list">
																<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="review_list">
													<div class="review_item">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-1.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
													<div class="review_item">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-2.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
													<div class="review_item">
														<div class="media">
															<div class="d-flex">
																<img src="<?php echo base_url();?>assets/site/img/product/single-product/review-3.png" alt="">
															</div>
															<div class="media-body">
																<h4>Blake Ruiz</h4>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="review_box">
													<h4>Add a Review</h4>
													<p>Your Rating:</p>
													<ul class="list">
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
													</ul>
													<p>Outstanding</p>
													<form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
														<div class="col-md-12">
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
															</div>
														</div>
														<div class="col-md-12 text-right">
															<button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>





<?php include_once 'include/footer.php' ; ?>