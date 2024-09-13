<?php
$data = file_get_contents("_input.txt");
$pos = $i = 0;

echo "Part 1: " . (substr_count($data, "(") - substr_count($data, ")"));

foreach (str_split($data) as $out) {
    if ($pos == -1) {
        echo "\nPart 2: " . $i;
        break;
    }
    $pos += ($out == "(") ? 1 : -1;
    $i++;
}
