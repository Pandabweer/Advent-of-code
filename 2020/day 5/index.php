<?php
$input = explode("\n", file_get_contents("input.txt"));

foreach ($input as $i => $val1) {
  $val1 = str_replace(["F","B","L","R"],["0","1","0","1"], $val1);
  $input[$i] = intval($val1, 2);
}

for ($i = min($input); $i < max($input); $i++) {
    if(!in_array($i, $input)) {
        $answ2 = $i;
    }
}
echo "Part 1:<br>" . (max($input)) . "<br><br>Part 2:<br>" . $answ2;
?>