<?php
	require_once("comPile31/save13.php");
	require_once("comPile31/buy13.php");
	require_once("comPile31/move15.php");
	require_once("comPile31/tor12.php");

	use comPile31\save13 as save13;
	use comPile31\buy13 as buy13;
	use comPile31\move15 as move15;
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
				 //buy13\adapter::portHTML("\n«" . ($index + 1) . "» " .  $val);
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
				//buy13\adapter::portHTML("\n«" . ($index + 1) . "» " .  $val);
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
		<div class="dustParticle">
			<div>
				<div class="starSecond"></div>
				<div class="starThird"></div>
				<div class="starFourth"></div>
				<div class="starFifth"></div>
			</div>
		</div>

		<h1><span class="blue">&lt;</span>gripRightButton55<span class="blue">&gt;</span> <span class="yellow">Leverage Any Complications</pan></h1>
		<h2>Created with love by <a href="https://github.com/openroot" target="_blank">D Tapader</a></h2>

		<?php
			$context = new move15\context();
			$fileAddresses = [];
			foreach ($context->fromHologramFilePath() as $path => $name) {
				if ($name === $context->fromSignatureFileName()) {
					array_push($fileAddresses, $path);
				}
			}

			foreach ($fileAddresses as $fileAddress) {
				try {
					$file = new save13\readFile($fileAddress);

					$assembly = new tor12\assembly($file->fromContent());
					if (count($assembly->fromStruct()) > 0) {
						$i = 1;
						print "<div class='horizontalGap'></div>";
						print "<div class='autoScroll'><table>";
						print "<tbody>";
						foreach ($assembly->fromStruct() as $index1 => $value1) {
							if ($i === 2 || $i === 4 || $i === 5) {
								print "<tr>";
								foreach ($value1 as $value2) {
									print "<td>" . buy13\adapter::portHTML($value2) . "</td>";
								}
								print "</tr>";
							}
							$i++;
						}
						print "</tbody>";
						print "</table></div>";
					}


					/*$structure = new save13\structure($file->fromContent());
					if (!$structure->fromErrors()) {
						//displayCode($structure->fromStruct());
					}
					else {
						displayError($structure->fromErrors());
					}*/

					/*displayHTML([$file->fromName(), $file->fromSize(), $file->fromContent()]);*/
				}
				catch (Exception $e) {
					displayError([$e]);
				}
			}
		?>
	</body>
</html>
