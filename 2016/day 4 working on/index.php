<?php

$input = explode("\n", file_get_contents("input.txt"));

function arr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

echo "<br>---------------------------<br>";
$a = 0;

foreach ($input as $inp) {
    $inp = explode("-", $inp);
    $int = 0;

    foreach ($inp as $word) {
        if (!strpos($word, "[")) {
            $int++;
        } else {
            $checksum = $word;
            $rawkey = $word;
        }
    }

    $checksum = str_replace(
        array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "[", "]"),
        array("", "", "", "", "", "", "" ,"" ,"" ,"" ,"", ""),
        $checksum
    );

    echo "String: "; 
    $string = "";

    for ($i = 0; $i < $int; $i++) {
        $string .= $inp[$i];
        echo $inp[$i];
    }

    echo $rawkey . "<br>Key: " . $checksum . "|<br>Full string (-key -id): " . $string . "<br><br>";
    $numbers = explode("[", $rawkey)[0];

    $counter = array();

    foreach (count_chars($string, 1) as $i => $val) {
        $counter[chr($i)] = $val; 
    }

    $cc = str_split(trim($checksum));
    

    
    $f = true;
    if (sort($checksum)) {
        if (array_key_exists(reset($cc), $counter)) {
            $max = $counter[reset($cc)];
            foreach ($cc as $c) {
                if (array_key_exists($c, $counter)) {
                    if ($counter[$c] <= $max) {
                        $max = $counter[$c];
                    } else {
                        echo "niet oplopend";
                        $f = false;
                        break;
                    }
        
                } else {
                    echo "bestaat niet";
                    $f = false;
                    break;
                }
                    
            }
        } else {
            echo "bestaat niet 2";
            $f = false;
        }
    } else {
        echo "Niet op volgorde!<br>";
        $f = false;
    }

//echo $max . "<br>";

    if ($f) {
        $a += $numbers;
    }


    echo "<br>---------------------------<br><br>";
}
echo "antwoord: " . $a;



?>