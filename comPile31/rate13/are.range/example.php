<?php
	require_once("../../../comPile31/save13.php");
	require_once("../../../comPile31/buy13.php");
	require_once("../../../comPile31/move15.php");
	require_once("../../../comPile31/tor12.php");

	use comPile31\save13 as save13;
	use comPile31\buy13 as buy13;
	use comPile31\move15 as move15;
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