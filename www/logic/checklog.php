<?php
					//check login in data base and give back answer
//include_once("C:/Apache/study.sj/www/logic/bd.php");
include_once("bd.php"); //????????????????

$login = $_POST['login'];
	
$query = ("SELECT id FROM users WHERE login='$login'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
			
				echo '<font size="5" color="red">User with this login already exist!</font>';
			}	else	{ 
			
				echo '<font size="4" color="green">This login not used</font>';
			}
	


