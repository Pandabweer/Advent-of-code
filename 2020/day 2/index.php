<?php
$counter = 0;
$counter2 = 0;

foreach (explode("\n", file_get_contents("input.txt")) as $inp) {
    $inp = explode(" ", $inp);
    $policy = explode("-", $inp[0]);

    foreach (count_chars($inp[2], 1) as $i => $val) {
        if (str_replace(":", "", $inp[1]) === chr($i) && $policy[0] <= $val && $policy[1] >= $val) {
            $counter++;
        }
    }

    if (str_replace(":", "", $inp[1]) === $inp[2][$policy[0] - 1] || str_replace(":", "", $inp[1]) === $inp[2][$policy[1] - 1]) {
        if ($inp[2][$policy[0] - 1] !== $inp[2][$policy[1] - 1]){
            $counter2++;
        }
    }
}
echo "Part 1:<br>" . $counter . "<br><br>Part 2:<br>" . $counter2;
?>