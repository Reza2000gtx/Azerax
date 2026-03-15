<?php 
   include_once('include/header.php');
    $id = $_REQUEST['id'];
?>
<style type="text/css">
   .upload-btn-wrapper {
   position: relative;
   overflow: hidden;
   display: inline-block;
   }
   .upload-btn-wrapper input[type=file] {
   font-size: 100px;
   position: absolute;
   left: 0;
   top: 0;
   opacity: 0.01;
   }
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
          Product Detail<!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>  Product Detail</a></li>
         <li class="active"><a href="#"> Product Detail</a></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div id="Error"></div>
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Product Detail</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form method="post" name="editForm" readonly id="editForm" onsubmit="edit_function(event);">
                   <div class="modal-body">

                  <div class="form-group">
                    <label for="title">Ordering Information</label>
                    <input type="text" class="form-control" readonly name="title" value="<?=$product_detail['order_code']?>" required>
                  </div>

                  <div class="form-group">
                        <label for="title">Release notes</label>
                        <textarea name="description" readonly class="form-control textarea" ><?=$product_detail['release_version']?></textarea>
                  </div>


                  <div class="form-group">
                    <label for="title">Released date</label>
                    <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y', strtotime($product_detail['date_released']));?>" name="price" required>
                  </div>


                  <div class="form-group">
                    <label for="title">Latest Firmware Version</label>
                    <input type="text" class="form-control" readonly value="<?php echo $product_detail['latest_firmware_version'];?>" >
                  </div>

                 

                  <div class="form-group">
                    <label for="title">Device manual brochure</label>
                    <br><?php
if ($product_detail['device_manual_brochure']) {
  ?>
<a class="btn btn-xs btn-info" download href="<?php echo base_url();?>assets/pdf/<?php echo $product_detail['device_manual_brochure'];?>">Download</a>
<?php 
} else { echo "No file available or exist";}
?>  
                  </div>


                  <div class="form-group">
                    <label for="title">Dealer website</label>
                    <br><a class="btn btn-xs btn-danger" href="<?php echo $product_detail['dealer_web_cont'];?>" target="_blank">Go</a>
                  </div>

                  <div class="form-group">
                    <label for="title">Dealer Contact</label>
                    <input type="text" class="form-control" readonly value="<?php echo $product_detail['dealer_contact'];?>" >
                  </div>

                  <div class="form-group">
                    <label for="title">Mechanical Demension</label>
                    <input type="text" class="form-control" readonly value="<?php echo $product_detail['mechanical_demension_mounting'];?>" >
                  </div>
                  
                  <div class="form-group">
                    <label for="title">Rack Unit</label>
                    <input type="text" class="form-control" readonly value="<?php echo $product_detail['rack_unit'];?>" >
                  </div>

                  <div class="form-group">
                    <label for="title">Dealer Notes</label>
                    <input type="text" class="form-control" readonly value="<?php echo $product_detail['dealer_notes'];?>" >
                  </div>


                  <div class="form-group">
                    <label for="title">Process Standard</label>
                    <br><?php

$process_stand = explode(",", $product_detail['process_stand']);
foreach ($process_stand as $stand) {
  echo $stand."<br>";
}

?>
                  </div>

                  <div class="form-group">
                    <label for="title">Process</label>
                    <br><?php
$parts = explode(",", $product_detail['process']);
foreach ($parts as $process) {
  echo $process."<br>";
}

?>
                  </div>

                  <div class="form-group">
                    <label for="title">Input Details</label>
                    <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["input_conn"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
  
}

?>  
                  </div>

                  <div class="form-group">
                    <label for="title">Input Standard</label>
                    <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["input_process_stand"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
}

?>
                  </div>

                  <div class="form-group">
                    <label for="title">Input Connection Type</label>
                    <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["process_connection"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
}

?>  
                  </div>

                  <div class="form-group">
                    <label for="title">Output Details</label>
                    <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["out_conn"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
}

?>  
                  </div>

                  <div class="form-group">
                    <label for="title">Output Standard</label>
                   <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["out_process_stand"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
}

?>
                  </div>


                  <div class="form-group">
                    <label for="title">Output Connection Type</label>
                  <br><?php
foreach ($inputOutput as $Input) {
  $parts = explode(",", $Input["out_process_connection"]);
  foreach ($parts as $value) {
    echo $value."<br>";
  }
}

?>  
                  </div>


                  <div class="form-group">
                    <label for="title">Warranty Details</label>
                    
                    <textarea name="description" readonly class="form-control textarea" ><?php echo $product_detail['warranty_detail'];?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="title">Support Details</label>
                    
                    <textarea name="description" readonly class="form-control textarea" ><?php echo $product_detail['support_detail'];?></textarea>
                  </div>





                  
                   

                  
                 
                 


                  <div class="form-group">
                        <label class=" form-control-label">Gallery 
                        </label>
                        
                        <div  id="preview" class="ddd__uus row">
                           <?php
         $product_gallery = $this->common_model->GetAllData('product_gallery_image',array('product_id'=>$product_detail['id']));
//print_r($product_gallery);

                              foreach ($product_gallery as $key => $gallery) {
                                ?>
                           <div class="col-md-2" id="cancel<?=$key?>">
                              <div class="img_div">
                                 <img style="height: 100px;" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>"><br>
                                 <input type="hidden"  value="<?=$gallery['id']?>" name="gallery-image-id[]">
                                 
                                
                              </div>
                           </div>
                           <?php  
                              }
                              ?>
                        </div>
                     </div>


                  
                  <div id="editError"></div>
                  <input type="hidden" name="id" value="<?=$product_detail['id']?>" required>
                </div>
                
        <!-- Dynamic Content -->
                </form>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include_once('include/footer.php'); ?>
