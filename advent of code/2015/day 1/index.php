<?php
$pos = $i = 0;

foreach (str_split(file_get_contents("input.txt")) as $out) {
    if ($pos == -1) {
        echo "Part 1:<br>" . (substr_count(file_get_contents("input.txt"), "(") - substr_count(file_get_contents("input.txt"), ")"));
        echo "<br><br>Part 2:<br>" . $i;
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