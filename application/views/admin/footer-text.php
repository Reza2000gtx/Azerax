<?php 
include_once('include/header.php'); 
?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
		<h1>Footer Text<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Privacy </a></li>
			<li class="active">Policy</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('tmsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Footer Text</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/Footer_content/addfooter_text" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($footer_text as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="footer_text" value="" class="form-control ckeditor" required="" ><?php echo $value['footer_text']; ?></textarea>
						</div>

                        <div class="form-group">
                            <label>Address</label>

                           <input type="text" class="form-control" name="address" value="<?php echo $value['address']; ?>">

                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>

                           <input type="text" class="form-control" name="phone_no" value="<?php echo $value['phone_no']; ?>">
                         </div>


  <div class="form-group">
 <label>Show/Hide Address/Phone</label>                          
<!-- <input type="checkbox" <?php if($value['status']==1){echo 'checked';}?> name="status"  class="form-check-input" > -->


<label class="switch">
  <input type="checkbox" checkedtype="checkbox" <?php if($value['status']==1){echo 'checked';}?> name="status"  class="form-check-input">
  <span class="slider round"></span>
</label>
</div>

                          

                       



					<?php	} ?>
                    
<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
		</div>
    </section>
</div>

<?php include_once('include/footer.php'); ?>
<script>
 $(document).ready(function(){

            $("#f3").validate(
            {
                ignore: [],
              debug: false,
                rules: { 

                    privacy_policy:{
                         required: function() 
                        {
                         CKEDITOR.instances.privacy_policy.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    privacy_policy:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });

</script>