<?php
$output = explode("\n", file_get_contents("input.txt"));

$total1 = 0; 
$total2 = 0;

foreach ($output as $inp) {
    $inp = (int) $inp;
    $fuel = floor((($inp / 3 - 2) / 4) * 4);
    $total1 += $fuel;

    while ($fuel > 8) {
        $fuel = floor((($fuel / 3 - 2) / 4) * 4);
        $total2 += $fuel;
    }
}

$sum = $total2 + $total1;

echo "Part 1:<br><br>Sum: " . $total1 . "<br><br>Part 2:<br><br>";

echo "Total 1: " . $total1 . "<br>";
echo "Total 2: " . $total2 . "<br><br>";
echo "Sum: " . $total1 . " + " . $total2 . " = " . $sum; 
?>