<?php
$length = $width = $height = $totalribbon = $totalwrapping = 0;

foreach (file(realpath(__DIR__) . '/_input.txt', FILE_IGNORE_NEW_LINES) as $input) {
	list($length, $width, $height) = explode('x', $input);
    
    $measureslbh = array($length, $width, $height);
    sort($measureslbh);

    $totalwrapping += (2 * ( $width * $height)) + (2 * ($length * $width)) + (2 * ($height * $length)) + min(($width * $height), ($length * $width), ($height * $length));
    $totalribbon += (($measureslbh[0] * 2) + ($measureslbh[1] * 2)) + ($length * $width * $height);
}
echo "Part 1:" . $totalwrapping . "\nPart 2:" . $totalribbon;
?>