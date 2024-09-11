<?php
	require_once("../../../comPile31/tor12.php");

	use comPile31\tor12 as tor12;
?>

<?php
	$panel = new tor12\panel();
	$fault = new tor12\fault();
?>

<?php
	try {
		$example = new tor12\example();

		$panel->top();
		$panel->head();
		$panel->body([
			"spectrum" => false,
			"frame" => [
				$example->plainText(),
				$example->materialSegment(),
				$example->materialPre(),
				$example->materialTable()
			],
			"menu" => true
		]);
		$panel->bottom();

		$example->error();
	}
	catch (Exception $e) {
		$fault->show([$e]);
	}
?>