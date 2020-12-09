<?php
$inst = explode("\n", file_get_contents("input.txt"));

function termcorr(array $inst): bool {
	$acc = 0;
	$ip = 0;
	$exc = [];
	while ($ip < count($inst)) {
		if (array_key_exists($ip, $exc) && $exc[$ip] != 0) {
            return false;
        }
		$exc[$ip] = 1;
		[$acc, $ip] = runins($inst[$ip], [$acc, $ip]);
	}
	return true;
}

function accget(array $inst): int {
	$acc = 0;
	$ip = 0;
	$exc = [];
	while ($ip < count($inst)) {
		if (array_key_exists($ip, $exc) && $exc[$ip] != 0) {
            return $acc;
        }
		$exc[$ip] = 1;
		[$acc, $ip] = runins($inst[$ip], [$acc, $ip]);
	}
	return $acc;
}

function runins(array $inruction, array $regs): array {
	[$in, $arg] = $inruction;
	[$acc, $ip] = $regs;
	switch ($in) {
		case "acc":
			$acc += $arg;
			$ip += 1;
			break;
		case "jmp":
			$ip += $arg;
			break;
		case "nop":
			$ip +=1;
			break;
	}
    // echo "Executed " . $in . ", $acc = " . $acc . ", $ip = " . $ip . "<br>";
    // ip = intructies position, eerste loopt dus infinite tweede wordt veranderd zodat het programma niet
    // van jmp naar jmp gaat, console gaat dus aan..
	return [$acc, $ip];
}

function parseins(array $inst): array {
	$pinstru = [];
	foreach ($inst as $inruction) {
		if (preg_match("/^(acc|jmp|nop) ([+\-\d]+)$/", trim($inruction), $ma)) {
			[, $in, $arg] = $ma;
			$pinstru[] = [$in, $arg];
		}
	}
	return $pinstru;
}

function p2(array $inst): int {
	$orginst = parseins($inst);
	foreach ($orginst as $idx => $inruction) {
		$altinst = $orginst;
		switch ($inruction[0]) {
			case "jmp":
				$altinst[$idx][0] = "nop";
				break;
			case "nop":
				$altinst[$idx][0] = "jmp";
				break;
		}

		if (termcorr($altinst)) {
            return accget($altinst);
        }
	}
	return 0;
}
echo "Part 1:<br>" . accget(parseins($inst)) . "<br><br>" . "Part 2:<br>" . p2($inst);
?>