<?php
$counter = 0;
$counter2 = 0;
$i = 0;

function arr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

foreach (preg_split("#\n\s*\n#Uis", file_get_contents("input.txt")) as $inp) {
    if (strpos($inp, "byr") !== false && strpos($inp, "iyr") !== false && strpos($inp, "eyr") !== false && 
        strpos($inp, "hgt") !== false && strpos($inp, "hcl") !== false && 
        strpos($inp, "ecl") !== false && strpos($inp, "pid") !== false) {
        $counter++;
    }
}

foreach (preg_split("#\n\s*\n#Uis", file_get_contents("input.txt")) as $inp) {
    $ar[$i] = array();
    foreach (explode("\n", $inp) as $in) {
        if (strpos($in, " ") !== false) {
            $inp2 = explode(" ", $in);
            foreach ($inp2 as $in2) {
                array_push($ar[$i], $in2);
            }
        } else {
            array_push($ar[$i], $in);
        }
    }

    $i++;
}

foreach ($ar as $sol) {
    foreach ($sol as $answ) {
        $ansc = explode(":", $answ);

        $field = $ansc[0];
        $code = $ansc[1];


    }
}
echo "<br>" . $counter . "<br>" . $counter2;