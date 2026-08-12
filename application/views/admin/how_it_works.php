<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>How it works<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">How it </a></li>
			<li class="active">works</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('hmsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">How it works</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/Footer_content/addhow_it_works" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($about_us as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="how_it_works" value="" class="form-control ckeditor" required="" ><?php echo $value['how_it_works']; ?></textarea>
						</div>
					<?php	} ?>
                    <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

						<button type="submit" class="btn btn-success">Submit</button>
                        <?php	} ?>
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

                    how_it_works:{
                         required: function() 
                        {
                         CKEDITOR.instances.how_it_works.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    how_it_works:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });

</script>