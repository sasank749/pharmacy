<?php include('headerOfPharma.php'); ?>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="registerOfPharma.php"><b><img src="pharmatrain.png" alt=""></b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="registerOfPharma.php">CoursesList</a></li>
        <li><a href="registerOfPharma.php">Buyings</a></li>
        <li><a href="registerOfPharma.php">CourseSales</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenace <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="registerOfPharma.php">AddCourseType</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="registerOfPharma.php">AddCourseName</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="styleOfPharma.css" />
</head>
<body>
<?php
require('conn.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($conn,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($conn,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
 $firstname = mysqli_real_escape_string($conn,$firstname); 
 $lastname = stripslashes($_REQUEST['lastname']);
        //escapes special characters in a string
 $lastname = mysqli_real_escape_string($conn,$lastname); 
 $city = stripslashes($_REQUEST['city']);
        //escapes special characters in a string
 $city = mysqli_real_escape_string($conn,$city); 
 $country = stripslashes($_REQUEST['country']);
        //escapes special characters in a string
 $country = mysqli_real_escape_string($conn,$country); 
 $phone = stripslashes($_REQUEST['phone']);
        //escapes special characters in a string
 $phone = mysqli_real_escape_string($conn,$phone);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email,firstname,lastname,city,country,phone, trn_date)
VALUES ('$username', '".md5($password)."', '$email','$firstname','$lastname','$city','$country','$phone', '$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='loginOfPharma.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username"  required /><br/>
<input type="email" name="email" placeholder="Email" required /><br/>
<input type="password" name="password" placeholder="Password" required /><br/>
<input type="text" name="firstname" placeholder="FirstName" required /><br/>
<input type="text" name="lastname" placeholder="LastName" required /><br/>
<input type="text" name="city" placeholder="City/town" required /><br/>
<input type="text" name="country" placeholder="Country" required /><br/>
<input type="text" name="phone" placeholder="Mobile" required /><br/>



<input type="submit" name="submit" value="Register" />
	  <p>AlreadyHaveAnAccount ? <a href='loginOfPharma.php'>Login Here</a></p>

</form>
</div>
<?php } ?>
</body>
</html>