<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="delete from course where courseid='$id'";
	$conn->query($sql);

	header('location:productOfPharma.php');
?>