<?php

$input = explode("\n  ", file_get_contents("input.txt"));
$counter = 0;

foreach ($input as $inp) {
    list($numb1, $numb2, $numb3) = array_values(array_filter(explode(' ', $inp)));
    $numb1 = (int)$numb1;
    $numb2 = (int)$numb2;
    $numb3 = (int)$numb3;
    
    if ($numb1 + $numb2 > $numb3 && $numb1 + $numb3 > $numb2 && $numb2 + $numb3 > $numb1) {
        $counter++;
    }
}

echo "Part 1:<br>Possible triangles: " . $counter . "<br><br>Part 2:<br>Possible triangles: ";

// part 2

$input = array_map('trim', explode("\n", file_get_contents("input.txt")));
$rows  = count($input);
$i     = 0;

foreach ($input as $line) {
    list($numb[$i], $numb[$i + $rows], $numb[$i++ + $rows * 2]) = array_values(array_filter(explode(' ', $line)));
}

$rows = count($numb);
$counter = 0;

for ($i = 0; $i < $rows; $i = $i + 3) {
    if ($numb[$i] + $numb[$i+1] > $numb[$i+2] && $numb[$i+2] + $numb[$i+1] > $numb[$i] && $numb[$i] + $numb[$i+2] > $numb[$i+1]) {
        $counter++;
    }

}

echo $counter;



?>