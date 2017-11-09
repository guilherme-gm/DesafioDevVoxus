<?php

$file = FCPATH . 'img/fake_thumb_' . $size . '.png';
$font = FCPATH . 'fonts/verdana.ttf';
$image = imagecreatefrompng($file);
$type = 'image/png';

switch ($size) {
    case 'small':
        imagettftext($image, 15, 0, 20, 50, imagecolorallocate($image, 0, 0, 0), $font, $text);
        break;

    case 'big':
        imagettftext($image, 20, 0, 60, 190, imagecolorallocate($image, 0, 0, 0), $font, $text);
        break;
}


header('Content-Type:' . $type);
header('Content-Length: ' . filesize($file));

imagepng($image);
imagedestroy($image);
