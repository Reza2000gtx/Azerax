<?php 
   include_once('include/header.php');
    $id = $_REQUEST['id'];
?>
<style type="text/css">
   .az-page-section {
       background: #fff;
       border: 1px solid #EBEBEB;
       border-radius: 8px;
       padding: 24px 28px;
       margin-bottom: 20px;
   }
   .az-section-device { border-left: 4px solid #14213D; }
   .az-section-io { border-left: 4px solid #FCA311; }
   .az-section-vendor { border-left: 4px solid #14213D; }
   .az-section-header {
       display: flex;
       align-items: center;
       gap: 10px;
       margin-bottom: 18px;
   }
   .az-section-header .az-section-num {
       width: 24px; height: 24px; border-radius: 50%;
       font-size: 13px; font-weight: 600;
       display: flex; align-items: center; justify-content: center;
       flex-shrink: 0;
   }
   .az-section-device .az-section-num, .az-section-vendor .az-section-num { background: #14213D; color: #fff; }
   .az-section-io .az-section-num { background: #FCA311; color: #14213D; }
   .az-section-header .az-section-title { font-size: 15px; font-weight: 600; color: #14213D; }
   .az-field { margin-bottom: 16px; }
   .az-field label { display: block; font-size: 12px; font-weight: 600; color: #6b6f76; text-transform: uppercase; letter-spacing: 0.03em; margin-bottom: 4px; }
   .az-field .az-value { font-size: 14px; color: #14213D; }
   .az-field .az-value.az-empty { color: #aaa; font-style: italic; }
   .az-chip-group { display: flex; flex-wrap: wrap; gap: 6px; }
   .az-chip { background: #F5F5F5; border: 1px solid #E5E5E5; border-radius: 5px; padding: 3px 10px; font-size: 12.5px; color: #14213D; }
   .az-io-group { border: 1px solid #F0F0F0; border-radius: 6px; padding: 14px 16px; margin-bottom: 14px; background: #FFFDF8; }
   .az-io-group .az-io-title { font-size: 13px; font-weight: 600; color: #b97a0a; margin-bottom: 10px; }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <h1>Product Detail</h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>Admin/productlist"><i class="fa fa-dashboard"></i> Products</a></li>
         <li class="active"><a href="#">Product Detail</a></li>
      </ol>
   </section>

   <section class="content">
      <div id="Error"></div>

      <?php
      // Small helper so every empty field renders consistently rather than
      // just showing a blank space.
      function az_val($v){
          if($v === null || trim((string)$v) === ''){
              return '<span class="az-value az-empty">Not provided</span>';
          }
          return '<span class="az-value">'.htmlspecialchars($v).'</span>';
      }
      function az_chips($csv){
          $csv = trim((string)$csv);
          if($csv === ''){
              echo '<span class="az-value az-empty">Not provided</span>';
              return;
          }
          echo '<div class="az-chip-group">';
          foreach(explode(',', $csv) as $part){
              $part = trim($part);
              if($part !== '') echo '<span class="az-chip">'.htmlspecialchars($part).'</span>';
          }
          echo '</div>';
      }
      ?>

      <!-- Section 1: Device -->
      <div class="az-page-section az-section-device">
        <div class="az-section-header"><span class="az-section-num">1</span><span class="az-section-title">Device</span></div>

        <div class="row">
          <div class="col-md-3 az-field"><label>Device Model</label><?php echo az_val($product_detail['device_model']); ?></div>
          <div class="col-md-3 az-field"><label>Device Brand</label><?php echo az_val($product_detail['device_brand']); ?></div>
          <div class="col-md-3 az-field"><label>Product Type</label><?php echo az_val($product_detail['product_type']); ?></div>
          <div class="col-md-3 az-field"><label>Rack Unit</label><?php echo az_val($product_detail['rack_unit']); ?></div>
        </div>
        <div class="row">
          <div class="col-md-6 az-field"><label>Mechanical Dimensions / Mounting</label><?php echo az_val($product_detail['mechanical_demension_mounting']); ?></div>
          <div class="col-md-6 az-field"><label>Latest Firmware Version</label><?php echo az_val($product_detail['latest_firmware_version']); ?></div>
        </div>
        <div class="az-field"><label>Short Description</label><?php echo az_val($product_detail['description']); ?></div>
        <div class="az-field">
          <label>Device Manual / Brochure</label>
          <?php if($product_detail['device_manual_brochure']){ ?>
            <a class="btn btn-xs btn-info" download href="<?php echo base_url();?>assets/pdf/<?php echo $product_detail['device_manual_brochure'];?>">Download</a>
          <?php } else { echo '<span class="az-value az-empty">No file uploaded</span>'; } ?>
        </div>
      </div>

      <!-- Section 2: I/O, Process & Features -->
      <div class="az-page-section az-section-io">
        <div class="az-section-header"><span class="az-section-num">2</span><span class="az-section-title">I/O, Process &amp; Features</span></div>

        <?php if(empty($inputOutput)){ ?>
          <span class="az-value az-empty">No input/output data recorded for this product.</span>
        <?php } else { foreach($inputOutput as $io){ ?>
          <div class="az-io-group">
            <div class="az-io-title">Input</div>
            <div class="row">
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Type</label><?php az_chips($io['input_conn']); ?></div>
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Standard</label><?php az_chips($io['input_process_stand']); ?></div>
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Connection Type</label><?php az_chips($io['process_connection']); ?></div>
            </div>
          </div>
          <div class="az-io-group">
            <div class="az-io-title">Output</div>
            <div class="row">
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Type</label><?php az_chips($io['out_conn']); ?></div>
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Standard</label><?php az_chips($io['out_process_stand']); ?></div>
              <div class="col-md-4"><label style="font-size:12px;color:#6b6f76;">Connection Type</label><?php az_chips($io['out_process_connection']); ?></div>
            </div>
          </div>
          <div class="az-io-group">
            <div class="az-io-title">Process</div>
            <div class="row">
              <div class="col-md-6"><label style="font-size:12px;color:#6b6f76;">Type</label><?php az_chips($io['process']); ?></div>
              <div class="col-md-6"><label style="font-size:12px;color:#6b6f76;">Standard</label><?php az_chips($io['process_stand']); ?></div>
            </div>
          </div>
          <div class="az-io-group">
            <div class="az-io-title">Features</div>
            <?php az_chips(isset($io['features']) ? $io['features'] : ''); ?>
          </div>
        <?php } } ?>
      </div>

      <!-- Section 3: Vendor Info -->
      <div class="az-page-section az-section-vendor">
        <div class="az-section-header"><span class="az-section-num">3</span><span class="az-section-title">Vendor Info</span></div>

        <div class="az-field"><label>Vendor Contact &amp; Ordering Info</label><?php echo az_val($product_detail['dealer_contact']); ?></div>
        <div class="az-field"><label>Vendor Notes</label><?php echo az_val($product_detail['dealer_notes']); ?></div>
        <div class="row">
          <div class="col-md-6 az-field"><label>Warranty Details</label><?php echo az_val($product_detail['warranty_detail']); ?></div>
          <div class="col-md-6 az-field"><label>Support Details</label><?php echo az_val($product_detail['support_detail']); ?></div>
        </div>

        <div class="az-field">
          <label>Gallery</label>
          <div class="row">
            <?php
            $product_gallery = $this->common_model->GetAllData('product_gallery_image',array('product_id'=>$product_detail['id']));
            if(empty($product_gallery)){
                echo '<div class="col-md-12"><span class="az-value az-empty">No gallery images uploaded.</span></div>';
            } else {
                foreach ($product_gallery as $gallery) { ?>
                  <div class="col-md-2" style="margin-bottom:10px;">
                    <img style="width:100%;border-radius:6px;border:1px solid #EBEBEB;" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>">
                  </div>
                <?php }
            }
            ?>
          </div>
        </div>

      </div>

   </section>
</div>
<?php include_once('include/footer.php'); ?>
