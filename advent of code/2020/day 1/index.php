<?php
$input = explode("\n", file_get_contents("input.txt"));
$found = false;

foreach ($input as $number1) {
    $number1 = (int) $number1;
    foreach ($input as $number2) {
        $number2 = (int) $number2;
        if ($number1 + $number2 == 2020) {
            $found = true;
            $p1 = ($number1 * $number2);
            break;
        }
    }
    if ($found) {
        $found = false;
        break;
    }
}

foreach ($input as $number1) {
    $number1 = (int) $number1;
    foreach ($input as $number2) {
        $number2 = (int) $number2;
        foreach ($input as $number3) {
            $number3 = (int) $number3;
            if ($number1 + $number2 + $number3 == 2020) {
                $found = true;
                $p2 = ($number1 * $number2 * $number3);
                break;
            }
        }
        if ($found) {
            break;
        }
    }
}

echo "Part 1:<br>" . $p1 . "<br><br>Part 2:<br>" . $p2;
?>