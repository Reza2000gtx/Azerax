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
</style>

 
<div class="content-wrapper">
    <section class="content-header">
		<h1> IPO<small>Manage</small></h1>

		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"> IPO</a></li>
			<li class="active">List</li>
		</ol>
    </section>
	
	<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Input')">Input</button>
  <button class="tablinks" onclick="openCity(event, 'Output')">Output</button>
  <button class="tablinks" onclick="openCity(event, 'Process')">Process</button>
</div>
    <div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
    </div>
    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<?php
      if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
    ?>

<!--input tab start-->
<div id="Input" class="tabcontent">
  <div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Input</h3>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladd">Add Input</button>
					</div>
					<div id="showdel"></div>
					<div class="box-body">
					<div class="table-responsive">
					
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Sl.No</th>
									<th>Input name</th>
									<th>Input standard</th>
									<th>Connection type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($ipolist as $row){ 
								?>
								<tr  class="delete_mem<?php echo $row['id']; ?>">
								<td><?php echo $i; ?></td>
								<td><?php echo $row['input_conn']; ?></td>
								<td><?php echo $row['input_process_stand']; ?></td>
								<td><?php echo $row['process_connection']; ?></td>
								<td>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalView<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalEdit<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>
									<a onclick="confirm('Are you sure want to delete this Product ?'); deleteinput(<?php echo $row['id']; ?>);" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
								</tr>
								
								<!-- The Modal -->
                        <div class="modal" id="myModalEdit<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Input</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-input" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Input Name</label>
                                 <input type="text" required name="input_conn" class="form-control" value="<?php echo $row['input_conn']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Input Standarad</label>
                                 <input type="text" required name="input_process_stand" class="form-control" value="<?php echo $row['input_process_stand']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Connection Type</label>
                                 <input type="text" required name="process_connection" class="form-control" value="<?php echo $row['process_connection']; ?>">
                               </div>
								<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
						
						
						<!-- The Modal -->
                        <div class="modal" id="myModalView<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">View Input</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-input" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Input Name</label>
                                 <input type="text" readonly name="input_conn" class="form-control" value="<?php echo $row['input_conn']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Input Standarad</label>
                                 <input type="text" readonly name="input_process_stand" class="form-control" value="<?php echo $row['input_process_stand']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Connection Type</label>
                                 <input type="text"readonly name="process_connection" class="form-control" value="<?php echo $row['process_connection']; ?>">
                               </div>
								<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                             
                            </form>
                            </div>
                          </div>
                        </div>
						<?php $i++;} ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
 <!--input tab end-->
<!--output tab start-->
<div id="Output" class="tabcontent">
  <div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Output</h3>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladdout">Add Output</button>
					</div>
					<div id="showdel"></div>
					<div class="box-body">
					<div class="table-responsive">
					
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Sl.No</th>
									<th>Output name</th>
									<th>Output standard</th>
									<th>Connection type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($ipolist as $row){ 
								?>
								<tr  class="delete_mem<?php echo $row['id']; ?>">
								<td><?php echo $i; ?></td>
								<td><?php echo $row['out_conn']; ?></td>
								<td><?php echo $row['out_process_stand']; ?></td>
								<td><?php echo $row['out_process_connection']; ?></td>
								<td>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalViewoutput<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalEditoutput<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>
									<a onclick="confirm('Are you sure want to delete this Product ?'); deleteoutput(<?php echo $row['id']; ?>);" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>

									</td>
								</tr>
								
								<div class="modal" id="myModalEditoutput<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Output</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-output" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Output Name</label>
                                 <input type="text" required name="out_conn" class="form-control" value="<?php echo $row['out_conn']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Output Standarad</label>
                                 <input type="text" required name="out_process_stand" class="form-control" value="<?php echo $row['out_process_stand']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Connection Type</label>
                                 <input type="text" required name="out_process_connection" class="form-control" value="<?php echo $row['out_process_connection']; ?>">
                               </div>
								<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
						
						<div class="modal" id="myModalViewoutput<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">View Output</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-output" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Output Name</label>
                                 <input type="text" readonly name="out_conn" class="form-control" value="<?php echo $row['out_conn']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Output Standarad</label>
                                 <input type="text" readonly name="out_process_stand" class="form-control" value="<?php echo $row['out_process_stand']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Connection Type</label>
                                 <input type="text" readonly name="out_process_connection" class="form-control" value="<?php echo $row['out_process_connection']; ?>">
                               </div>
								<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                              
                            </form>
                            </div>
                          </div>
                        </div>
								
								<?php $i++;} ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div> 
</div>
   
<!--output tab end-->

<!--process tab start-->
<div id="Process" class="tabcontent">
  <div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Process</h3>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladdpro">Add Process</button>
					</div>
					<div id="showdel"></div>
					<div class="box-body">
					<div class="table-responsive">
					
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Sl.No</th>
									<th>Process name</th>
									<th>Process standard</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($ipolist as $row){ 
								?>
								<tr  class="delete_mem<?php echo $row['id']; ?>">
								<td><?php echo $i; ?></td>
								<td><?php echo $row['process']; ?></td>
								<td><?php echo $row['process_stand']; ?></td>
								<td>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalViewprocess<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalEditprocess<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>
								    <a onclick="confirm('Are you sure want to delete this Product ?'); deleteprocess(<?php echo $row['id']; ?>);" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>

									</td>
								</tr>
								
								<div class="modal" id="myModalEditprocess<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Process</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-process" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Process Name</label>
                                 <input type="text" required name="process" class="form-control" value="<?php echo $row['process']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Process Standarad</label>
                                 <input type="text" required name="process_stand" class="form-control" value="<?php echo $row['process_stand']; ?>">
                               </div>

                              <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
						
						<div class="modal" id="myModalViewprocess<?php echo $row['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">View Process</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-process" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Process Name</label>
                                 <input type="text" readonly name="process" class="form-control" value="<?php echo $row['process']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Process Standarad</label>
                                 <input type="text" readonly name="process_stand" class="form-control" value="<?php echo $row['process_stand']; ?>">
                               </div>

                              <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                              </div>

                              <!-- Modal footer -->
                             
                            </form>
                            </div>
                          </div>
                        </div>
						
						<?php $i++;} ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

    </section>
</div>
<!--process tab end-->
<!--Start Add Input-->
 <div class="modal" id="myModaladd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Input</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/add-input" id="addmanufacturer" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
         <label>Input name</label>
         <input type="text" required name="input_conn" class="form-control">
       </div>

       <div class="form-group">
         <label>Input standard</label>
         <input type="text" required name="input_process_stand" class="form-control">
       </div>

       <div class="form-group">
         <label>Connection type</label>
         <input type="text" required name="process_connection" class="form-control">
       </div>
	 
	 <!-- Modal footer -->
      <div class="modal-footer">
           <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<!--End Add Input-->

<!--Start Add Output-->
 <div class="modal" id="myModaladdout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Output</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/add-output" id="addmanufacturer" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
         <label>Output name</label>
         <input type="text" required name="out_conn" class="form-control">
       </div>

       <div class="form-group">
         <label>Output standard</label>
         <input type="text" required name="out_process_stand" class="form-control">
       </div>

       <div class="form-group">
         <label>Connection type</label>
         <input type="text" required name="out_process_connection" class="form-control">
       </div>
	 
	 <!-- Modal footer -->
      <div class="modal-footer">
           <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<!--End Add Output-->

<!--Start Add Process-->
 <div class="modal" id="myModaladdpro">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Process</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/add-process" id="addmanufacturer" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
         <label>Process name</label>
         <input type="text" required name="process" class="form-control">
       </div>

       <div class="form-group">
         <label>Process standard</label>
         <input type="text" required name="process_stand" class="form-control">
       </div>

      <!-- Modal footer -->
      <div class="modal-footer">
           <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<!--End Add Process-->



<?php include_once('include/footer.php'); ?>
<script type="text/javascript">
	function deleteinput(id){  

	$.ajax({
        type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Users/deleteinput?id="+id,
        beforeSend:function()
    {
      
     // $('.btn-load-addMoreSpecilities').show();

    },
    success:function(html)
    {
      
        $(".delete_mem" + id).fadeOut('slow');
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Input has been deleted successfully.');
        return false;
    }
    });    
	 
}


	function deleteoutput(id){  

	$.ajax({
        type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Users/deleteoutput?id="+id,
        beforeSend:function()
    {
      
     // $('.btn-load-addMoreSpecilities').show();

    },
    success:function(html)
    {
      
        $(".delete_mem" + id).fadeOut('slow');
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Output has been deleted successfully.');
        return false;
    }
    });    
	 
}

	function deleteprocess(id){  

	$.ajax({
        type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Users/deleteprocess?id="+id,
        beforeSend:function()
    {
      
     // $('.btn-load-addMoreSpecilities').show();

    },
    success:function(html)
    {
      
        $(".delete_mem" + id).fadeOut('slow');
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Process has been deleted successfully.');
        return false;
    }
    });    
	 
}

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