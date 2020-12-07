<?php
$firstvalid = 0;
$total = 0;

foreach (preg_split("#\n\s*\n#Uis", file_get_contents("input.txt")) as $inp) {
    $data = "";
    foreach (explode("\n", $inp) as $exin2) {
        $data .= preg_replace("/\s+/", "", $exin2);
    }

    foreach (count_chars($data, 1) as $char => $val) {
        $firstvalid++;
    }
    
    if (stristr($inp, "\n")) {
		$answ = array();
		foreach(explode("\n", $inp) as $p) {
			for($i = 0; $i < strlen($p); $i++) {
                if(preg_match('/[a-z]/', $p[$i])) {
					if(@!$answ[$p[$i]]) {
                        $answ[$p[$i]] = 1;
                    } else {
                        $answ[$p[$i]]++;
                    }
                }
            }
        }
		foreach ($answ as $k => $v) {
			if ($v == count(explode("\n", $inp))) {
                $total++;
            }
        }
	} else {
		preg_match('/[a-z]+/', $inp, $matches);
		$total += strlen($matches[0]);
	}
}
echo "Part 1:<br>" . $firstvalid . "<br><br>Part 2:<br>" . $total;
?>