<?php
	error_reporting(E_ALL^E_NOTICE);
	session_start();
	if($_SESSION['u_type']!= 'T')
    {
    	include 'logout.php';
        die("Invalid user");
     }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Assignment Marking</title>
</head>
<body>
	<?php
		if(!$_SESSION['login'])
		{
			die('user logged out');
		}
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
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
	<div class="row">
	    <!-- <div class="col-sm-3 col-md-3 col-lg-3">
	    </div> -->
	    <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:white;">
	    	<table class="table">
	    		<thead>
	    			<tr>
	    				<th scope="col">Student id</th>
	    				<th scope="col">Assignment Name</th>
	    				<th scope="col">Marks</th>
	    				<th scope="col">Date and Time</th>
	    				<th scope="col">Grade</th>
	    				<th scope="col">Submit</th>
	    			</tr>
	    		</thead>	
	    	<?php
	    	
	    		require_once("db_connection.php");
	    		//echo $_SESSION['assignment_id'];
	    		//echo $_SESSION['id'];
	    		$query='select * from assignment where `subject_id`="'.$_SESSION["assignment_id"].'";';
	    		//echo $query;
	    		$result = mysqli_query($conn, $query);
	    		// $row = mysqli_fetch_array($result);
	    		while($row=mysqli_fetch_assoc($result))
	    		{
	    			$assignment_name=$row["assignment_name"];
	    			//echo $assigment_name;
	    			$q="select * from `".$assignment_name."`;";
	    			//echo $q;
	    			$res = mysqli_query($conn, $q);
	    			//$r = mysqli_fetch_array($res);
	    			while($r=mysqli_fetch_assoc($res))
	    			{
	    				$str="<tr><td>".$r["student_id"]."</td><td>".$r["assignment_name"]."</td><td>" .$r["marks"]."</td><td>".$r["date_time"]."</td><form><input type='hidden' name='student_id' value=".$r["student_id"]."><td><input type='number' name='marks' style='width: 60%;'> </td><td><button type='submit' name='submit'>Add</button></td></from></tr>" ;// . $r["date_time"]."</td></tr>";
	    				echo $str;
	    			}
	    		}
	    		if(isset($_GET['submit'])) //check if form was submitted
  				{
  					$stuid=$_GET['student_id'];
  					$marks = $_GET['marks'];

  					$sql="UPDATE `$assignment_name` SET `marks`=".$marks." where `student_id`='".$stuid."';";
  					//echo $sql;
  					$res = mysqli_query($conn, $sql);
  					//echo "<meta http-equiv='refresh' content='10'>";
  				}
	    	?>
	    	</table>
	    </div>
	    <!-- <div class="col-sm-3 col-md-3 col-lg-3">
	    </div> -->
  	</div>
<!-- <h1>Welcome 
			<?php 
			//echo $_SESSION['id'];
			//echo  ' '.$_SESSION['u_name'];
			?>
		</h1> -->
</body>
</html>
