<?php
    error_reporting(E_ALL^E_NOTICE);
    session_start();
    if(!$_SESSION['u_type']== 'S')
    {
        die("Invalid user");
    }
?>
<?php
    error_reporting(E_NOTICE^E_ALL);
    if(isset($_POST['code']))
    {
        $output = "";
        $code = "";
        $inpt = "";
        include "upload_assignment_back.php";
    }
    if(isset($_GET["data"]))
    {
        
        $data = $_GET["data"];
        echo $data;
        $_SESSION['assignment_id'] = $data;
        
    }

    require_once("db_connection.php");
    $id=$_SESSION['u_name'];
    $subject_id=$_SESSION['assignment_id'];
    $check="Select * from `".$subject_id."` where `student_id`='".$id."';";
    //echo $check;
    //echo $check;
    $result=mysqli_query($conn,$check);
    $row=mysqli_fetch_array($result);
    $str = "<a href ='student_upload.php?file=".$data."'>Download</a>";
       echo $str."Hello";
       if(!empty($_GET['file']))
       {
            $fileName = basename($_GET['file']);
            echo $fileName;
            $filePath = 'assignment/'.$fileName;
            if(!empty($fileName) && file_exists($filePath)){
                // Define headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$fileName");
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");
                
                // Read the file
                readfile($filePath);
                exit;
    }
    else{
            echo 'The file does not exist.';
        }
    }
    //echo $row;
    if($row)
    {
        $data="You have already uploaded assignment and your marks is ".$row['marks'];
        echo $data;
        echo '<script language="javascript">';
        echo "alert('$data')";
        echo '</script>';
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Compiler</title>
    <link rel="stylesheet" type="text/css" href="create_assignment1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<!-- <body>
<div>
    <form action="upload_assignment_back.php"  method="POST">
        <b>CODE:</b><br>
        <textarea name="code" class = "box" id = "code"><?php echo $code ?></textarea><br>
        <input type="submit" value = "SUBMIT">
    </form>
        // <?php echo $output; ?>
</div>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
</form>
</body> -->
<body>
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
    <div>
        <?php
       
        ?>
        <form action="upload_assignment_back.php"  method="POST">
        <h2>Assignment : --</h2><br>
        <textarea name="code" class = "box" id = "code" rows="10" cols="100" style="resize: none;"><?php echo $code ?></textarea><br>
        <!-- <input type="submit" value = "SUBMIT"> -->
        </form>
        <?php echo $output; ?>
    </div>
    <form action="student_assignment_upload.php" method="post" enctype="multipart/form-data">
        <h3>Select file to upload : -- </h3>
        <table>
        <tr>
        <td>
        <div class="container-login100-form-btn">
      <!--   <input class="login100-form-btn" type="file" name="fileToUpload" id="fileToUpload"> -->
        <!-- <input type="submit" value="Upload file" name="submit"> -->
        <button class="login100-form-btn">
        Upload file
        </button>
        </div>
        </td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td class="submit">
        <div class="container-login100-form-btn" class="submit">
        <button class="login100-form-btn">
        Submit
        </button>
        </div>
        </td>
        </tr>
    </table>
    </form>
</body>
</html>
