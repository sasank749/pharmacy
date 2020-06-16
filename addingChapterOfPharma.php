<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$category=$_POST['category'];
    

	
	$sql="insert into chapter (chaptername, courseid) values ('$pname', '$category')";
	$conn->query($sql);

	header('location:addChapterOfPharma.php');

?>