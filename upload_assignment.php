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
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Compiler</title>
    <!-- <link rel="stylesheet" type="text/css" href="CSS/textbox.css"> -->
</head>
<body>
<div>
    <form action="upload_assignment_back.php"  method="POST">
        <b>CODE:</b><br>
        <textarea name="code" class = "box" id = "code"><?php echo $code ?></textarea><br>
        <input type="submit" value = "SUBMIT">
    </form>
        <?php echo $output; ?>
</div>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
</form>
</body>
</html>