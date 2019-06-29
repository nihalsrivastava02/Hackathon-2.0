<?php
    error_reporting(E_ALL^E_NOTICE);
    session_start();
    if(!$_SESSION['u_type']== 'T')
    {
        die("Invalid user");
    }

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
        $_SESSION['assignment_id'] = $data;
        echo $data;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Compiler</title>
    <link rel="stylesheet" type="text/css" href="create_assignment1.css">
    <link rel="stylesheet" type="text/css" href="background.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg">
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
            <a href="logout.php"><img src="images/logout.png" style="width:35px;height:35px;border:1;"></a>
        </div>
    </nav>
<div>
    <form action="upload_assignment_back.php"  method="POST">
        <h2>Assignment : --</h2><br>
        <textarea name="code" class = "box" id = "code" rows="10" cols="100" style="resize: none;"><?php echo $code ?></textarea><br>
        <!-- <input type="submit" value = "SUBMIT"> -->
    </form>
        <?php echo $output; ?>
</div>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    <h3>Select file to upload : -- </h3>
    <table>
    <tr>
    <td>
    <div class="container-login100-form-btn">
    <input class="login100-form-btn" type="file" name="fileToUpload" id="fileToUpload">
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
    <td></td><td></td><td></td><td></td>
    <td>
    <div class="container-login100-form-btn">
    <a href="assignment_marking.php"><button type="button" class="login100-form-btn">Grade Assignment</button></a>
    </div>
    </td>
    </tr>
</table>
</form>
<!-- <div class="container-login100-form-btn">
	<a href="assignment_marking.php"><button type="button" class="login100-form-btn">Grade Assignment</button></a>
</div> -->
</body>
</html>
