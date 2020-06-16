<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: loginOfPharma.php");
exit(); }
?>