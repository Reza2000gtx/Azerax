<?php 
include_once('include/header.php'); 
?>
<?php
$query=$this->db->query("select * from membership order by membership_id asc");
$datapackages= $query->result_array();
?>
<style>
  .img_r {
   width:100px;
   height: 100px;
  }


</style>
<div class="content-wrapper">
<section class="content-header">
   <h1>Post<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Post</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Ad Id</th>
                        <th>Image</th>
                        <th>Post Title</th>
                        <th>Price USD</th>
                        <th>Price PI</th>

                        <th>Created Date</th>
                        <th>Post Status</th>
                        <th>View Count</th>

                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($posts as $post){
                   
                    //get post images part
                      $images = $this->common_model->GetAllData('post_image',array('post_id'=>$post['id']));
                      //get post category
                      $data['category'] = $this->common_model->GetSingleData('category',array('cat_id'=>$post['cat_id']));
                      $category_name=$data['category']['cat_title'];
                       //get post subcategory name
                      $data['subcategory'] = $this->common_model->GetSingleData('subcategory',array('id'=>$post['subcat_id']));
                      $subcategory_name=$data['subcategory']['sub_name'];
         
                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $post['ad_ID']; ?></td>
                        <td>
                          <?php 
                      if($images){ ?>
                      <img src="<?php echo base_url(); ?>assets/img/post/<?php echo $images[0]['image']; ?>" class="img_r">

                    <?php }else{ ?>
                      <img src="<?php echo base_url(); ?>assets/img/post/thumb-placeholder2-large.png
" class="img_r">
<?php }?>
                        </td>
                        <td><?php echo $post['post_name']; ?></td>
                        <td>$<?php echo number_format($post['post_price'],2); ?></td>
                        <td>PI <?php echo number_format($post['post_price_PI'],2); ?></td>

                        <td><?php echo date("d-m-Y g:i A", strtotime($post['created_at']));?></td>
                       <td>
                         <?php if($post['post_status']==0) {
echo 'Active'; }else{
  echo 'Deactive'; 
}


                          ?>
                 </td>
        
                 <td><?php echo $post['view_count']; ?></td>

                        <td>
                        <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

                        <!--<a class="btn btn-success btn-xs"  data-toggle="modal" data-target="#package_modal<?php echo $post['id'];?>" ><i class="fa fa-level-up"></i>Update Package</a>-->
                        <?php	} ?>
                        <?php if($admin_permission_single && $admin_permission_single['add']=='YES') { ?>

                            <!--<a class="btn btn-success btn-xs"  data-toggle="modal" data-target="#viwe_modal<?php echo $post['id'];?>" ><i class="fa fa-eye"></i></a>-->
                          	<?php	} ?>
                            <?php if($admin_permission_single && $admin_permission_single['delete']=='YES') { ?>
             
                           
                             <a class="btn btn-danger btn-xs" onclick="alert('Are you sure want to delete this post?')" href="<?php echo base_url();?>Admin/posts/delete/<?php echo $post['id'];?>/<?php echo $this->uri->segment(4);?>" ><i class="fa fa-trash"></i></a>
                             <?php	} ?>
                             <?php if($admin_permission_single && $admin_permission_single['active_deactive']=='YES') { ?>

<?php if($post['post_status']==0) { ?>
                             <a class="btn btn-danger btn-xs"  href="<?php echo base_url();?>Admin/posts/de-activate/<?php echo $post['id'];?>/<?php echo $this->uri->segment(4);?>" >Deactivate</a>

                           <?php }else { ?>
 
   <a class="btn btn-success btn-success"  href="<?php echo base_url();?>Admin/posts/activate/<?php echo $post['id'];?>/<?php echo $this->uri->segment(4);?>" >Activate</a>   

                         <?php } ?>

	<?php	} ?>
                        </td>
                       

                     </tr>
                     <div class="modal" id="package_modal<?php echo $post['id']; ?>">

<div class="modal-dialog">

<div class="modal-content">

  <!-- Modal Header -->

  <div class="modal-header">

    <h4 class="modal-title">Update Package</h4>

    <button type="button" class="close" data-dismiss="modal">&times;</button>

  </div>


    <div class="modal-body us_form_ggg">
    <form  name="add_post" method="post" action="<?php echo base_url() ?>Admin/update_post_package" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

       <div class="form-group">
       <select required="required"   class="form-control" name="package_id">
<?php foreach ($datapackages as $package) { ?>
<option value="<?php echo $package['membership_id'];?>" price="<?php echo $package['price'];?>"><?php echo $package['title'];?></option>
<?php } ?>									  						
</select>
       </div>
       <div class="form-group" style="text-align: center;">
<input type="hidden" name="post_id"  value="<?php echo $post['id']; ?>" >
 <button type="submit" class="btn btn_theme">Continue</button>
       </div>
       </form>
       </div>  </div>  </div>
<div class="modal" id="viwe_modal<?php echo $post['id']; ?>">

    <div class="modal-dialog">

      <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title">Post Detail</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
      
      
          <div class="modal-body us_form_ggg">

             <div class="form-group">
            <ul id="horizontal-list" class="listt_ui">
            <?php 
               
foreach ($images as $key => $image) { ?>
  <li >


  <?php 

                      if($image){ ?>
                      <img src="<?php echo base_url(); ?>assets/img/post/<?php echo $image['image']; ?>">

                    <?php }else{ ?>
                      <img src="<?php echo base_url(); ?>assets/img/post/thumb-placeholder2-large.png
" >
<?php }

?>
    </li>

<?php }?>
</ul>
</div>
<div class="form-group">
              <label class="col-md-3 control-label">Package Name</label>  
              <p class="col-md-8 "><?php echo $package_name; ?></p>         
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Title</label>  
              <p class="col-md-8 "><?php echo $post['post_name']; ?></p>         
            </div>
       <div class="form-group">
              <label class="col-md-3 control-label">Description</label>  
              <p class="col-md-8 "><?php echo $post['post_desc']; ?></p>         
            </div>     
           
          <div class="form-group">
              <label class="col-md-3 control-label">Category</label>  
              <p class="col-md-8 "><?php echo $category_name; ?></p>         
            </div>       
      
       <div class="form-group">
              <label class="col-md-3 control-label">Sub Category</label>  
              <p class="col-md-8 "><?php echo $subcategory_name; ?></p>         
            </div>   

<div class="form-group">
              <label class="col-md-3 control-label">Phone</label>  
              <p class="col-md-8 "><?php echo $post['phone']; ?></p>         
            </div>  


            <div class="form-group">
              <label class="col-md-3 control-label">Price Type</label>  
              <p class="col-md-8 "><?php echo $post['price_type']; ?></p>         
            </div> 
<div class="form-group">
              <label class="col-md-3 control-label">Price</label>  
              <p class="col-md-8 "><?php echo number_format($post['post_price'],2); ?></p>         
            </div> 



            <div class="form-group">
              <label class="col-md-3 control-label">Address</label>  
              <p class="col-md-8 "><?php echo $post['post_address']; ?></p>         
            </div> 

                <div class="form-group">
              <label class="col-md-3 control-label">Total View </label>  
              <p class="col-md-8 "><?php echo $post['view_count']; ?></p>         
            </div> 
<div class="form-group">
              <label class="col-md-3 control-label">Created Date</label>  
              <p class="col-md-8 "><?php echo $post['created_at']; ?></p>         
            </div>

            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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

<style type="text/css">
   .us_form_ggg .form-group{
      display: inline-block;
      width: 100%;
   }
</style>