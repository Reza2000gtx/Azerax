<?php 
   include_once('include/header.php');
   
   ?>
<style>
.switch {
  display: inline-block;
  float: right;
  height: 34px;
  position: relative;
  width: 60px;
}
.switch input {
  display: none;
}
.slider.round::before {
  border-radius: 50%;
}
.slider::before {
  background-color: white;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: all 0.4s ease 0s;
  width: 26px;
}
.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 0.4s ease 0s;
}
.slider.round {
  border-radius: 34px;
}
input:checked + .slider::before {
  transform: translateX(26px);
}
input.primary:checked + .slider {
  background-color: #7611ff;
}

.rado_sel {
  min-height: 34px;
  padding-right: 75px;
  position: relative;
  padding-top: 6px;
  margin-bottom: 10px;
}
.rado_sel p {
  margin: 0;
  position: absolute;
  right: 0;
  top: 0;
}
</style> 
<div class="content-wrapper">
    <section class="content-header">
		<h1>
          User Detail<!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>  User Detail</a></li>
         <li class="active"><a href="#"> User Detail</a></li>
      </ol>
    </section>
    <section class="content">
		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					
					<h3 class="box-title">User Detail</h3>
					</div>
   
					<div class="box-body">
                    <div class="row"></div>
                    <div class="form-group">
                    <label for="title">User Name</label>
                    <input type="text" class="form-control" readonly name="name" value="<?=$user_detail['fname']?>" required>
                    </div>
                    <div class="form-group">
                    <label for="title">User Email</label>
                    <input type="text" class="form-control" readonly name="name" value="<?=$user_detail['email']?>" required>
                    </div>
                    <div class="form-group">
                    <label for="title">User Address</label>
                    <textarea class="form-control" readonly name="address" id="address" required><?=$user_detail['address']?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="title">User Image</label><br>
                    <img height="100" width="100" src="<?php echo base_url();?>assets/admin/user/<?=$user_detail['profile']?>">
                    </div>

                    <div class="row">
                    	<div class="col-md-12">
                                <h4 class="no-mtop mrg3">Financial Transaction History</h4>
                    </div>

                    <hr/>
                <div class="col-md-12">
                    <div style="overflow-x:auto !important;">
                        <div class="form-group" id="docAttachDivVideo" >
                            
                        <table class="table credite-note-items-table items table-main-credit-note-edit no-mtop saletable">
                        <thead>
                            <tr>
                                <td>S.No</td>
                                <td>User</td>
                                <td>Amount</td>
                                <td>Currency</td>
                                <td>Paid By</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($transaction_detail)){
                            $i = 1;
                            foreach ($transaction_detail as $key => $value) {
                        
                             $user = $this->db->query("SELECT * from users where user_id = ".$this->db->escape($value->tr_userid))->row();
                                ?>
                                <tr>                                                      
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $user->fname;?></td>
                                    <td><?php echo $value->tr_amount;?></td>
                                    <td><?php echo $value->currency;?></td>           
                                    <td><?php echo $value->tr_paid_by;?></td>
                                    <td><?php echo $value->tr_date;?></td>                                                        
                                </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?> 
                            <tr>
								<td colspan="10" style="background:#f0f0f0; text-align:center; padding:8px; border: 1px solid #111;"><b>No Record Found!</b></td>
							</tr> 
                            <?php } ?>    
                            </tbody>
                        </table>
                           
                                
                        </div>
                    </div>
                </div>
                    </div>

                <div class="row">
                	<div class="col-md-12">
                            <h4 class="no-mtop mrg3">Related Devices</h4>
                </div>

                <hr/>
                <div class="col-md-12">
                    <div style="overflow-x:auto !important;">
                        <div class="form-group" id="docAttachDivVideo" >
                            
                        <table class="table credite-note-items-table items table-main-credit-note-edit no-mtop saletable">
                        <tr>
                            <td colspan="10" style="background:#f0f0f0; text-align:center; padding:8px; border: 1px solid #111;"><b>Coming soon!</b></td>
                        </tr>
                        </table>
                           
                                
                        </div>
                    </div>
                </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                            <h4 class="no-mtop mrg3">Reviews</h4>
                </div>

                <hr/>
                <div class="col-md-12">
                    <div style="overflow-x:auto !important;">
                        <div class="form-group" id="docAttachDivVideo" >
                            
                        <table class="table credite-note-items-table items table-main-credit-note-edit no-mtop saletable">
                        <tr>
                            <td colspan="10" style="background:#f0f0f0; text-align:center; padding:8px; border: 1px solid #111;"><b>Coming soon!</b></td>
                        </tr>
                        </table>
                           
                                
                        </div>
                    </div>
                </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                            <h4 class="no-mtop mrg3">Messages</h4>
                </div>

                <hr/>
                <div class="col-md-12">
                    <div style="overflow-x:auto !important;">
                        <div class="form-group" id="docAttachDivVideo" >
                            
                        <table class="table credite-note-items-table items table-main-credit-note-edit no-mtop saletable">
                        <tr>
                            <td colspan="10" style="background:#f0f0f0; text-align:center; padding:8px; border: 1px solid #111;"><b>Coming soon!</b></td>
                        </tr>
                        </table>
                           
                                
                        </div>
                    </div>
                </div>
                    </div>

					</div>
				</div>
			</div>

			<!-- <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        
                        <div class="row">
                            
                        </div>

                    </div>


                </div>
            </div> -->

		</div>
		</section>
		</div>


<?php include_once('include/footer.php'); ?>



