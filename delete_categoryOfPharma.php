<?php
	include('conn.php');

	$id = $_GET['category'];

	$sql="delete from coursetype where coursetypeid='$id'";
	$conn->query($sql);

	header('location:categoryOfPharma.php');
?>