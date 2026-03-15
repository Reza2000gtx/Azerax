<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
<?php
 if($singlelist['user_type'] == 2)
{
    $usertype =  'Student';
}
else
{
    $usertype =  'Teacher';
}

?>
   <h1><?php echo $usertype; ?><small>Management</small></h1>

</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
         <div class="box box-primary">
                <div class="box-body">   
                
         <div class="box-header">
            <h3 class="box-title"><?php echo $usertype; ?> Details</h3>

         <?php   if($singlelist['phone_verified']==1){ ?>
 <a class="btn btn-warning" data-toggle="modal" data-target="#SendSMS" style="margin-top: 15px;float: right;" >Send Sms</a>
          <?php } ?>
       </div>               
          <?php 

		$city = $this->common_model->GetSingleData('cities',array('id'=>$singlelist['city']));
		$state = $this->common_model->GetSingleData('states',array('id'=>$singlelist['state']));
		$country = $this->common_model->GetSingleData('countries',array('id'=>$singlelist['country']));
    $nationality = $this->common_model->GetSingleData('settingsNationalities',array('NationalityID'=>$singlelist['nationality']));

                 ?>
                      
               <div class="container">
                  <form class="form-horizontal">
                       <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Profile:</label>
                      <div class="col-md-10">          
                         <?php if($singlelist['profile']!='') { ?>
                     <img style="border-radius: 100px;width: 100px;" src="<?php echo base_url();?>assets/profile/<?php echo $singlelist['profile'];?>">
                           <?php } else { ?>
                          <img src="<?php echo base_url();  ?>assets/site/images/default.jpg" style="border-radius: 100px;width: 100px;" >
                           <?php } ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Full Name:</label>
                      <div class="col-md-6">          
                        <input type="text" readonly class="form-control" value="<?php echo $singlelist['fname'].' '.$singlelist['lname'] ;?>">
                      </div>
                    </div>
                    
                  
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $singlelist['email'];?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Phone Number:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="+<?php echo $singlelist['phonecode'];?>-<?php echo $singlelist['phone'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Date Of Birth:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $singlelist['dob'];?>">
                      </div>
                    </div>

   
   
           <?php 
      $country = $this->common_model->GetSingleData('countries',array('id'=>$singlelist['country']));
      ?>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Country:</label>
                      <div class="col-md-6">
  <input type="text" readonly class="form-control" value="<?php echo $country['name'];?>">
                      </div>
                    </div>

 

               <!-- <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Country:</label>
                      <div class="col-md-6">
            <select name="country" readonly disabled="disabled" class="form-control" onchange="getStates(this.value)">
           
           <?php 
      $countries = $this->common_model->GetAllData('countries','','id','asc');

           foreach($countries as $country){ ?>
          <option name="country" value="<?php echo $country['id'];?>" <?php if($singlelist['country']==$country['id']){ echo 'selected';}?>><?php echo $country['name'];?></option>
               
            <?php } ?>
            
            </select>
        </div>     </div>   -->
        
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Language:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $singlelist['lang'];?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Nationality:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $nationality['Nationality'];?>">
                      </div>
                    </div>
                    

                    <!--  <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Speciality:</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="<?php //echo $singlelist['speciality'];?>">
                      </div>
                    </div> -->

                    <!-- <?php 
      $i=1;
$main_category=explode(',',$singlelist['speciality_cat']);
$sub_category=explode(',',$singlelist['speciality_subcat']);

$subsub_category=explode(',',$singlelist['speciality_subsubcat']);

$count=count($main_category)+1;

foreach($main_category as $key=>$cate) {
      ?>          
      
                
         


              <div class="col-md-4 margin-bottom20">

              <label>Speciality Main Category</label>

                  <select required name="speciality_cat[]"   class="form-control" onchange="getSubCategory(this.value,1)">

          <option value="" >Select</option>
           
           <?php
echo $cate;
            foreach($categorys as $category){ ?>
            <option value="<?php echo $category['cat_id'];?>" <?php if($cate==$category['cat_id']){ echo 'selected';}?>><?php echo $category['cat_title'];?></option>
               
        <?php    } ?>
        </select>

              

              </div>

              <div class="col-md-4 margin-bottom20">

              <label>Speciality Sub Category
                  <i style="display:none" class="spinner fa fa-spinner fa-spin fa-fw btn-load-subcategory"></i></label>
          <select required name="speciality_subcat[]" class="form-control" id="subcategory<?php echo $i;?>"  onchange="getSubSubCategory(this.value,1)">

          <option value="" selected>Select</option>
          
          <?php echo $sub_category[$key];
               $subcategory = $this->common_model->GetAllData('subcategory',array('sub_cat_id'=>$sub_category[$key]));
            foreach($subcategory as $subcategory){ ?>
            <option  <?php if($sub_category[$key]==$subcategory['sub_cat_id']){ echo 'selected';}?> value="<?php echo $subcategory['sub_cat_id'];?>"><?php echo $subcategory['sub_name'];?></option>
               
        <?php       
                } ?>
        </select>

              

              </div>

              <div class="col-md-3 margin-bottom20">

              <label>Speciality Expertise</label>
                  <i style="display:none" class="spinner fa fa-spinner fa-spin fa-fw btn-load-subsubcategory"></i>

          <select required name="speciality_subsubcat[]" class="form-control" id="subsubcategory<?php echo $i;?>">
          <option value="" selected>Select</option>
          <?php 
        echo $subsub_category[$key];
              $subsubcategorys = $this->common_model->GetAllData('subsubcategory',array('subsub_cat_id'=>$subsub_category[$key]),'subsub_cat_id','asc');

  foreach($subsubcategorys as $subsubcategory){ ?>
            <option <?php if($subsub_category[$key]==$subsubcategory['subsub_cat_id']){ echo 'selected';}?> value="<?php echo $subsubcategory['subsub_cat_id'];?>"><?php echo $subsubcategory['sub_sub_name'];?></option>
               
        <?php    }   
                 ?>
        </select>
              

              </div>
          
            
<?php
$i++;

 }?>
   -->
            


                  

       
                     
                  
                 
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

<!-- send Sms phone -->
<!-- Modal -->
<div class="modal fade" id="SendSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $singlelist['fname'].' '.$singlelist['lname'] ;?> </h4>
      </div>
      <div class="modal-body">
        
     

          <i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load btn-load-otp" id="btn-load-otp"> </i>
          <div class="msg-response" style="margin: 10px;"></div>

    <div class="col-md-8 offset-md-2 otp_screen" style="display: block;text-align: center;">
      <form class="text-center">
        <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Text:</label>
                      <div class="col-sm-10">
                        <textarea  type="text"  id="msg"  class="form-control" value="Enter Text to be send..."></textarea>
                      </div>
                   

        </div>
      </form>
    </div>
   
   </div>
 
      <div class="modal-footer">
        <div class="response_results_pre"></div>

        <button type="submit" name="submit" class="btn btn-warning submit_process_btn" onclick="send_sms()" >Send
        <i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load submit_process_loading" id="btn-load"> </i></button>
      </div>


    </div>
  </div>
</div>


</div>
<script type="text/javascript">
function send_sms() {
var msg=$('#msg').val();
var phonecode='<?php echo $singlelist['phonecode']; ?>';
var phone='<?php echo $singlelist['phone']; ?>';

  $.ajax({
    url:"<?php echo base_url(); ?>Admin/user/send_sms",
    type:"POST",
    data: {msg:msg,phonecode:phonecode,phone:phone},
    dataType:'json',
    beforeSend:function()
    {
    $('.submit_process_loading').show();

    },
    success:function(data)
    {
        if(data.status==1){
      $('.submit_process_loading').hide();
      $('.msg-response').html(data.msg);
     setTimeout(function () { location.reload(1); }, 2000);

          return false;
    }else{

          $('.msg-response').html(data.msg);
          return false;
  
    }
    }
    
  });
}
</script>