<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="delete from chapter where chapterid='$id'";
	$conn->query($sql);

	header('location:addChapterOfPharma.php');