<?php
	require_once("db_connection.php");
	$branch_code=$_POST["branch_code"];
	$subject_id=$_POST["subject_id"];
	$subject_name=$_POST["subject_name"];
	$id=$_POST["id"];
	// sql to create table
	$query='select * from `'.$branch_code.'`;';
	$result=mysqli_query($conn, $query);
	if(!$result)
	{
		$sql ='CREATE TABLE '.$branch_code.' (subject_id VARCHAR(50), subject_name VARCHAR(100), id VARCHAR(50));';
		mysqli_query($conn, $sql);
	}
	// $query= 'INSERT INTO `'.$branch_code.'` (`subject_id`, `subject_name`, `id`) VALUES ('.$subject_id.'','.$subject_name.','.$id.');';
	$query= "INSERT INTO `".$branch_code."`(`subject_id`, `subject_name`, `id`) VALUES ('$subject_id','$subject_name','$id')";
	$result = mysqli_query($conn, $query);
	$query= "INSERT INTO `instructor`(`id`, `subject_id`, `subject_name`, `branch_code`) VALUES ('$id','$subject_id','$subject_name','$branch_code')";
	$result = mysqli_query($conn, $query);
	echo "Succesfully registered";
mysqli_close($conn);
?>
