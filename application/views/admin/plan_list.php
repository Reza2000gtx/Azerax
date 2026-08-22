<?php 
include_once('include/header.php'); 
	?>	

<style type="text/css">
   .fa-times{
      color:red;
   }
   .fa-check{
      color:green;
   }
</style>


   <div class="content-wrapper">
<section class="content-header">
   <h1>Plans<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msg'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Plans</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Responsive Display</th>
                        <th>User Friendly</th>
                        <th>Fully Customizable</th>
                        <th>Deeply Customizable</th>
                        <th>Smooth And Fluent</th>
                        <th>Outstanding Support</th>
                       
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($planlist as $row){
                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo html_escape($row['title']);?></td>
                        <td><?php echo html_escape($row['description']);?></td>
                        <td><?php echo html_escape($row['price']);?></td>
                        <td>
                           <?php 
                              if($row['responsive_display']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>

                         <td>
                           <?php 
                              if($row['user_friendly']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>

                         <td>
                           <?php 
                              if($row['fully_customizable']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>

                         <td>
                           <?php 
                              if($row['deeply_customizable']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>

                         <td>
                           <?php 
                              if($row['smooth']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>

                         <td>
                           <?php 
                              if($row['support']==1){
                              ?>
                              <p><i class="fa fa-check" aria-hidden="true"></i></p>
                           <?php
                              }else{
                              ?>
                              <p><i class="fa fa-times" aria-hidden="true"></i></p>

                           <?php
                              }
                              ?> 
                        </td>


                        <td>
                           <a class="btn btn-success btn-xs"  href="<?php echo site_url().'Admin/edit-plan/'.$row['plan_id'].''?>">Edit</a>
                        </td>
                       

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
