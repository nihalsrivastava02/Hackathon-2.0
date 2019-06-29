<?php
require_once("db_connection.php");
$id=$_POST["id"];
$u_password=$_POST["u_password"];
if(!empty($_POST['id']))
	{
		if(!empty($_POST['u_password']))
		{
			$query= 'select * from user where id="'.$id.'" and u_password="'.$u_password.'"';
			$result = mysqli_query($conn, $query);
			if (mysqli_affected_rows($conn)==1 && $result) 
			{
				session_start();
				$row = mysqli_fetch_array($result);
			    echo "login successfully";
			    if(!$_SESSION['id'])
				{
					$_SESSION['id'] = $row['id'];
					$_SESSION['u_name'] = $row['u_name'];
					$_SESSION['u_type'] = $row['u_type'];
					$_SESSION['login'] = true;	

				        if($row["u_type"]=='A')
				            header("location:admin.php");
				        else if($row["u_type"]=='S')
				         	header("location:student.php");
				        else if($row["u_type"]=='T')
				            header("location:teacher.php");
				        else
				        	header("location:employee.php");

				}
				else
				{
				        if($row["u_type"]=='A')
				            header("location:admin.php");
				        else if($row["u_type"]=='S')
				         	header("location:student.php");
				        else if($row["u_type"]=='T')
				            header("location:teacher.php");
				        else
				        	header("location:employee.php");
				}
			     
			         
			 } 
			 else 
			 {
			     echo "wrong user name or password";
			 }
			 mysqli_close($conn);
		}
	}	
?>