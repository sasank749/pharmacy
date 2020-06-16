<?php
	include('conn.php');

	$id=$_GET['category'];

	$cname=$_POST['cname'];

	$sql="update coursetype set coursetypename='$cname' where coursetypeid='$id'";
	$conn->query($sql);

	header('location:categoryOfPharma.php');
?>