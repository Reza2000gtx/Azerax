<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

  public function GetDataByOrderLimit($table,$where,$odf=NULL,$odc=NULL,$limit=NULL,$start=0) {
    if($where) {
      $this->db->where($where);
    }		 

    if($odf && $odc){
      $this->db->order_by($odf,$odc);
    }
       
    if($limit){
      $this->db->limit($limit, $start);
    }

    $sql=$this->db->get($table);
    
    if($sql) {
      return $sql->row_array();
    }else{
      return array();
    }
  }

  public function GetDataById($table,$value) {
    $this->db->where('id', $value);
    $obj=$this->db->get($table);
    if($obj->num_rows() > 0){
      return $obj->row_array();
    } else {
      return false;
    }
  }
  
  public function InsertData($table,$data) {
    $insert = $this->db->insert($table,$data);
     if($insert){
      return $this->db->insert_id();
    }else{
      return false;
    }
  }
  
  function GetAllData($table,$where=null,$ob=null,$obc='desc',$limit=null,$offset=null,$select=null,$group_by=null){
  if($select) {
$this->db->select($select);

}else{
  $this->db->select('*');
}
   $this->db->from($table);

    if($where) {
      $this->db->where($where);
    }
    
    if($group_by) {
      $this->db->group_by($group_by);
    }
    if($ob) {
      $this->db->order_by($ob,$obc);
    }
    if($limit) {
      $this->db->limit($limit,$offset);
    }
    $query = $this->db->get(); 
    if($query->num_rows()) {	
      return $query->result_array();
    } else {
      return array();
    }
  }
     // print_r($this->db->last_query($query));

  function GetSingleData($table,$where=null,$ob=null,$obc='desc'){
    if($where) {
      $this->db->where($where);
    }
    if($ob) {
      $this->db->order_by($ob,$obc);
    }
    $query = $this->db->get($table);
    if($query->num_rows()) {	
      return $query->row_array();
    } else {
      return false;
    }
  }
  

  function join_records($table, $joinTable,$joins, $where = false, $select = '*', $ob = false, $obc = 'DESC',$limit=null,$offset=null){
    /* https://github.com/rahimnagori/cheat-sheet/blob/master/ci_dynamic_join.php */
    $this->db->select($select);
    $this->db->from($table);
    
      $this->db->join($joinTable,$joins, 'left');

    if($where) $this->db->where($where);
    if($ob) $this->db->order_by($ob, $obc);
    if($limit) {
      $this->db->limit($limit,$offset);
    }
    $query = $this->db->get();
    return $query->result_array();
  }



  public function UpdateData($table,$where,$data)
  {
    if($where)
    {
    $this->db->where($where);
    $obj=$this->db->update($table,$data);
    }
    else
    {
      $obj=$this->db->update($table,$data);
    }
    // FIXED: this used to always return true regardless of what happened
    // (both branches of the old ternary returned true). $obj itself is
    // CodeIgniter's own boolean for "did the query execute successfully" -
    // using affected_rows() instead would have been WRONG too, since it's
    // 0 both when nothing matched AND when a matching row's values were
    // already identical (a legitimate, successful no-op save).
    return $obj;
  }

  public function DeleteData($table,$where)
  {
    $this->db->where($where);
    $obj=$this->db->delete($table);
    return $obj;  
  }

  public function GetColumnName($table,$where=null,$name=null,$double=null,$order_by='id',$order_col='asc') {
    if($name){
      $this->db->select($name);
    } else {
      $this->db->select('*');
    }
    
    if($where){
      $this->db->where($where);
    }
    
    if($order_by && $order_col){
      $this->db->order_by($order_by,$order_col);
    }
    $sql=$this->db->get($table);
    if($double){
      $data = array();
    } else {
      $data = false;
    }
    if($sql->num_rows() > 0){
      if($double){
        $data = $sql->result_array();
      } else {
        $data = $sql->row_array();
      } 
      
    }
    return $data;
  }

    function GetUserWishlist($user_id){
  $this->db->select('*');
    $this->db->from('post_watchlist'); 
    $this->db->join('post', 'post.id=post_watchlist.post_id', 'left');
    $this->db->where('post_watchlist.user_id',$user_id);
        $this->db->group_by('post_watchlist.post_id');

    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    {
     return $query->result_array();
    }
    else
    {
       return array();
    }
  }
  function Getchatusers($user_id){
    $this->db->select('*');
      $this->db->from('conversation'); 
      $this->db->where('sender_id',$user_id);
      $this->db->or_where('reciever_id',$user_id);

      $this->db->order_by('created_on','DESC');
      $query = $this->db->get(); 
      if($query->num_rows() != 0)
      {
       return $query->result_array();
      }
      else
      {
         return array();
      }
    }
    function SendMail($to,$subject,$body,$attach='',$replyTo=''){
      $this->load->library('email');

      $config = array();
      $config['protocol']     = 'smtp';
      $config['smtp_host']    = 'ssl://smtp.gmail.com';
      $config['smtp_user']    = defined('SMTP_USER') ? SMTP_USER : '';
      $config['smtp_pass']    = defined('SMTP_PASS') ? SMTP_PASS : '';
      $config['smtp_port']    = 465;
      $config['charset']      = "utf-8";
      $config['newline']      = "\r\n";
      $config['mailtype']     = 'html';
      $config['wordwrap']     = TRUE;
      $config['validate']     = FALSE;

      $this->email->initialize($config);

      $mail_from_title = 'Azerax';
      $from = defined('SMTP_USER') ? SMTP_USER : 'admin@azerax.com';
      
     $headers ="From: ".$mail_from_title." <".$from."> \n";
     if($replyTo){
     $headers .=    "Reply-To:".$replyTo." \n";
    }
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
      $logo =base_url().'assets/site/img/logo2.png';
       $msg = '<body style="margin:0px;">
          <table style="background-color:#555058; border-collapse:collapse!important; width:100%; border-spacing:0" width="100%" bgcolor="#fff">
            <tbody>
              <tr>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top"></td>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px; vertical-align:top; background:#ffffff; display:block; margin:0 auto!important; max-width:600px; width:600px; padding:0" width="600" valign="top">
                  <div style="display:block; margin:0 auto; max-width:600px; padding:0; background:#ffffff">
                    <div>
                      <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                        <tbody>
                          <tr>
                            <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:10px 0 10px 0;color:#ffffff; margin-top:20px; width:100%; border-bottom:none; background-color:#fca311; margin-bottom:30px" width="100%" valign="top" bgcolor="#f8f8f8">
                              <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0; color:#000000" valign="top" align="center"><img src="'.$logo.'" style="max-width:100%; margin:6px 0 0 21px;" width="140"></td>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0; color:#000000" valign="top" align="right"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top">
                              <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px; vertical-align:top; padding:30px" valign="top">
                                      '.$body.'
                                      <p>Kind Regards</p>
                                      <p><b>'.$mail_from_title.'</b></p>
                                      <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                      <tbody>
                        <tr style=" margin:0 auto; background:#14213D; color:#ffffff; margin-top:20px; font-size:16px">
                          <td style="width:100%">
                            <p style="text-align: center; color:#ffffff;" > © Copyright 2021 '.$mail_from_title.'. All Rights Reserved.</p>
                          </td>
                          
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </td>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top"></td>
              </tr>
            </tbody>
          </table>
        </body>';

      $this->email->from($from, $mail_from_title);
      $this->email->to($to);
      if($replyTo){
          $this->email->reply_to($replyTo);
      }
      $this->email->subject($subject);
      $this->email->message($msg);

      if($this->email->send()){
          return 1;
      } else {
          // Log the real failure reason so future issues are actually
          // diagnosable, instead of failing silently like before.
          log_message('error', 'SendMail failed to '.$to.': '.$this->email->print_debugger(array('headers')));
          return 0;
      }
  }
  
  function SendMail_old($toz,$sub,$body)
  {
     $admin=$this->GetAllData('admin',array('id'=>1));
     $to =$toz;	
     $from =$admin[0]['mail_from_email'];
     $signature =$admin[0]['mail_signature'];
     $mail_from_title =$admin[0]['mail_from_title'];
     $logo =base_url().'assets/img/'.$admin[0]['website_logo'];
    $headers ="From: ".$admin[0]['mail_from_title']." <".$from."> \n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
    $subject =$sub;
    $msg = '<body style="margin:0px;">
          <table style="background-color:#f8f8f8; border-collapse:collapse!important; width:100%; border-spacing:0" width="100%" bgcolor="#f8f8f8">
            <tbody>
              <tr>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top"></td>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px; vertical-align:top; background:#ffffff; display:block; margin:0 auto!important; max-width:600px; width:600px; padding:0" width="600" valign="top">
                  <div style="display:block; margin:0 auto; max-width:600px; padding:0; background:#ffffff">
                    <div>
                      <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                        <tbody>
                          <tr>
                            <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:10px 0 10px 0;color:#ffffff; margin-top:20px; width:100%; border-bottom:none; background-color:#f1f1f1; margin-bottom:30px" width="100%" valign="top" bgcolor="#f8f8f8">
                              <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0; color:#000000" valign="top" align="center"><img src="'.$logo.'" style="max-width:100%; margin:6px 0 0 21px;" width="140" height="140"></td>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0; color:#000000" valign="top" align="right"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top">
                              <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px; vertical-align:top; padding:30px" valign="top">
                                      '.$body.'
                                      <p>Kind Regards</p>
                                      <p><b>'.$mail_from_title.'</b></p>
                                      <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <table style="border-collapse:collapse!important; width:100%; border-spacing:0" width="100%">
                      <tbody>
                        <tr style=" margin:0 auto; background:#fca311; color:#fca311; margin-top:20px; font-size:16px">
                          <td style="width:100%">
                            <p style="text-align: center; color:#333;" > © Copyright 2020 '.$mail_from_title.'. All Rights Reserved.</p>
                          </td>
                          
                        </tr>
                        <tr style=" margin:0 auto; color:#ffffff; margin-top:20px; font-size:16px">
                          <td style="width:100%">
                            <p style="text-align: center; color:#333;" >'.$signature.'.</p>
                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
                <td style="border-collapse:collapse; font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif; font-size:14px; vertical-align:top; padding:0" valign="top"></td>
              </tr>
            </tbody>
          </table>
        </body>';
    if(mail($to,$subject,$msg,$headers)) {
      return 1;
    } else {
      return 0;
    }

  }
}
