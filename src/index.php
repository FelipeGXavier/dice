<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Document</title>
</head>
<?php

$playerRolls = [$_GET['playerRoll1'], $_GET['playerRoll2']];
$playerTotal = (int) $playerRolls[0] + (int) $playerRolls[0];
$computerRolls = [$_GET['computerRoll1'], $_GET['computerRoll2']];
$computerTotal = (int) $computerRolls[0] + (int) $computerRolls[0];

$winnerMessage = "O vencedor é o %s";
if ($playerTotal > $computerTotal) {
	$winnerMessage = sprintf($winnerMessage, "Jogador");
} else if ($computerTotal > $playerTotal) {
	$winnerMessage = sprintf($winnerMessage, "Computador");
} else {
	$winnerMessage = "Empate!";
}

function assignPaths($keys) {
	$result = [];
	$paths = [
		"1" => "assets/img/Alea_1.png",
		"2" => "assets/img/Alea_2.png",
		"3" => "assets/img/Alea_3.png",
		"4" => "assets/img/Alea_4.png",
		"5" => "assets/img/Alea_5.png",
		"6" => "assets/img/Alea_6.png",
	];
	for ($i = 0; $i < 2; $i++) {
		$result[] = $paths[$keys[$i]];
	}
	return $result;
}

$playerDiceImages = assignPaths($playerRolls);
$computerDiceImages = assignPaths($computerRolls);

?>

<body>
	<main id="container">
		<div class="wrapper">
			<div class="form-box">
				<form action="core/dice.php" method="GET">
					<button type="submit" class="btn-play">Jogar</button>
				</form>
			</div>
			<?php if ($playerTotal > 0 && $computerTotal > 0) { ?>
				<h4 class="title-lg">Resultados: </h4>
				<section class="box">
					<div class="play">
						<div class="play-box">
							<h3>Jogador: </h3>
							<?php
							foreach ($playerDiceImages as $img) {
								echo "<img src='$img' alt='Imagem Dado'>";
							}
							?>
							<span class="total">Total: <?= $playerTotal ?></span>
						</div>
						<div class="play-box">
							<h3>Computador: </h3>
							<?php
							foreach ($computerDiceImages as $img) {
								echo "<img src='$img' alt='Imagem Dado'>";
							}
							?>
							<span class="total">Total: <?= $computerTotal ?></span>
						</div>
					</div>
					<div class="result">
						<span class="info"><?= $winnerMessage ?></span>
					</div>
				</section>
			<?php } ?>
		</div>
	</main>
</body>
</html>