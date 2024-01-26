<?php
$ribbon = $wrapping = 0;

foreach (explode("\n", file_get_contents("_input.txt")) as $input) {
	[$l, $w, $h] = explode("x", $input);

    $sort = array($l, $w, $h);
    sort($sort);

    $wrapping += 2 * ($w * $h + $l * $w + $h * $l) + min($w * $h, $l * $w, $h * $l);
    $ribbon += 2 * ($sort[0] + $sort[1]) + $l * $w * $h;
}
echo "Part 1: " . $wrapping . "\nPart 2: " . $ribbon;
?>