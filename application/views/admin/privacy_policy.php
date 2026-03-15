<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Privacy Policy<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Privacy </a></li>
			<li class="active">Policy</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('pmsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Privacy Policy</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/Footer_content/addpolicy" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($about_us as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="privacy_policy" value="" class="form-control ckeditor" required="" ><?php echo $value['privacy_policy']; ?></textarea>
						</div>
					<?php	} ?>
                    <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

<button type="submit" class="btn btn-success">Submit</button>
<?php	} ?>					</div>
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