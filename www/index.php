<?php
			//chose content page when load site
	if (empty($_GET['page'])) {
		$page = 1;
	} else {
		$page = (int)$_GET['page'];
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.1 Transitional//ENG">
			<!--make main page-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Study Project SJ</title>
		<link rel="stylesheet" type="text/css" href="media/styles/style.css">		
	</head>
	<body>
<?php
		include_once("templates/header.html");
		//make content header
	if (($page == 4) || ($page == 6) || ($page == 7) || ($page == 8)){
		include_once("logic/noLogin.php");
	} else { include_once("logic/login.php"); }

?>
			
<div id="content">
<?php

		//make content page
    if ($page == 1) {
        include("media/pages/1.html");
    } elseif ($page == 2) {			
         include("media/pages/2.html");
    } 	elseif ($page == 3) {
         include("media/pages/3.html");
    }	elseif ($page == 4)	{			
   	     include("logic/registration.php");
	}	elseif ($page == 5)	{
		 include ("logic/profile.php");
	}   elseif ($page == 6)	{		
		 include ("logic/articles.php");
    }	elseif ($page == 7)	{			
		 include ("logic/article.php");
	}	elseif ($page == 8)	{
		include ("logic/payment.php");
	}
	   	 //$_SESSION['page'] = $page;
 ?>	
</div>

<div id="rssnews">
<?php
include_once("logic/rssnews.php");
?>
</div>

<?php
		//make view footer
	include_once('templates/footer.html');
?>
	</body>
</html>