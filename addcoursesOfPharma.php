<?php
	include('conn.php');

	$id=$_GET['category'];

	$cname=$_POST['cname'];

	$sql="update users set coursename='$cname' where courseid='$id'";
	$conn->query($sql);

	header('location:studentIndexOfPharma.php');
?>