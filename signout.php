<?php 
session_start();    
unset($_SESSION['name']);
unset($_SESSION['id']);
setcookie('dnuser',null,-1);

$previous_page = $_SERVER['HTTP_REFERER'];
header("location:$previous_page");
?>