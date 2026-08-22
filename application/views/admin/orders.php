<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Orders<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Orders</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Post</th>

                        <th>User Name</th>
                        <th>Payment Type</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Create Date</th>


                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($rows as $row){
						          	 $user =   $this->common_model->GetSingleData('users','user_id='.$row['user_id']);
						          	 $post =   $this->common_model->GetSingleData('post','id='.$row['post_id']);

                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                       
                        <td><?php echo $user['fname'].''.$user['lname'] ;?></td>
                        <td><?php echo $post['name'];?></td>
                        <td><?php echo html_escape($row['payment_method']);?></td>
                        <td>PI/$<?php echo html_escape($row['payment']);?></td>


                        <td><?php 
                              if($row['status']==1){
                              ?>
                             <p>Approved</p>
                           <?php
                              }else{
                              ?>
                                                          <p>Pending</p>

                           <?php
                              }
                              ?> </td>
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
