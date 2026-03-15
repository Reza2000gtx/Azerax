<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Plans<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
         <div class="box box-primary">
                <div class="box-body">   
                
         <div class="box-header">
            <h3 class="box-title">Edit Plans</h3>
         </div>
                
            
                      
               <div class="container">
                  <form action="<?php echo base_url(); ?>edit-plan-action" method="post" class="form-horizontal">
                      <input type="hidden" name="plan_id"  value="<?php echo $planview['plan_id'];?>">
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Title:</label>
                      <div class="col-sm-6">          
                        <input type="text" name="title" class="form-control" value="<?php echo $planview['title'] ;?>">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Description:</label>
                      <div class="col-sm-6">          
                        <input type="text"  name="description" class="form-control" value="<?php echo $planview['description'] ;?>">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Price:</label>
                      <div class="col-sm-6">          
                        <input type="text"  name="price" class="form-control" value="<?php echo $planview['price'] ;?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" >Responsive Display</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['responsive_display']==1){echo 'checked';}?> name="responsive_display"  class="form-check-input" >
                       </div>  
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-2" >User Friendly</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['user_friendly']==1){echo 'checked';}?> name="user_friendly"  class="form-check-input" >
                       </div>  
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-2" >Fully Customizable</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['fully_customizable']==1){echo 'checked';}?> name="fully_customizable"  class="form-check-input" >
                       </div>  
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-2" >Deeply Customizable</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['deeply_customizable']==1){echo 'checked';}?> name="deeply_customizable"  class="form-check-input" >
                       </div>  
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-2" >Smooth And Fluent</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['smooth']==1){echo 'checked';}?> name="smooth"  class="form-check-input" >
                       </div>  
                  </div>

                  

                   <div class="form-group">
                      <label class="control-label col-sm-2" >Outstanding Support</label>
                       <div class="col-sm-6">
                        <input type="checkbox" <?php if($planview['support']==1){echo 'checked';}?> name="support" class="form-check-input" >
                       </div>  
                  </div>
                    

                    
                    <div class="form-group text-center">
                        <button class="btn btn-primary py-1 px-5">Update</button>
                    </div>
                  
                    
                 
                  </form>
                </div>
                </div>
                </div>
                
                
               
               </div>
                    </div>
                        </div>
                            </div>
                                </div>
               
               
               

              
               
         </div>
      </div>
</section>
</div>
<?php include_once('include/footer.php'); ?>

