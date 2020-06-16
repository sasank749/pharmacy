<?php
	include('conn.php');

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	

	$sql="select * from chapter where chapterid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	

	$sql="update chapter set chaptername='$pname', courseid='$category' where chapterid='$id'";
	$conn->query($sql);

	header('location:addChapterOfPharma.php');