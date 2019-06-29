<?php
    error_reporting(E_ALL^E_NOTICE);
    if(!$_SESSION['u_type']== 'S')
    {
        die("Invalid user");
    }
?>
<?php
$target_dir = "assignment/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
session_start();

echo $_SESSION['assignment_id']." ";
$subject_id=$_SESSION['assignment_id'];
$date = date('Y-m-d H:i:s');
require_once("db_connection.php");

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($filetype != "docx" && $filetype != "doc" && $filetype != "pdf" && $filetype != "txt") {
    echo "Sorry, only docx, doc, pdf & txt files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
    $id=$_SESSION['u_name'];
    $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
    $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $newfilename);

    $check="Select * from `".$subject_id."` where `student_id`='".$id."';";
    //echo $check;
    $result=mysqli_query($conn,$check);
    $row=mysqli_fetch_array($result);
    echo $row;
    if(!$row)
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "assignment/" . $newfilename))
        {
            $file_name=$_FILES["fileToUpload"]["name"];
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            
            $sql="INSERT INTO `".$subject_id."`(`student_id`, `assignment_name`,`marks`, `date_time`) VALUES ('$id','$newfilename','0','$date');";
            echo $sql;
            mysqli_query($conn,$sql);
            echo $newfilename;
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("You have already uploaded assignment")';
        echo '</script>';
    }
}
?>