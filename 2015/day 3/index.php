<?php
$santax = $santay = $counter = 0;

foreach (str_split(file_get_contents("input.txt")) as $inp) {
    if ($inp == "^" || $inp == "v") {
        if ($inp == "^") {
            $santay++;
        } else {
            $santay--;
        }
    }
    if ($inp == ">" || $inp == "<") {
        if ($inp == ">") {
            $santax++;
        } else {
            $santax--;
        }
    }
    $array2[$santax][$santay] = "0";
    $counter++;
}

echo "Part 1:<br>" . array_sum(array_map("count", $array2)) . "<br><br>Part 2:<br>";
$santax = $santay = $counter = $robox = $roboy = 0;

foreach (str_split(file_get_contents("input.txt")) as $inp) {
    if ($counter % 2 == "0") {
        if ($inp == "^" || $inp == "v") {
            if ($inp == "^") {
                $santay++;
            } else {
                $santay--;
            }
        }
        if ($inp == ">" || $inp == "<") {
            if ($inp == ">") {
                $santax++;
            } else {
                $santax--;
            }
        } 
        $array[$santax][$santay] = "0";
    } else {
        if ($inp == "^" || $inp == "v") {
            if ($inp == "^") {
                $roboy++;
            } else {
                $roboy--;
            }
        }
        if ($inp == ">" || $inp == "<") {
            if ($inp == ">") {
                $robox++;
            } else {
                $robox--;
            }
        }
        $array[$robox][$roboy] = "0";
    }
    $counter++;
}
echo array_sum(array_map("count", $array));
?>