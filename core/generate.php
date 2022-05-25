<?php 

$srcurl = 'http://localhost/DWES/Unit3/bookstore/';
$tempfilename= 'xampp/htdocs/DWES/Unit3/bookstore/app/views/layout.html';
$targetfilename= 'xampp/htdocs/DWES/Unit3/bookstore/app/views/index.html';

if(file_exists($tempfilename)){
    unlink($tempfilename);
}

$html = file_get_contents($srcurl);
if(!$html){
    $error = "unamble to load $scurl. Static page aborted!";
    echo $error;
    exit();
}

if(!file_put_contents($tempfilename,$html)){
    $error = "Unable to write $tempfilename. Static page update aborted!";
    echo $error;
    exit();
}

copy($tempfilename,$targetfilename);
unlink($tempfilename);
echo "Home page generated succesfully!";

?>