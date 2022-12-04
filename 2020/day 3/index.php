<?php
$lines = explode("\n", file_get_contents('input.txt'));

function trees($stepsToRight = 3, $stepsToDown = 1) {
    global $lines;
    $trees = $right = $down = 0;

    while ($down < count($lines)) {
        if ($lines[$down][$right] == '#') {
            $trees++;
        }

        $right = ($right + $stepsToRight) % (strlen($lines[0]) - 1);
        $down += $stepsToDown;
    }

    return $trees;
}

function arr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

arr('part 1: ' . trees());
arr('part 2: ' . trees() * trees(1,1) * trees(5, 1) * trees(7, 1) * trees(1, 2));
?>