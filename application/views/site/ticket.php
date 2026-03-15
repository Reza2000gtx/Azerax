<?php include_once 'include/header.php'; ?>
<style type="text/css">
</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

<style>
.btn-success .badge {
    color: #f4f4f4;
    background-color: #dd4b39;
}
</style>
</style>
<div class="commn_dasboard p_120">
	<div class="container">
		<div class="row">
			<!-- <div class="col-sm-3">
				

<?php //include_once 'include/sidebar.php';?>

			</div> -->
			<div class="col-sm-12 mx-auto">
				<div class="right_box">
					<div class="heddding_1">
						<h4>Ticket/Contact us</h4>
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
						<div class="tab">
                          <button class="tablinks" onclick="openCity(event, 'create')">Create</button>
                          <button class="tablinks" onclick="openCity(event, 'history')">History</button>
                        </div>
                        
                        <div id="create" class="tabcontent">
                          <h3>Create</h3>
                          <form action="<?php echo base_url();?>ticket-action" method="post">
            				<div class="row">
            					<div class="col-sm-12">
            						<div class="form-group">
            							<label>Name</label>
            							<input type="text" required name="username"  value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Name">
            										    <div class="errorMessage"><?php echo form_error('username'); ?></div>
            
            						</div>
            					</div>
				            </div>	
				            <div class="row">
            					<div class="col-sm-12">
            						<div class="form-group">
            							<label>Subject</label>
            							<input type="text" required name="subject"  value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="Subject">
            										    <div class="errorMessage"><?php echo form_error('subject'); ?></div>
            
            						</div>
            					</div>
					        </div>
                            <div class="form-group">
                				<label>Message</label>
                				<textarea class="form-control" required name="message" placeholder="Type your message here..."> <?php echo set_value('message'); ?></textarea>
                							    <div class="errorMessage"><?php echo form_error('message'); ?></div>

			                </div>		
                            <div class="col-md-12 text-right">
						        <button type="submit" value="submit" class="btn submit_btn">Send</button>
					        </div>
			            </form>
                        </div>
                        
                        <div id="history" class="tabcontent">
                          <h3>History</h3>
                          <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Sl.No</th>
									<th>Subject</th>
									<th>Ticket Id</th>
									<th>Action</th>
							    </tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($ticket as $row){ 
								    $where = "ticket_id = '".$row['ticket_id']."' and read_admin = 1";
                                    $count = $this->common_model->GetAllData('ticket',$where);
								?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['subject'];?></td>
								<td>#<?php echo $row['ticket_id'];?></td>
								<td>
								<a class="btn btn-success btn-xs notification" onclick="" href="<?php echo base_url();?>chat-box/?ticket_id=<?php echo $row['ticket_id']; ?>">REPLY
								   <?php if(count($count)) { ?>
                                         <span class="badge rounded-pill badge-notification bg-danger"><?php echo count($count);} ?></span>
								</a>
								
								</td>
								</tr>
							    <?php $i++;} ?>
							</tbody>
						</table>
                        </div>
                    </div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'include/footer.php'; ?>
<script>
document.getElementsByClassName('tablinks')[0].click()
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>