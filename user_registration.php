<?php
	error_reporting(E_ALL^E_NOTICE);
	if(!$_SESSION['u_type']== 'A')
    {
        die("Invalid user");
    }
?>
<?php
require_once("db_connection.php");
$id=$_POST["id"];
$u_name=$_POST["u_name"];
$u_password=$_POST["u_password"];
$u_type=$_POST["u_type"];
$department=$_POST["department"];
if($_POST["designation"] != "Designation")
{
	$designation=$_POST["designation"];
	$q= "INSERT INTO `teacher`(`id`, `department`, `designation`) VALUES ('$id','$department','$designation')";
	mysqli_query($conn,$q);
}
if($_POST["branch_code"] != "Branch code")
{
	$branch_code=$_POST["branch_code"];
	$sql= "INSERT INTO `student`(`id`, `branch_code`, `department`) VALUES ('$id','$branch_code','$department')";
	mysqli_query($conn,$sql);
}

$query= "INSERT INTO `user`(`id`, `u_name`, `u_password`, `u_type`) VALUES ('$id','$u_name','$u_password','$u_type')";
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
mysqli_close($conn);
?>