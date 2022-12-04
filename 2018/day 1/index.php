<?php

$input = explode("\n", file_get_contents("input.txt"));
$freq = 0;
$match = 0;

$firstloop = true;
$numberfound = false;

while (true) {
    foreach ($input as $inp) {
        $split = str_split($inp);
    
        $operator = array_shift($split);
        $numb = (int) implode($split);
    
        switch ($operator) {
            case "+":
                $freq += $numb;
                break; 
            case "-":
                $freq -= $numb;
                break;
        }

        if (!isset($array[$freq])) {
            $array[$freq] = 0;
        }

        $array[$freq]++;

        if ($array[$freq] == 2) {
            $match = $freq;
            $numberfound = true;
            break;
        }
    }

    if ($firstloop === true) {
        $frequentie = $freq;
        $firstloop = false;
    }

    if ($numberfound === true) {
        break;
    }
}

echo "Part 1:<br>Frequentie: " . $frequentie . "<br><br>Part 2:<br>Match first: " . $match;
?>