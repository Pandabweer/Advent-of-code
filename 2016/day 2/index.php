<?php

ini_set('auto_detect_line_endings', true);
$input = file(realpath(__DIR__) . '/input.txt', FILE_IGNORE_NEW_LINES);

echo "Part 1:<br>Combination: ";

foreach ($input as $inpu) {
    $currentNumber = 5;
    $inp = str_split($inpu);

    foreach ($inp as $in) {
        switch ($in) {
            case "U":
                $instruction = "U";
                break;
            case "D":
                $instruction = "D";
                break;
            case "L":
                $instruction = "L";
                break;
            case "R":
                $instruction = "R";
                break;
        }

        switch ($currentNumber) {
            case 1:
                if ($instruction == "U") {
                    $currentNumber = 1;
                } 
                if ($instruction == "D") {
                    $currentNumber = 4;
                } 
                if ($instruction == "L") {
                    $currentNumber = 1;
                }
                if ($instruction == "R") {
                    $currentNumber = 2;
                }
                break;
            case 2:
                if ($instruction == "U") {
                    $currentNumber = 2;
                } 
                if ($instruction == "D") {
                    $currentNumber = 5;
                } 
                if ($instruction == "L") {
                    $currentNumber = 1;
                }
                if ($instruction == "R") {
                    $currentNumber = 3;
                }
                break;
            case 3:
                if ($instruction == "U") {
                    $currentNumber = 3;
                } 
                if ($instruction == "D") {
                    $currentNumber = 6;
                } 
                if ($instruction == "L") {
                    $currentNumber = 2;
                }
                if ($instruction == "R") {
                    $currentNumber = 3;
                }
                break;
            case 4:
                if ($instruction == "U") {
                    $currentNumber = 1;
                } 
                if ($instruction == "D") {
                    $currentNumber = 7;
                } 
                if ($instruction == "L") {
                    $currentNumber = 4;
                }
                if ($instruction == "R") {
                    $currentNumber = 5;
                }
                break;
            case 5:
                if ($instruction == "U") {
                    $currentNumber = 2;
                } 
                if ($instruction == "D") {
                    $currentNumber = 8;
                } 
                if ($instruction == "L") {
                    $currentNumber = 4;
                }
                if ($instruction == "R") {
                    $currentNumber = 6;
                }
                break;
            case 6:
                if ($instruction == "U") {
                    $currentNumber = 3;
                } 
                if ($instruction == "D") {
                    $currentNumber = 9;
                } 
                if ($instruction == "L") {
                    $currentNumber = 5;
                }
                if ($instruction == "R") {
                    $currentNumber = 6;
                }
                break;
            case 7:
                if ($instruction == "U") {
                    $currentNumber = 4;
                } 
                if ($instruction == "D") {
                    $currentNumber = 7;
                } 
                if ($instruction == "L") {
                    $currentNumber = 7;
                }
                if ($instruction == "R") {
                    $currentNumber = 8;
                }
                break;
            case 8:
                if ($instruction == "U") {
                    $currentNumber = 5;
                } 
                if ($instruction == "D") {
                    $currentNumber = 8;
                } 
                if ($instruction == "L") {
                    $currentNumber = 7;
                }
                if ($instruction == "R") {
                    $currentNumber = 9;
                }
                break;
            case 9:
                if ($instruction == "U") {
                    $currentNumber = 6;
                } 
                if ($instruction == "D") {
                    $currentNumber = 9;
                } 
                if ($instruction == "L") {
                    $currentNumber = 8;
                }
                if ($instruction == "R") {
                    $currentNumber = 9;
                }
                break;
        }
    }
    echo $currentNumber;
}

echo "<br><br>Part 2:<br>Combination: ";

// part 2

foreach ($input as $inpu) {
    $currentNumber = 5;
    $inp = str_split($inpu);

    foreach ($inp as $in) {
        switch ($in) {
            case "U":
                $instruction = "U";
                break;
            case "D":
                $instruction = "D";
                break;
            case "L":
                $instruction = "L";
                break;
            case "R":
                $instruction = "R";
                break;
        }

        switch ($currentNumber) {
            case 1:
                if ($instruction == "U") {
                    $currentNumber = 1;
                } 
                if ($instruction == "D") {
                    $currentNumber = 3;
                } 
                if ($instruction == "L") {
                    $currentNumber = 1;
                }
                if ($instruction == "R") {
                    $currentNumber = 1;
                }
                break;
            case 2:
                if ($instruction == "U") {
                    $currentNumber = 2;
                } 
                if ($instruction == "D") {
                    $currentNumber = 6;
                } 
                if ($instruction == "L") {
                    $currentNumber = 2;
                }
                if ($instruction == "R") {
                    $currentNumber = 3;
                }
                break;
            case 3:
                if ($instruction == "U") {
                    $currentNumber = 1;
                } 
                if ($instruction == "D") {
                    $currentNumber = 7;
                } 
                if ($instruction == "L") {
                    $currentNumber = 2;
                }
                if ($instruction == "R") {
                    $currentNumber = 4;
                }
                break;
            case 4:
                if ($instruction == "U") {
                    $currentNumber = 4;
                } 
                if ($instruction == "D") {
                    $currentNumber = 8;
                } 
                if ($instruction == "L") {
                    $currentNumber = 3;
                }
                if ($instruction == "R") {
                    $currentNumber = 4;
                }
                break;
            case 5:
                if ($instruction == "U") {
                    $currentNumber = 5;
                } 
                if ($instruction == "D") {
                    $currentNumber = 5;
                } 
                if ($instruction == "L") {
                    $currentNumber = 5;
                }
                if ($instruction == "R") {
                    $currentNumber = 6;
                }
                break;
            case 6:
                if ($instruction == "U") {
                    $currentNumber = 2;
                } 
                if ($instruction == "D") {
                    $currentNumber = "A";
                } 
                if ($instruction == "L") {
                    $currentNumber = 5;
                }
                if ($instruction == "R") {
                    $currentNumber = 7;
                } 
                break;
            case 7:
                if ($instruction == "U") {
                    $currentNumber = 3;
                } 
                if ($instruction == "D") {
                    $currentNumber = "B";
                } 
                if ($instruction == "L") {
                    $currentNumber = 6;
                }
                if ($instruction == "R") {
                    $currentNumber = 8;
                }
                break;
            case 8:
                if ($instruction == "U") {
                    $currentNumber = 4;
                } 
                if ($instruction == "D") {
                    $currentNumber = "C";
                } 
                if ($instruction == "L") {
                    $currentNumber = 7;
                }
                if ($instruction == "R") {
                    $currentNumber = 9;
                }
                break;
            case 9:
                if ($instruction == "U") {
                    $currentNumber = 9;
                } 
                if ($instruction == "D") {
                    $currentNumber = 9;
                } 
                if ($instruction == "L") {
                    $currentNumber = 8;
                }
                if ($instruction == "R") {
                    $currentNumber = 9;
                }
                break;
            case "A":
                if ($instruction == "U") {
                    $currentNumber = 6;
                } 
                if ($instruction == "D") {
                    $currentNumber = "A";
                } 
                if ($instruction == "L") {
                    $currentNumber = "A";
                }
                if ($instruction == "R") {
                    $currentNumber = "B";
                }
                break;
            case "B":
                if ($instruction == "U") {
                    $currentNumber = 7;
                } 
                if ($instruction == "D") {
                    $currentNumber = "D";
                } 
                if ($instruction == "L") {
                    $currentNumber = "A";
                }
                if ($instruction == "R") {
                    $currentNumber = "C";
                }
                break;
            case "C":
                if ($instruction == "U") {
                    $currentNumber = 8;
                } 
                if ($instruction == "D") {
                    $currentNumber = "C";
                } 
                if ($instruction == "L") {
                    $currentNumber = "B";
                }
                if ($instruction == "R") {
                    $currentNumber = "C";
                }
                break;
            case "D":
                if ($instruction == "U") {
                    $currentNumber = "B";
                } 
                if ($instruction == "D") {
                    $currentNumber = "D";
                } 
                if ($instruction == "L") {
                    $currentNumber = "D";
                }
                if ($instruction == "R") {
                    $currentNumber = "D";
                }
        }
    }
    echo $currentNumber;
}
?>