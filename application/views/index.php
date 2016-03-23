<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold w/ CodeIgniter</title>
</head>
<body>

<h3>Your Gold: <?= $gold ?><h3>

<form method="POST" action='/ninjagold/process_money'>
	Farm - (earns 10-20 golds)
	<input type="hidden" name="building" value="farm">
	<button>Find Gold!</button>
</form>


<form method="POST" action='/ninjagold/process_money'>
	Cave - (earns 5-10 golds)
	<input type="hidden" name="building" value="cave">
	<button>Find Gold!</button>
</form>

<form method="POST" action='/process_money'>
	House - (earns 2-5 golds)
	<input type="hidden" name="building" value="house">
	<button>Find Gold!</button>
</form>

<form method="POST" action='/process_money'>
	Casino - (earns/takes 0-50 golds)
	<input type="hidden" name="building" value="casino">
	<button>Find Gold!</button>
</form>

<div id="activities">
	<?php
		foreach ($log as $message) {
	?>
		<p><?= $message?><p>
	<?
		}
	?>
</div>

</body>
</html>