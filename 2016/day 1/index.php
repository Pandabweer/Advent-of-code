<?php
$output = str_replace(',', '', explode(' ', file_get_contents("input.txt")));

$x = 0;
$y = 0;
$facing = 0; // 0 = north: 1 = east: 2 = zuid: 3 = west
$grid = array();
$counter = 0;
$firstLoc = array();

foreach ($output as $out) {
    $out = str_split($out);

    $outdir = array_shift($out);
    $outnumb = implode('', (array) $out);

    if ($facing == 0) {
        if ($outdir == "R") {
            for ($i = 0; $i < $outnumb; $i++) {
                $x++;
                if (@$grid[$y][$x]) {
                    $counter++;
                    if ($counter == 1) {
                        $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                    } else {}
                }
                $grid[$y][$x] = "X";
            }
            $facing = 1;
        } else {
            for ($i = 0; $i < $outnumb; $i++) {
                $x--;
                if (@$grid[$y][$x]) {
                    $counter++;
                    if ($counter == 1) {
                        $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                    }
                }
                $grid[$y][$x] = "X";
            }
            $facing = 3;
        }
    } else {
        if ($facing == 1) {
            if ($outdir == "R") {
                for ($i = 0; $i < $outnumb; $i++) {
                    $y--;
                    if (@$grid[$y][$x]) {
                        $counter++;
                        if ($counter == 1) {
                            $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                        }
                    }
                    $grid[$y][$x] = "X";
                }
                $facing = 2;
            } else {
                for ($i = 0; $i < $outnumb; $i++) {
                    $y++;
                    if (@$grid[$y][$x]) {
                        $counter++;
                        if ($counter == 1) {
                            $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                        }
                    }
                    $grid[$y][$x] = "X";
                }
                $facing = 0;
            }
        } else {
            if ($facing == 2) {
                if ($outdir == "R") {
                    for ($i = 0; $i < $outnumb; $i++) {
                        $x--;
                        if (@$grid[$y][$x]) {
                            $counter++;
                            if ($counter == 1) {
                                $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                            }
                        }
                        $grid[$y][$x] = "X";
                    }
                    $facing = 3;
                } else {
                    for ($i = 0; $i < $outnumb; $i++) {
                        $x++;
                        if (@$grid[$y][$x]) {
                            $counter++;
                            if ($counter == 1) {
                                $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                            }
                        }
                        $grid[$y][$x] = "X";
                    }
                    $facing = 1;
                }
            } else {
                if ($facing == 3) {
                    if ($outdir == "R") {
                        for ($i = 0; $i < $outnumb; $i++) {
                            $y++;
                            if (@$grid[$y][$x]) {
                                $counter++;
                                if ($counter == 1) {
                                    $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                                }
                            }
                            $grid[$y][$x] = "X";
                        }
                        $facing = 0;
                    } else {
                        for ($i = 0; $i < $outnumb; $i++) {
                            $y--;
                            if (@$grid[$y][$x]) {
                                $counter++;
                                if ($counter == 1) {
                                    $firstLoc = "<br>X: " . $x . "<br>Y: " . $y . "<br>X + Y = " . ($x + $y);
                                }
                            }
                            $grid[$y][$x] = "X";
                        }
                        $facing = 2;
                    }
                }
            }
        }
    }
}

// Since we are calculating blocks it will always be positive
$firstLoc = str_replace("-", "", $firstLoc);
$x = str_replace("-", "", $x);
$y = str_replace("-", "", $y);

echo "Part 1: <br>Ending postion: <br>X: " . $x . "<br>Y: " .  $y . "<br>X + Y: " . ($x + $y) . "<br><br>Part 2: <br>HQ location: " . $firstLoc;
?>