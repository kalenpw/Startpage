<?php

$dirname = "/home/kalenpw/Downloads/cute/";
$images = glob($dirname . "*.jpg");



for($i = 0; $i < count($images); $i++){
    $image = $images[$i];
    $fp = fopen($image, 'rb');

    header("Content-Type: image/jpg");
    header("Content-Length: " . filesize($image));
     
    fpassthru($fp);
    fclose($fp);
}


/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = fopen("/home/kalenpw/Downloads/test.txt", "r") or die("unable to open");

echo fread($file, filesize("/home/kalenpw/Downloads/test.txt"));
fclose($file);


$dirname = "/home/kalenpw/Downloads/cute/";
if($opendir = opendir($dirname)){
    while( $file = readdir($opendir) !== FALSE){
        echo $file;
    }
}

/*
$images = glob($dirname . "*.jpg");
foreach($images as $image){
    echo '<img src="' . $image . '"/><br/>';
}
 */
?>
