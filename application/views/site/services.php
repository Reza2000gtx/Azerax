<?php include_once 'include/header.php'; ?>


<section class="home_banner_area banner_services">
  <div class="banner_inner d-flex align-items-center" style="padding-bottom: 30px;">
    <div class="container">
      <div class="banner_content row">
         <div class="col-lg-5">
          <h3>Services</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
       <!--    <a class="main_btn" href="#">Read More</a> -->
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
         <!--  <div class="halemet_img">
            <img src="img/about.png" alt="">
          </div> -->
        </div>
       
        
      </div>
    </div>
  </div>
</section>


<section class="services">
  <div class="container">
<div class="row gy-4">
<?php
$result = $this->common_model->GetAllData('service');
 foreach ($result as $value) {
?>
          <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <span class="lnr "><img height="200px" width="200px"src="<?php echo base_url()."application/views/admin/ServiceImages/".$value["image"].""; ?>" /></span>
              <h3><?php echo $value["product"]; ?></h3>
              <p><?php echo $value["description"]; ?></p>
              <a href="#" class="read-more"><span>Read More</span> <span class="lnr lnr-arrow-right"></span></a>
            </div>
          </div>
<?php } ?>


        </div>

</div></section>

<?php include_once 'include/footer.php'; ?>