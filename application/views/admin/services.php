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
		<h1>Services<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">services</a></li>
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Services</button>
					</div>
   
					<div class="box-body">
					<h4 class="box-title">Services list</h4>
          <div id="success"></div>
          <div id="ServicesShow"></div>

					</div>
				</div>
			</div>
		</div>


	

    </section>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Enter services details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="AddProduct" onsubmit="return addProduct();"  enctype="multipart/form-data">
        <div class="form-group">
            <label >Product:</label>
            <input type="text" class="form-control" id="product" placeholder="Enter Name" name="product" required />
            <div id='ProdErr'></div>
          </div>
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control" id="description" placeholder="Enter description" name="description" required></textarea>
            <div id='DescripErr'></div>
          </div>
        <div class="form-group">
            <label >Image:</label>
            <span style="color:red; font-size:10px">Only .jpeg, .jpg, .png, .gif formats are allowed.</span>
            <input class="form-control" type="file" id="image" name="image" required accept='image/*'/>

          </div>
          <div class="form-group">
            <img class="imgUploadImgMsg" id="output" height="100px" width="100px" style="display:none"/>
          </div> 
          <button type="submit" class="btn btn-primary" id="SaveProduct">Submit<i style="display:none" class="spinner fa fa-spinner fa-spin fa-fw btn-load"></i></button>
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--Delete Confirm Modal-->
<div class="modal" id="delConfirmModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

     
      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
       <p>Are you sure you want to delete this?</p>
      <!-- Modal footer -->
      <div class="modal-footer " style="text-align: center;">

      <button type="button" class="btn btn-success" id="DeleteSer">Yes<i style="display:none" class="spinner fa fa-spinner fa-spin fa-fw btn-loadDel"></i></button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>
</div>
<!--Edit Modal-->
<div class="modal" id="EditModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

     <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit services</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div id="EditContent"></div>	
      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<!--Message Modal-->
<div class="modal" id="">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

     
      <!-- Modal body -->
      <div class="modal-body">
      	
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
GetServices();
function GetServices(){
  $.ajax({
      url: "<?php echo base_url("Admin/ServiceManagement/showServices");?>",
      type: "POST",
      cache: false,
      success:function(dataResult) {
          $("#ServicesShow").html(dataResult);
          }
      });
}

});
 $('#image').on("change",function () {

                var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    // alert("Only '.jpeg','.jpg' formats are allowed.");
                    alert("Only .jpeg, .jpg, .png, .gif formats are allowed.");
                    $('#image').val("");
                    $(".imgUploadImgMsg").css("display", "none");
                }
                else {
                    function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#output').attr('src', e.target.result);
                  $('.imgUploadImgMsg').css("display", "block");
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
            }
            readURL(this);
                }
                
 });


function addProduct() {
     $.ajax({
      url: "<?php echo base_url("Admin/ServiceManagement/AddServices");?>",
      type:"POST",
      cache:false,
      contentType: false,
      processData: false,   
      data:new FormData($('#AddProduct')[0]),
      dataType:'json',
      beforeSend:function(){
          $('#SaveProduct').prop('disabled',true);
          $('.btn-load').show();
      },
      success:function(dataResult) {
         if(dataResult.status==1){
            $("#myModal").modal('hide'); 
            $("#myMessageModal").modal('show');
            $("#success").html(dataResult.message); 
            $('#SaveProduct').prop('disabled',false);
            $('.btn-load').hide();
            $('#AddProduct')[0].reset();	
            $(".imgUploadImgMsg").css("display", "none");
            $("#ProdErr").html('');
            $("#DescripErr").html('');
            $.ajax({
              url: "<?php echo base_url("Admin/ServiceManagement/showServices");?>",
              type: "POST",
              cache: false,
              success:function(dataResult) {
                  $("#ServicesShow").html(dataResult);
                  }
              });
          }
          else {
            $("#myMessageModal").modal('show');
            $("#success").html(dataResult.message); 
            $('#SaveProduct').prop('disabled',false);
            $('.btn-load').hide();
            $("#ProdErr").html(dataResult.messageProduct);
            $("#DescripErr").html(dataResult.messageDesc);
          }
          $( "#success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 700 );
          }
      });
      return false;

}


$(document).on('click','#DeleteServices',function(){
	var ID = $(this).attr('data-id');
	$("#delConfirmModal").modal('show');
	$("#DeleteSer").val(ID);
});

$('#DeleteSer').on('click', function() {
 var ID = $("#DeleteSer").val();
 $.ajax({
      url: "<?php echo base_url("Admin/ServiceManagement/deleteProduct");?>",
      type:"POST",  
      data: {ID:ID},
      dataType:'json',
      beforeSend:function(){
          $('.btn-loadDel').show();
      },
      success:function(dataResult) {
      		$("#delConfirmModal").modal('hide');
            $("#myMessageModal").modal('show');
            $('.btn-loadDel').hide();
            $("#success").html(dataResult.message); 
            $.ajax({
              url: "<?php echo base_url("Admin/ServiceManagement/showServices");?>",
              type: "POST",
              cache: false,
              success:function(dataResult) {
                  $("#ServicesShow").html(dataResult);
                  }
              });
    $("#success").fadeIn( 300 ).delay( 1500 ).fadeOut( 700 );
          }
      });
      return false;
});
$(document).on('click','#EditServices',function(){
var ID = $(this).attr('data-id');
 $.ajax({
      url: "<?php echo base_url("Admin/ServiceManagement/EditProduct");?>",
      type:"POST",  
      data: {ID:ID},
      success:function(dataResult) {
            $("#EditModal").modal('show');
            $("#EditContent").html(dataResult);
          }
      });
      return false;
});
function UpdateProduct() {
     $.ajax({
      url: "<?php echo base_url("Admin/ServiceManagement/UpdateServices");?>",
      type:"POST",
      cache:false,
      contentType: false,
      processData: false,   
      data:new FormData($('#UpdateProduct')[0]),
      dataType:'json',
      beforeSend:function(){
          $('#updateProductbtn').prop('disabled',true);
          $('.btn-loadUpdate').show();
      },
      success:function(dataResult) {
      	if(dataResult.status==1){
        	$("#EditModal").modal('hide');
            $("#myMessageModal").modal('show');
            $('.btn-loadUpdate').hide();
            $("#success").html(dataResult.message);
            $('#updateProductbtn').prop('disabled',false); 
            $("#ProdErrEdit").html('');
            $("#DescripErrEdit").html('');
             $.ajax({
              url: "<?php echo base_url("Admin/ServiceManagement/showServices");?>",
              type: "POST",
              cache: false,
              success:function(dataResult) {
                  $("#ServicesShow").html(dataResult);
                  }
              });      		
      	}
      	else {
      		$("#myMessageModal").modal('show');
      		$("#success").html(dataResult.message);
            $('.btn-loadUpdate').hide();
            $("#ProdErrEdit").html(dataResult.messageProduct);
            $("#DescripErrEdit").html(dataResult.messageDesc);
            $('#updateProductbtn').prop('disabled',false);
      	}
          $( "#success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 700 );
          }
      });
      return false;

}
function readURL(input,imgid='',msgid='') {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#'+imgid).attr('src', e.target.result);
      $('#'+imgid).css("display", "block");
      $('#'+msgid).html('<b>Live preview</b>');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#imgInp")[0].change(function() {
  readURL(this);
});
</script>
