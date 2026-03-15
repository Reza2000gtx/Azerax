<?php 
include_once('include/header.php'); 
?>
<style>
td>h2{
      font-size:15px;
}
td>p {
    font-size: 15px;
}
</style>
<div class="content-wrapper">
<section class="content-header">
   <h1>Notification<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title"><?php echo $title;?> alerts </h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Email</th>
                        <th>Message</th>

                        <th>Create at</th>

                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($notifications as $row){
                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        
                        <td><?php echo $row['to_email'];?></td>
                        <td><?php echo $row['message'];?></td>
                    
                        <td><?php echo date("d-m-Y g:i A", strtotime($row['created_at']));?></td>
                        

                       

                     </tr>
                     <?php
                        $i++;
                        }
                        
                        ?>
                  </tbody> 
               </table>
               </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<?php include_once('include/footer.php'); ?>
