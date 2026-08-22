<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Withdrawal<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Users</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>User Name</th>
                        <th>Payment Type</th>
                        <th>Amount</th>
                        <th>Account Details</th>
                        <th>Status</th>
                         <th>Create Date</th>


                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($rows as $row){
						          	 $user =   $this->common_model->GetSingleData('users','user_id='.$row['user_id']);

                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                       
                        <td><?php echo $user['fname'].''.$user['lname'] ;?></td>
                        <td><?php echo html_escape($row['payment_type']);?></td>
                        <td>PI/$<?php echo html_escape($row['amount']);?></td>
                        <td>Account Name:<?php echo html_escape($row['account_name']);?><br/>Account Number-<?php echo html_escape($row['account_number']);?><br/>Code: <?php echo html_escape($row['IFSC_code']);?></td>
                        

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

                        <td>
                           <?php 
                              if($row['status']==0){
                              ?>
                           <a class="btn btn-success btn-xs"  href="<?php echo site_url().'Admin/requestchangestatus/'.$row['request_id'].'/1'?>" onclick="return confirm('Are you sure you want to approved this request?')">Approve</a>
                           <?php
                              }
                        
                              ?> 
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
