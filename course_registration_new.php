    <?php 
  error_reporting(E_ALL^E_NOTICE);
  session_start();
  if($_SESSION['u_type']!= 'A')
    {
      include 'logout.php';
        die("Invalid user");
     } 
 require_once("db_connection.php");

  $branch_code=mysqli_real_escape_string($conn,$_POST['branch_code'][0];
  // sql to create table
  $sql = "CREATE TABLE "$branch_code" (
  "$subject_id" VARCHAR(50), 
  "$subject_name" VARCHAR(50),
  "$id" VARCHAR(50),
  )"; 
  $query= 'create table"'.$branch_code.'"() and u_password="'.$u_password.'"';
  if(mysqli_query($conn, $sql))
    echo "table created successfully";
  else
    echo " table is not created";
 $number = count($_POST["subject_id"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
          $subject_id=mysqli_real_escape_string($conn,$_POST['subject_id'][$i]);
          $subject_name=mysqli_real_escape_string($conn,$_POST['subject_name'][$i]);
          $id=mysqli_real_escape_string($conn,$_POST['id'][$i]);
          if(empty(trim($subject_id))) continue;

          $sql = "INSERT INTO branch_code(subject_id ,subject_name, id) VALUES('$subject_id', '$subject_name', '$id')";  
          mysqli_query($conn, $sql); 
          $query= "INSERT INTO `instructor`(`id`, `subject_id`, `subject_name`, `branch_code`) VALUES ('$id','$subject_id','$subject_name','$branch_code')";
          mysqli_query($conn,$query); 
      }  
      echo "Data Inserted"; 
      mysqli_close($conn); 
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?>