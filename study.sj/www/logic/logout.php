<?php 
			//item logOut pressed
	include_once("bd.php"); 

$page = $_SESSION['page'];
session_unset();
/*unset($_SESSION['loguser']['password']);
unset($_SESSION['loguser']['login']); 
unset($_SESSION['loguser']['id']);*/// delete variables from sessions
	if ($page==5)	{
	
		exit("<meta http-equiv='Refresh' content='0; URL=../index.php?page=0'>");
	}	else	{
	
		exit("<meta http-equiv='Refresh' content='0; URL=../index.php?page=".$page."'>");
	}


