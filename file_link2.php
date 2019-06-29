<!DOCTYPE HTML>
<html>
<head>
	<title>FILE LINK</title>
</head>
<body>
	<a href = "file_link2.php?file=sam.txt">Download</a>
</body>
</html>
<?php 
if(!empty($_GET['file']))
{
    $filename = basename($_GET['file']);
    $filepath = '/assignment' . $filename;
    if(!empty($filename) && file_exists($filepath)){
 
//Define Headers
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");
 
        readfile($filepath);
        exit;
 
    }
    else{
        echo "This File Does not exist.";
    }
}
 
 ?>
	