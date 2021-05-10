<?php 


function getCurrentUrl() {
  $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
  $server = $_SERVER['SERVER_NAME'];
  $port = $_SERVER['SERVER_PORT'] ? ':' .$_SERVER['SERVER_PORT'] : '';
  return $protocol . $server . $port;
}

function generateRandomNumbers($start = 1, $end = 6, $size = 4) {
	$result = [];
	for($i = 0; $i < $size; $i++) {
		$result[] = rand($start, $end);
	}
	return $result;
}

function assignNumbers() {
	$rolls = generateRandomNumbers();
	$plays = [
		'playerRoll1' => $rolls[0],
		'playerRoll2' => $rolls[1],
		'computerRoll1' => $rolls[2],
		'computerRoll2' => $rolls[3],
	];
	return $plays;
}

$currentUrl = getCurrentUrl();
$plays = http_build_query(assignNumbers());
$redirect = $currentUrl . "?$plays";

header("Location: $redirect");

