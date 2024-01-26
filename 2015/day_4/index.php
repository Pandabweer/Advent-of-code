<?php
$input = file_get_contents("_input.txt");
$found1 = $found2 = false;
$i = 0;

while ($found1 == false || $found2 == false) {
    $hash = md5($input . $i);

    if ($found1 == false && substr($hash, 0, 5) === "00000") {
        echo "Part 1: " . $i . "\n";
        $found1 = true;
    }

    if ($found2 == false && substr($hash, 0, 6) === "000000") {
        echo "Part 2: " . $i . "\n";
        $found2 = true;
    }

    $i++;
}
?>