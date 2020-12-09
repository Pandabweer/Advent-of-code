<?php
$pr = 25;
$num = array_map("trim", explode("\n", file_get_contents("input.txt")));

function firsterr(array $num, int $pr): int {
	$err = 0;
	for ($i = $pr; $i < count($num); $i++) {
		$encc = false;
		for ($j = $i - $pr; $j < $i; $j++) {
			for ($k = $i - $pr; $k < $i; $k++) {
				if ($num[$j] + $num[$k] == $num[$i]) {
					$encc = true;
					break;
				}
			}
			if ($encc) {
                break;
            }
		}
		if ($encc === false) {
			return $num[$i];
		}
	}
	return $err;
}

function weak(array $num, int $result): int {
	$mpos = 0;
	$leng = 2;
	while ($mpos < count($num)) {
		while ($leng < count($num) - 2) {
			$t = array_slice($num, $mpos, $leng);
			if (array_sum($t) == $result) {
				sort($t);
				return $t[0] + $t[count($t) - 1];
			}
			else if (array_sum($t) > $result) {
				$mpos += 1;
				$leng = 2;
				break;
			}
			$leng += 1;
		}
	}
	return 0;
}

echo "Part 1:<br>" . firsterr($num, $pr) . "<br>" . "<br>Part 2:<br>" . weak($num, firsterr($num, $pr)) . "\n";
?>