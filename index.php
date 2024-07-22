<?php
	require_once("comPile31/save13.php");
	require_once("comPile31/buy13.php");
	require_once("comPile31/tor12.php");

	use comPile31\save13 as save13;
	use comPile31\buy13 as buy13;
	use comPile31\tor12 as tor12;
?>

<?php
	error_reporting(E_ALL);
	set_error_handler("error");

	function error($errno, $errstr, $errfile, $errline): void {
		if (error_reporting() !== 0) {
			$trace = new tor12\trace();
			$trace->report($errstr, $errno, $errfile, $errline);
		}
	}
?>

<?php
	function displayError($error) {
		print "<br>-<br>" . $error . "<br>-<br>";
	}

	function displayHTML($value) {
		print "File name: " . $value[0] . "<br>";
		print "File size: " . $value[1] . "<br>";
		print "File content:<br>". (new buy13\adapter($value[2], buy13\adapterInputType::array))->convert(buy13\adapterOutputType::html);
		print "<br><br>";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>gripRightButton55</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="interNet29/plugin28/style.css">
		<script src="interNet29/plugin28/script.js"></script>
	</head>
	<body>
		<div>
			<h1>Ready Page</h1>
			<p>See the effect.</p>
		</div>

		<?php
			$fileAddresses = [
				"o",
				"aSpec19/rackLevelSystem64/o/t/o/o/o/2/1"
			];

			foreach ($fileAddresses as $fileAddress) {
				try {
					$file = new save13\readFile($fileAddress);
					displayHTML([$file->fromName(), $file->fromSize(), $file->fromContent()]);

					$structure = new save13\structure($file->fromContent());
					foreach ($structure->fromDivisions() as $division) {
						//print_r($division->fromSections());
					}
				}
				catch (Exception $e) {
					displayError($e);
				}
			}

			print "<pre>";
			//print_r(save13\section::allowedLengthUnit);
			print "</pre>";
		?>
	</body>
</html>
