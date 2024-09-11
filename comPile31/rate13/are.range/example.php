<?php
	require_once("../../../comPile31/tor12.php");

	use comPile31\tor12 as tor12;
?>

<?php
	$fault = new tor12\fault();
	$panel = new tor12\panel();
?>

<?php
	try {
		$example = new tor12\example();

		$panel->top();
		$panel->head();
		$panel->body([
			'spectrum' => false,
			'frame' => [
				$example->plainText(),
				$example->materialSegment(),
				$example->materialPre(),
				$example->materialTable()
			],
			'menu' => true
		]);
		$example->error();
		$panel->bottom();
	}
	catch (Exception $e) {
		$fault->show([$e]);
	}
?>