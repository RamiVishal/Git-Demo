<?php
session_start();
$code= str_shuffle("1234");
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(80, 24);
$bg = imagecolorallocate($im, 22, 100, 114); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>