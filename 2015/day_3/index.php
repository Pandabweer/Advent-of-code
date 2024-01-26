<?php
$data = file_get_contents("_input.txt");
$santa_pos = $robo_pos = $santa_pos_old = [0, 0];

$santa_old_houses = $santa_houses = $robo_houses = [];
$directions = ["^" => [0, 1], "v" => [0, -1], ">" => [1, 0], "<" => [-1, 0]];

foreach (str_split($data) as $i => $ins) {
    $move = $directions[$ins];
    $santa_pos_old = [$santa_pos_old[0] + $move[0], $santa_pos_old[1] + $move[1]];
    $santa_old_houses[implode(',', $santa_pos_old)] = true;

    if ($i % 2) {
        $robo_pos = [$robo_pos[0] + $move[0], $robo_pos[1] + $move[1]];
        $robo_houses[implode(',', $robo_pos)] = true;
    } else {
        $santa_pos = [$santa_pos[0] + $move[0], $santa_pos[1] + $move[1]];
        $santa_houses[implode(',', $santa_pos)] = true;
    }
}

echo "Part 1: " . count($santa_old_houses) . "\n" . "Part 2: " . count(array_merge($santa_houses, $robo_houses));
?>