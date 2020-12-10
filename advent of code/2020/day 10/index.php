<?php
$input = explode("\r", file_get_contents("input.txt"));

$input[] = 0;
$dif = [0, 0, 0];

sort($input);
$input[] = $input[count($input) - 1] + 3;
$memo = [count($input) - 1 => 1];

for ($i = 1; $i < count($input); $i++) {
	$dif[($input[$i] - $input[$i - 1]) - 1] += 1;
}

for ($i = count($input) - 2; $i >= 0; $i--) {
	$count = 0;
	for ($j = $i + 1; $j < count($input) && $input[$j] - $input[$i] <= 3; $j++) {
		$count += $memo[$j];
	}
	$memo[$i] = $count;
}
echo "Part 1:<br>" . ($dif[0] * $dif[2]) . "<br><br>Part 2:<br>" . $memo[0];
?>