<?php

include 'header.php';
titlebar();

	unset($_SESSION['username']);
	unset($_SESSION['email']);
	
	if(isset($_SESSION['admin']))
	{
		unset($_SESSION['admin']);
	}
	
	session_destroy();
	
	header('Location: ../index.php');
    exit();

?>