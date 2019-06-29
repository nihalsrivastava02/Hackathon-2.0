<?php

        $GLOBALS['code'] = $_POST['code'];
        $fp = fopen("assignment/test1.txt","w+") or die("file not created");
        fwrite($fp,$GLOBALS['code']);
        $GLOBALS['output'] = fread($fp,filesize("test.txt"));
        fclose($fp);
?>