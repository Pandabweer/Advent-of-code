<?php
$ribbon = $wrapping = 0;

foreach (explode("\n", file_get_contents("_input.txt")) as $input) {
    [$l, $w, $h] = explode("x", $input);

    $wrapping += 2 * ($w * $h + $l * $w + $h * $l) + min($w * $h, $l * $w, $h * $l);
    $ribbon += 2 * min($l + $w, $w + $h, $h + $l) + $l * $w * $h;
}
echo "Part 1: " . $wrapping . "\nPart 2: " . $ribbon;
?>