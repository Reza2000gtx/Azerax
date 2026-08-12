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
		<h1>Content<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Content</a></li>
			<li class="active">List</li>
		</ol>
    </section>

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
		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					
					
					</div>
   
					<div class="box-body">
					<h3 class="box-title">About Page Content</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="aboutContent" class="form-control ckeditor" placeholder="About content" required>
            <?php echo $row["about"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="UpdateAbout" value="<?php echo $row["id"] ?>">Update<i id="btn-load" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					
					
					</div>
   
					<div class="box-body">
					<h3 class="box-title">About Footer Content</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="AboutFooterContent" class="form-control ckeditor" placeholder="About footer content" required>
            <?php echo $row["aboutFooter"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="UpdateAboutFooter" value="<?php echo $row["id"] ?>">Update<i id="btn-load-AbFooter" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					</div>
   
					<div class="box-body">
					<h3 class="box-title">New Letter</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="newLetter" class="form-control ckeditor" placeholder="News letter content" required>
            <?php echo $row["newLetter"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="Newsletter" value="<?php echo $row["id"] ?>">Update<i id="btn-loadNewsletter" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					</div>
   
					<div class="box-body">
					<h3 class="box-title">Help & Support</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="helpAndSupport" class="form-control ckeditor" placeholder="Help & Support content" required>
            <?php echo $row["helpAndSupport"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="HelpAndSupport" value="<?php echo $row["id"] ?>">Update<i id="btnHelpAndSupport" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					</div>
   
					<div class="box-body">
					<h3 class="box-title">Who we are</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="who_we_are" class="form-control ckeditor" placeholder="Who we are" required>
            <?php echo $row["who_we_are"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="WhoId" value="<?php echo $row["id"] ?>">Update<i id="btnWhoWeAre" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-xs-12">				
				<div class="box">
					<div class="box-header">
					</div>
   
					<div class="box-body">
					<h3 class="box-title">Legal</h3>

<?php foreach ($about as $row) { ?>					
		<form method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<div class="form-group">
            <textarea id="" class="form-control ckeditor" placeholder="Who we are" required>
            <?php echo $row["legal"] ?>	
            </textarea>
            </div>
            <button type="button" class="btn btn-success" id="legal" value="<?php echo $row["id"] ?>">Update<i id="btnlegal" style="display:none" class="spinner fa fa-spinner fa-spin fa-fw"></i></button>
      	</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>		
		</div>

    </section>
</div>


<div class="modal" id="myMessageModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

     
      <!-- Modal body -->
      <div class="modal-body">
      	<div id="success"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php include_once('include/footer.php'); ?>
<script>
$(document).ready(function(){
$('#UpdateAbout').on('click', function() {

     for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var about = $("#aboutContent").val();
        var Id= $("#UpdateAbout").val();

		    $.ajax({
		    url: "<?php echo base_url("Admin/ContentManagement/UpdateAbout");?>",
			type: "POST",
			dataType:'json',
			cache: false,
		    data: {
		    	Id: Id,
		    	about:about
		    },
		    beforeSend:function(){
		      $('#UpdateAbout').prop('disabled',true);
		      $('#btn-load').show();
		    },
				    success:function(dataResult) {
		    		
		    			$("#myMessageModal").modal('show');
						$("#success").html(dataResult.message);	
						$('#UpdateAbout').prop('disabled',false);
						$('#btn-load').css("display", "none");
					
		      }
		  });
		  return false;


    });

$("#UpdateAboutFooter").on("click", function(){
	for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var aboutFooter = $("#AboutFooterContent").val();
        var Id= $("#UpdateAboutFooter").val();

		    $.ajax({
		    url: "<?php echo base_url("Admin/ContentManagement/UpdateAboutFooter");?>",
			type: "POST",
			dataType:'json',
			cache: false,
		    data: {
		    	Id: Id,
		    	aboutFooter:aboutFooter
		    },
		    beforeSend:function(){
		      $('#UpdateAboutFooter').prop('disabled',true);
		      $('#btn-load-AbFooter').show();
		    },
				    success:function(dataResult) {
		    		
		    			$("#myMessageModal").modal('show');
						$("#success").html(dataResult.message);	
						$('#UpdateAboutFooter').prop('disabled',false);
						$('#btn-load-AbFooter').css("display", "none");

		      }
		  });
		  return false;

});

$("#Newsletter").on("click", function(){
	for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var newLetter = $("#newLetter").val();
        var Id= $("#Newsletter").val();

		    $.ajax({
		    url: "<?php echo base_url("Admin/ContentManagement/UpdateNewsletter");?>",
			type: "POST",
			dataType:'json',
			cache: false,
		    data: {
		    	Id: Id,
		    	newLetter:newLetter
		    },
		    beforeSend:function(){
		      $('#Newsletter').prop('disabled',true);
		      $('#btn-loadNewsletter').show();
		    },
				    success:function(dataResult) {
		    		
		    			$("#myMessageModal").modal('show');
						$("#success").html(dataResult.message);	
						$('#Newsletter').prop('disabled',false);
						$('#btn-loadNewsletter').css("display", "none");

		      }
		  });
		  return false;

});

$("#HelpAndSupport").on("click", function(){
	for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var helpAndSupport = $("#helpAndSupport").val();
        var Id= $("#HelpAndSupport").val();

		    $.ajax({
		    url: "<?php echo base_url("Admin/ContentManagement/UpdateHelp");?>",
			type: "POST",
			dataType:'json',
			cache: false,
		    data: {
		    	Id: Id,
		    	helpAndSupport:helpAndSupport
		    },
		    beforeSend:function(){
		      $('#HelpAndSupport').prop('disabled',true);
		      $('#btnHelpAndSupport').show();
		    },
				    success:function(dataResult) {
		    		
		    			$("#myMessageModal").modal('show');
						$("#success").html(dataResult.message);	
						$('#HelpAndSupport').prop('disabled',false);
						$('#btnHelpAndSupport').css("display", "none");

		      }
		  });
		  return false;

});

$("#WhoId").on("click", function(){
	for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var who_we_are = $("#who_we_are").val();
        var Id= $("#WhoId").val();

		    $.ajax({
		    url: "<?php echo base_url("Admin/ContentManagement/UpdateWhoWeAre");?>",
			type: "POST",
			dataType:'json',
			cache: false,
		    data: {
		    	Id: Id,
		    	who_we_are:who_we_are
		    },
		    beforeSend:function(){
		      $('#Who_we_are').prop('disabled',true);
		      $('#btnWhoWeAre').show();
		    },
				    success:function(dataResult) {
		    		
		    			$("#myMessageModal").modal('show');
						$("#success").html(dataResult.message);	
						$('#Who_we_are').prop('disabled',false);
						$('#btnWhoWeAre').css("display", "none");

		      }
		  });
		  return false;

});

});


</script>
