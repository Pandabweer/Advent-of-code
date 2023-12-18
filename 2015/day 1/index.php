<?php
$pos = $i = 0;

foreach (str_split(file_get_contents("input.txt")) as $out) {
    if ($pos == -1) {
        echo "Part 1:" . (substr_count(file_get_contents("input.txt"), "(") - substr_count(file_get_contents("input.txt"), ")"));
        echo "\nPart 2:" . $i;
        break;
    }
    if ($out == "(") {
        $pos++;
    } else {
        $pos--;
    }
    $i++;
}
?>