<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Siteconfig
 *
 * @author https://roytuts.com
 */
class Sendsms {
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

    function send($phoneCode,$phoneNumbe,$msg) {
      $id = "AC574f34445a6bf89ccd0c58cf6679d3ff";
$token = "88f3d711933b0bcf398f6589397e1bac";
$url = "https://api.twilio.com/2010-04-01/Accounts/AC574f34445a6bf89ccd0c58cf6679d3ff/Messages.json";
$from = "+12242035931";
$to ='+'.$phoneCode.$phoneNumbe ; // twilio trial verified number
$body = $msg;
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);
$post = http_build_query($data);
$x = curl_init($url );
curl_setopt($x, CURLOPT_POST, true);
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
curl_setopt($x, CURLOPT_POSTFIELDS, $post);
$y = curl_exec($x);
curl_close($x);
return true;

}

function bulk_send($phonenumbers,$msg) {
      $id = "AC574f34445a6bf89ccd0c58cf6679d3ff";
$token = "88f3d711933b0bcf398f6589397e1bac";
$url = "https://api.twilio.com/2010-04-01/Accounts/AC574f34445a6bf89ccd0c58cf6679d3ff/Messages.json";
$from = "+12242035931";
 $to =$phonenumbers; // twilio trial verified number
$body = $msg;
$data = array (
    'From' => $from,
    'toBinding' => $to,
    'Body' => $body,
);
$post = http_build_query($data);
$x = curl_init($url );
curl_setopt($x, CURLOPT_POST, true);
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
curl_setopt($x, CURLOPT_POSTFIELDS, $post);
$y = curl_exec($x);
curl_close($x);
print_r($y);
//return true;

}

}


/* End of file Site_Config.php */
/* Location: ./application/libraries/Site_Config.php */