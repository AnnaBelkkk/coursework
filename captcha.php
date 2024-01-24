<?php
	session_start();
	$dir = "fonts/";

	$image = imagecreatetruecolor(160, 50);
	$black = imagecolorallocate($image, 0, 0, 0);
	$color = imagecolorallocate($image, 45, 64, 72);
	$white = imagecolorallocate($image, 217, 217, 217);

	imagefilledrectangle($image,0,0,399,99,$white);
	imagettftext ($image, 30, 0, 10, 40, $color, $dir."verdana.ttf", $_SESSION['rand_code']);
	header("Content-type: image/png");
	imagepng($image);
?>