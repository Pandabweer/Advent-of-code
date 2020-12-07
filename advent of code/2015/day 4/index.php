<?php
$input = "ckczppom"; // Input here
echo "Part 1:<br>";

for ($i = 0; $i < 9999999999999; $i++) {
    if (strpos(md5($input . $i), "00000") !== false) {
        if (substr(md5($input . $i), 0, 5) == "00000") {
            echo "Number: $i  Hash: " . md5($input . $i) . "<br>";
            break;
        }
    }
}

// part 2
echo "<br>Part 2:<br>";

for ($i = 0; $i < 9999999999999; $i++) {
    if (strpos(md5($input . $i), "000000") !== false) {
        if (substr(md5($input . $i), 0, 5) == "000000") {
            echo "Number: $i  Hash: " . md5($input . $i) . "<br>";
            break;
        }
    }
}

?>