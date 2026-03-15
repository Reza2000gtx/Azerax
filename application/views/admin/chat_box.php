<?php 
include_once('include/header.php'); 
?>
<style type="text/css">
.recever .message-data{
  padding-left: 0;
  padding-right: 55px;
}
.recever .message-data .mess_dat_img{
    left: auto;
  right: 0;
}
.recever .messge_cont{
  text-align: right;
}
.recever {
  text-align: right;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Ticket/Contact us<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Ticket </a></li>
			<li class="active">us</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('reply'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">
						<?php 
						$admin_id=$this->session->userdata('admin_id');
						$admin=$this->common_model->GetDataById('admin',$admin_id);
                     $ticket_id=$_GET['ticket_id'];
                     $result = $this->common_model->GetSingleData('ticket',array('ticket_id'=> $ticket_id));
                    echo $result['subject'];
                ?>
                </h3>
                    </div>
					
					<form action="<?php echo base_url();?>Admin/reply-action" method="post">
					    <ul class="ul_set" id="response">
                    <?php 
                        $ticket_id=$_GET['ticket_id'];
                        //$user_id=$user_id;
                        
                        $data = $this->common_model->GetAllData('ticket',array('ticket_id'=>$ticket_id));
                        $output = '';
                        foreach($data as $result1)
                        {
                            $class='sender';
                            $user_id=$result1['user_id'];
                            $user = $this->common_model->GetSingleData('users',array('user_id'=>$user_id));
                            
                            $user_name=  $user['fname'];

                            if($user['profile'])
                            {
                              $image=base_url().'assets/profile/'.$user['profile'];
                            }
                            else
                            {
                              $image=base_url().'assets/profile/user.png';
                            }
                            if($user_id!=$this->session->userdata('user_id')){
                                $class='recever';
                                $user_id=$result1['user_id'];
                                $admin = $this->common_model->GetSingleData('admin',array('id'=>$user_id));
                                $user_name= $admin['admin_name'];
                                $image=base_url().'assets/site/img/logo.png';
                            }
                            $output .= '
                                  <li class="'.$class.'" >
                                  <div class="chat-box-inner message-data">
                                 
                                  <div class="mess_dat_img">
                                  <img src="'.$image.'" height="50" width="50">
                                 </div>
                                    <div class="chat-box-content messge_cont">

                                   <p>
                                   <span class="message_box" style="text-align: left;"> 
                                   '.$user_name.' - '.$result1["message"].'
                                   
                                </span>
                                   </p>
                                  <span class="time"><i class="fa fa-clock-o"></i>'.date('h:i a',strtotime($result1['created_at'])).' | '.$result1['created_at'].'</span>
                                   </div>
                                   </div>
                                  </li>
                                  ';
                        }   
                             //$output .= '';
                             echo $output;
                     ?>  
                     

                  

        
        
         </ul>
                
					    <div class="form-group">
                				<label></label>
                				<textarea class="form-control" required name="message" placeholder="Type your message here..."></textarea>
                							    <div class="errorMessage"><?php echo form_error('message'); ?></div>

			                </div>	
			                <input type="hidden" name="subject" id="subject" value="<?php echo $result['subject'];?>" />
			                <input type="hidden" name="name" id="name" value="<?php echo $admin['admin_name'];?>" />
			                <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticket_id;?>" />
			                <input type="hidden" name="email" id="email" value="<?php echo $admin['admin_email'];?>" />
			                <input type="hidden" name="user_id" id="user_id" value="<?php echo $admin_id;?>" />
                            <div class="col-md-12 text-right">
						        <button type="submit" value="submit" class="btn submit_btn">Send</button>
					        </div>
			</form>
   
					
				</div>
			</div>
		</div>
    </section>
</div>
<?php include_once('include/footer.php'); ?>
