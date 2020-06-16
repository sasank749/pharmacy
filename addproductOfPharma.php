<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$category=$_POST['category'];
    $price=$_POST['price'];
	$description=$_POST['description'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into course (coursename, coursetypeid, price,description, photo) values ('$pname', '$category', '$price', '$description' ,'$location')";
	$conn->query($sql);

	header('location:productOfPharma.php');

?>