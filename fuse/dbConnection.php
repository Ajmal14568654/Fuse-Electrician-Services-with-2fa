<?php
	// $db_host="sql100.infinityfree.com";
	// $db_user="if0_40590349";
	// $db_password="LdlMuL4S38apiVn";
	// $db_name="if0_40590349_fuse";
	// $db_port=3306;

	$db_host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="fuse";
	$db_port=3306;
	
	//create connction
	$conn=new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);
	
	//checking connection
	if($conn->connect_error)
	{
		die("CONNECTION FAILED");
	}
	
?>