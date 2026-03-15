<?php
error_reporting(E_ALL); 
session_start();

define('DbHost', 'localhost');
define('DbUser', 'root');
define('DbPass', '');
define('DbName', 'event_project');  
define('MAIN_URL', 'http://bluediamondresearch.com/WEB01/Event/');  
define('ADMIN_URL', 'http://bluediamondresearch.com/WEB01/Event/admin/');
define('Email_add', 'info@bluediamondresearch.com');
define('Project', 'Event');


class Functions
{
	function __construct()
	{ 
		$this->con=mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect: ' . mysqli_connect_error());
	}
	function query($q)
	{
		$sqlquery = mysqli_query($this->con,$q);
		return $sqlquery;
	}
	function insert_id()
	{
		$id = mysqli_insert_id($this->con);
		return $id;
	}
	function real_sring($q)
	{
		$string = mysqli_real_escape_string($this->con, $q);
		return $string;
	}
	function redirect($location)
	{ 
		echo '<script>window.location.href="'.$location.'"</script>';
		die(); 
	}
	function Get_admin_data($id)
	{
		$data = false;
		$sql = "select * from tbl_admin where admin_id = '".$id."'";
		$run = $this->query($sql);
		if(mysqli_num_rows($run) > 0)
		{
			$data = mysqli_fetch_assoc($run);
		}
		return $data;
	}

}

?>