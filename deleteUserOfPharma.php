<?php
	include('conn.php');

	$id = $_GET['users'];

	$sql="delete from admin where id='$id'";
	$conn->query($sql);
	echo 'delete';

	header('location:AdminsOfPharma.php');
?>