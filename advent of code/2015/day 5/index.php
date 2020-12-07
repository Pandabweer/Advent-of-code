<?php
ini_set('auto_detect_line_endings', true);

$goodstring = 0;
$goodstring2 = 0;

foreach (file(realpath(__DIR__) . '/input.txt', FILE_IGNORE_NEW_LINES) as $input) {
    $step1 = substr_count($input, "a") + 
             substr_count($input, "e") + 
             substr_count($input, "i") + 
             substr_count($input, "o") + 
             substr_count($input, "u");

    if ($step1 >= 3) {
        $stringlength = strlen($input);
        $prevletter = null;
        $letterinrow = false;

        for ($i = 0; $i < $stringlength; $i++) {
            if ($input[$i] === $prevletter) {
                $letterinrow = true;
                break;
            }
            $prevletter = $input[$i];
        }

        if ($letterinrow) {
            if (strpos($input, "ab") === false && 
                strpos($input, "cd") === false && 
                strpos($input, "pq") === false && 
                strpos($input, "xy") === false
                ) {
                $goodstring++;
            }
        }
    }
}

foreach (file(realpath(__DIR__) . '/input.txt', FILE_IGNORE_NEW_LINES) as $input) {
	$lettertwice = array();
	$repeatingletter = false;
    $stringlength = strlen($input);
    
	for ($i = 0; $i < $stringlength; $i++) {
		if ($i + 1 < $stringlength) {
			$lettertwice[] = $input[$i] . $input[$i + 1];
		}

		if ($repeatingletter === false && $i > 1) {
			$seconrepeatingletter = $input[$i - 2];
			if ($input[$i - 2] == $input[$i]) {
				$repeatingletter = true;
			}
		}
    }

    $checkfordouble = array_count_values($lettertwice);

	foreach ($checkfordouble as $output => $match) {
		if ($match > 1) {
            $countmatchpos = strpos($input, $output);
			if (strpos($input, $output, $countmatchpos + 2) === false) {
				unset($checkfordouble[$output]);
			}
		}
	}
	if (max($checkfordouble) > 1 && $repeatingletter) {
		++$goodstring2;
	}
}

echo "Part 1:<br>" . $goodstring . "<br><br>";
echo "Part 2:<br>" . $goodstring2;



?>
