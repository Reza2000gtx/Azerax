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
		<h1> Manufacturer<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"> Manufacturer</a></li>
			<li class="active">List</li>
		</ol>
    </section>

    <div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
          </div>
    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msgf'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All  Manufacturer's </h3>

						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladd">Add  Manufacturer</button>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Brand</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;	foreach($manufacturerlist as $row){ ?>
								<tr class="delete_mem<?php echo html_escape($row['id']); ?>">
								
									<td class="row-index"><?php echo $i; ?></td>
								
									<td><?php echo html_escape($row['name']); ?></td>
									<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['id']); ?>"><i class="fa fa-edit"></i></button>
								     	<a href="javascript:void(0)" data-id="<?php echo html_escape($row['id']); ?>" data-nid="<?php echo $i; ?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo html_escape($row['id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Manufacturer</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo html_escape($row['id']); ?>"></div>
								     <form method="post" onsubmit="return editmanufacturer(<?php echo html_escape($row['id']); ?>);" id="editmanufacturer<?php echo html_escape($row['id']); ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Manufacturer Name</label>
								       	<input type="text" name="name" value="<?php echo html_escape($row['name']); ?>" class="form-control">
								       </div>

							      
								      <input type="hidden" name="manufacturer_id" value="<?php echo html_escape($row['id']); ?>">
								      <!-- Modal footer -->
								      <div class="modal-footer">
								      	  <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								      </div>
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
    </section>
</div>
<!-- The Modal -->
<div class="modal" id="myModaladd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Manufacturer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" onsubmit="return addmanufacturer();" id="addmanufacturer">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
       	<label>Manufacturer Name</label>
       	<input type="text" required name="name" class="form-control">
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
<?php include_once('include/footer.php'); ?>


<script type="text/javascript">
$(document).ready(function(){
    $("#bootstrap-data-table").on('click','.delete',function(){
  
        var id = $(this).data('id');
        var nid = $(this).data('nid');
        if (confirm("Are you sure you want to delete?")) {
        $.ajax({ type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Manufacturer/deletemanufacturer?id="+id,
         success:function(html)
       {
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Category has been deleted successfully.');
        
            //   var child = $(this).closest('tr').nextAll();
            //   child.each(function () {
            //   var sid = $(this).closest('tr').find('td:eq(0)').text();
            //   console.log(sid);
            //   alert(sid);
            //   var nid= parseInt(sid);
            //   nid=nid-1 ;
            //   $(this).closest('tr').find('td:eq(0)').html(nid);
            //   });
        $(".delete_mem" + id).fadeOut('slow');
        
          $('#bootstrap-data-table').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>Admin/Manufacturer/empList'
          },
          'columns': [
             { data: 'name' },
            ]
        
          });
          }
         });
        }
    });
});
</script>
