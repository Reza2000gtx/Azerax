<?php include_once 'include/header.php'; ?>

<div class="commn_dasboard p_120">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mx-auto">
				<div class="right_box">
					<div class="heddding_1">
						<h4>Transaction List</h4>
		          </div>
                
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>UserName</th>
                <th>ProductName</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Transaction ID</th>
                <th>Transaction Status</th>
                <th>Transaction Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php $i=0; $username = $this->common_model->GetSingleData('users',array('user_id'=>$this->session->userdata('user_id')));
	  	       if(!empty($transactdata)) foreach ($transactdata as $tdata) { 
	  	       $productname = $this->common_model->GetSingleData('product',array('id'=>$tdata['tr_productid'])); 
	  	       ?>
	  	       
                <td><?php echo ++$i ;?> </td>
                <td><?php echo $username['fname'] ;?></td>
                <td><?php echo $productname['device_model'];?></td>
                <td><?php echo $tdata['tr_amount'] ;?></td>
                <td><?php echo $tdata['currency'] ;?></td>
                <td><?php echo $tdata['tr_transactionId'] ;?></td>
                <td>
                <?php
                    if($tdata['tr_status']==1)
                    {
                ?>
                    <span style="color:green" >OK</span>
                <?
                    }
                ?>
                </td>
                <td><?php echo $tdata['tr_date'] ;?></td>
            </tr>
          <?php } ?> 
         
        </tbody>
      
    </table>
              

				</div>

				
			</div>


	
		</div>
	</div>
</div>
<?php include_once 'include/footer.php'; ?>