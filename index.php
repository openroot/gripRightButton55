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
	function displayError($value) {
		if (count($value) > 0) {
			print "<br>-";
			var_dump($value);
			//print_r($value);
			//foreach ($value as $index => $val) {
				 //buy13\adapter::inHTML("\n«" . ($index + 1) . "» " .  $val);
			//}
			print "<br>-<br>";
		}
	}

	function displayCode($value) {
		if (count($value) > 0) {
			print "<pre>";
			var_dump($value);
			//print_r($value);
			//foreach ($value as $index => $val) {
				//buy13\adapter::inHTML("\n«" . ($index + 1) . "» " .  $val);
			//}
			print "</pre>";
		}
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
			<!--dust particle start-->
			<div class="marginBody">
				<div>
					<div class="starSec"></div>
					<div class="starThird"></div>
					<div class="starFourth"></div>
					<div class="starFifth"></div>
				</div>
			</div>
			<!--dust particle end-->

		<?php
			$fileAddresses = [
				"compile31/o",
				"aSpec19/rackLevelSystem64/transportSystem64/return24SilkRatio38/settingsSymmetric67/o"
			];

			foreach ($fileAddresses as $fileAddress) {
				try {
					$file = new save13\readFile($fileAddress);
					
					/*
					$structure = new save13\structure($file->fromContent());
					if (!$structure->fromErrors()) {
						//displayCode($structure->fromStruct());
					}
					else {
						displayError($structure->fromErrors());
					}
					*/

					/*$assembly = new tor12\assembly($file->fromContent());
					print "<pre>";
					//print_r($assembly->fromStruct());
					$i = 1;
					print "<table>";
					foreach ($assembly->fromStruct() as $index1 => $value1) {
						if ($i === 2 || $i === 4 || $i === 5) {
							print "<tr>";
							foreach ($value1 as $value2) {
									print "<td>" . $value2 . "</td>";
							}
							print "</tr>";
						}
						$i++;
					}
					print "</table>";
					print "</pre>";*/

					//displayHTML([$file->fromName(), $file->fromSize(), $file->fromContent()]);
				}
				catch (Exception $e) {
					displayError([$e]);
				}
			}
		?>
	</body>
</html>
