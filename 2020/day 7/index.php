<?php
$input = explode("\n", file_get_contents("input.txt"));

function color(array $r, string $color): array {
	$ret = [];
	foreach ($r as $pcolor => $con) {
		if (array_key_exists($color, $con)) {
            $ret = array_merge($ret, [$pcolor], color($r, $pcolor));
        }
    }
	return array_unique($ret);
}

function rules(array $input): array {
	$ret = [];
	foreach ($input as $rule) {
		if (preg_match('/^(([a-z ]+) bags?) contain ([0-9a-z, ]+ bags?)+\.$/', trim($rule), $m)) {
            [, , $color, $con] = $m;
			if ($con === 'no other bags') {
                $ret[$color] = [];
            } elseif (preg_match_all('/((\d+) ([a-z ]+) bags?)+?,?/', trim($con), $conmatch, PREG_SET_ORDER)) {
                $parcon = [];
			    foreach ($conmatch as $conma) {
				    [, , $conqty, $concolor] = $conma;
				    $parcon[$concolor] = $conqty;
                }
			    $ret[$color] = $parcon;
		    }
	    }
    }
    return $ret;
}

function concount(array $r, string $color): int {
	$ret = 0;
	foreach ($r[$color] as $concolor => $c) {
        $ret += $c * concount($r, $concolor);
    }
	return $ret + 1;
}
echo "Part 1:<br>" . count(color(rules($input), 'shiny gold')) . "<br><br>Part 2:<br>" . (concount(rules($input), 'shiny gold') - 1);
?>