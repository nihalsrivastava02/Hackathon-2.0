<?php
	error_reporting(E_ALL^E_NOTICE);
	session_start();
	if($_SESSION['u_type']!= 'A')
    {
    	include 'logout.php';
        die("Invalid user");
     }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index1.css">
	<link rel="stylesheet" type="text/css" href="background.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>admin</title>
</head>
<body class="bg">
	<div>
	<?php
		if(!$_SESSION['login'])
		{
			die('user logged out');
		}
	?>
	<!-- <div style="background-image: url('images/bg1.jpeg');"> -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top " class="navbar-content">
	  	<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  	</button> -->
	  	<a class="navbar-brand" href="student.php">
    		<img src="images/logo.jpeg" width="50" height="50" alt="logo">
  		</a>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      	<li class="nav-item">
		        	<a class="nav-link" href="admin.php">My Institution</a>
		      	</li>
	    	</ul>
	    	<?php
	    		echo  $_SESSION['u_name'];
	    	?>
	    	<a href="logout.php"><img src="images/logout.png" style="width:35px;height:35px;border:1;"></a>
	  	</div>
	</nav>
	<!-- <div class="container-login100" style="background-image: url('images/Ph.D.-in-the-Uttarakhand-Technical-University.png');"> -->
	<div class="table_align">
	<table>
  <tr>
    <td><a href="user_registration.html"><button class="login100-form-btn">create user</button></a></td>
    <td><a href="course_registration.html"><button class="login100-form-btn"> create course</button></a></td>
  </tr>
  <tr>
    <td><a href="update_user.html"><button class="login100-form-btn">update user</button></a></td>
    <td><a href="update_course.html"><button class="login100-form-btn">update course</button></a></td>
  </tr>
</table> 
		<!-- <a href="user_registration.html"><button class="login100-form-btn">create user</button></a>
		<a href="course_registration.html"><button class="login100-form-btn"> create course</button></a>
		<a href="update_user.html"><button class="login100-form-btn">update user</button></a>
		<a href="update_course.html"><button class="login100-form-btn">update course</button></a> -->
	</div>
</div>
</body>
</html>
