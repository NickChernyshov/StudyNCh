<?php
session_start();
mysql_connect ("localhost", "root", "lifeisgood1984");
mysql_select_db ("reg");
mysql_query("SET NAMES utf8");

$login = $_SESSION['loguser']['login'];
$password = $_SESSION['loguser']['password'];
$id_user = $_SESSION['loguser']['id'];
?>