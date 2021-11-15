<?php

session_start();
$_SESSION["auth"] = false;
const ADMIN_EMAIL = 'admin@admin.com';
const ADMIN_PASSWORD = '111111';

if(!empty($_POST))
{
	if($_POST['email'] == ADMIN_EMAIL && 
		$_POST['password'] == ADMIN_PASSWORD)
		$_SESSION["auth"] = true;	
	header('Location: adduser.php');
	exit;
}
?>