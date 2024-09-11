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

<!DOCTYPE html>
<html lang="en">
	<?php
		try {
			$example = new tor12\example();

			$panel->head();
			$panel->body([
				'spectrum' => false,
				'<div class="frame">',
				$example->plainText(),
				$example->htmlSegment(),
				$example->htmlPre(),
				$example->htmlTable(),
				'</div>',
				'menu' => true
			]);

			$example->error();
		}
		catch (Exception $e) {
			$fault->show([$e]);
		}
	?>
</html>
