<?php 
include_once('include/header.php'); 
?>

<div class="content-wrapper">
    <section class="content-header">
		<h1>Payment<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Payment Option</a></li>
			<li class="active">us</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Payment Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/update_payment_option" name="f3" id="f3">
                 <div class="box-body">
               
                 <div class="form-group">
								<label class=" form-control-label">
							Add Ads Stripe Payment Amount</label>
								<input type="text" name="stripe_amount" id="stripe_amount" value="<?php echo $admin[0]['stripe_amount'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Add Ads PI Wallet Payment Amount</label>
								<input type="text" name="PI_amount" id="PI_amount" value="<?php echo $admin[0]['PI_amount'];?>" class="form-control valid" aria-invalid="false">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Commission %</label>
								<input type="text" name="commission" id="commission" value="<?php echo $admin[0]['commission'];?>" class="form-control valid" aria-invalid="false">
							</div>
                       						<button type="submit" class="btn btn-success">Submit</button>

                            <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

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