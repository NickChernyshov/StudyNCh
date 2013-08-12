<?php
session_start();
//error_reporting(E_ALL);
//ini_set('show_errors', 'on');
mysql_connect ("localhost", "root", "lifeisgood");
mysql_select_db ("reg");
mysql_query("SET NAMES utf8");

$login = $_SESSION['loguser']['login'];
$password = $_SESSION['loguser']['password'];
$id_user = $_SESSION['loguser']['id'];
?>