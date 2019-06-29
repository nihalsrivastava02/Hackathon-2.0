<?php
    error_reporting(E_NOTICE^E_ALL);
    if(isset($_POST['code']))
    {
        $output = "";
        $code = "";
        $inpt = "";
        include "practice2.php";
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
    <form action="practice.php"  method="POST">
        <b>CODE:</b><br>
        <textarea name="code" class = "box" id = "code"><?php echo $code ?></textarea><br>
        <input type="submit" value = "SUBMIT">
    </form>
        <?php echo $output; ?>
</div>
</body>
</html>