<?php
	include('conn.php');

	$cname=$_POST['cname'];

	$sql="insert into coursetype (coursetypename) values ('$cname')";
	$conn->query($sql);

	header('location:categoryOfPharma.php');

?>