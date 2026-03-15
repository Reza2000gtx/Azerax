<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>About us<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">About</a></li>
			<li class="active">us</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('amsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">About us</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/Footer_content/about_us" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($about_us as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="about_us" value="" class="form-control ckeditor" required="" ><?php echo $value['about_us']; ?></textarea>
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

                    about_us:{
                         required: function() 
                        {
                         CKEDITOR.instances.about_us.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    about_us:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });

</script>