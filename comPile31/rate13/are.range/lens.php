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
	function displayError($value) {
		if (count($value) > 0) {
			print "<br>-";
			var_dump($value);
			//print_r($value);
			//foreach ($value as $index => $val) {
				 //buy13\adapter::portHTML("\n�" . ($index + 1) . "� " .  $val);
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
				//buy13\adapter::portHTML("\n�" . ($index + 1) . "� " .  $val);
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
		<link rel="stylesheet" href="../../../interNet29/plugIn128/n.umber/style.css">
		<script src="../../../interNet29/plugIn128/n.umber/script.js"></script>
	</head>
	<body>
		<div id="spectrum"></div>

		<div class="dustParticle">
			<div>
				<div class="starSecond"></div>
				<div class="starThird"></div>
				<div class="starFourth"></div>
				<div class="starFifth"></div>
			</div>
		</div>

		<div class="frame">
		<?php
			$context = new move15\context();
			$fileAddresses = [];
			foreach ($context->fromHologramFilePath() as $path => $name) {
				if ($name === $context->fromSignatureFileName()) {
					array_push($fileAddresses, $path);
				}
			}
			$ct = 1;
			foreach ($fileAddresses as $index => $fileAddress) {
				try {
					$file = new save13\readFile($fileAddress);

					$assembly = new tor12\assembly($file->fromContent());
					if ($assembly->fromStruct() !== null) {
						$totalChars = 0;
						$checkSum1 = 0;
						$checkSum2 = 0;
						$realPath = realpath(dirname($fileAddress));
						$rowCount = count($assembly->fromStruct());
						print "<div class='autoScroll'>";
						print "<table class='assembly'>";
						print "<caption>";
						print $ct++ . ". " . substr($realPath, strpos($realPath, "gripRightButton55"));
						print "</caption>";
						print "<tbody>";
						foreach ($assembly->fromStruct() as $index1 => $value1) {
							print "<tr>";
							foreach ($value1 as $index2 => $value2) {
								print "<td title=''>" . buy13\adapter::portHTML($value2) . "</td>";
								if (!($index2 === 0 || $index2 === 3 || $index2 === 5)) {
									$totalChars += strlen(trim($value2));
								}
								if ($index2 === 6) {
									$checkSum1 += intval(trim($value2));
								}
								if (!($index1 === 0 || $index1 === 1 || $index1 === $rowCount - 3 || $index1 === $rowCount - 2 || $index1 === $rowCount - 1)) {
									if ($index2 === 6) {
										$checkSum2 += intval(trim($value2));
									}
								}
							}
							print "</tr>";
						}
						print "</tbody>";
						print "</table></div>";
						print "<div class='horizontalGap'>";
						print "</div>";

						$totalChars -= 6;
						print "<div class='blue'>[CHECK] Total Characters: " . $totalChars . " | Theta Sum: " . $checkSum1 . " / " . $checkSum2 . " (~" . ($checkSum1 - $checkSum2) . ")</div>";
					}



					//$structure = new save13\structure($file->fromContent());
					//if (!$structure->fromErrors()) {
					//	displayCode($structure->fromStruct());
					//}
					//else {
					//	displayError($structure->fromErrors());
					//}

					//displayHTML([$file->fromName(), $file->fromSize(), $file->fromContent()]);
				}
				catch (Exception $e) {
					displayError([$e]);
				}
			}
		?>
		</div>

		<div id="menu">
			<div>
				<table>
					<caption>
						<div>
							gripRightButton55
						</div>
						<div>
							Leverage Any Complications
						</div>
					</caption>
					<tr>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
					</tr>
					<tr>
						<td>F</td>
						<td>G</td>
						<td>H</td>
						<td>I</td>
						<td>J</td>
					</tr>
					<tr>
						<td>K</td>
						<td>L</td>
						<td>M</td>
						<td>N</td>
						<td>O</td>
					</tr>
					<tr>
						<td>P</td>
						<td>Q</td>
						<td>R</td>
						<td>S</td>
						<td>T</td>
					</tr>
					<tr>
						<td>U</td>
						<td>V</td>
						<td>W</td>
						<td>X</td>
						<td>Y</td>
					</tr>
					<tr>
						<td>Z</td>
						<td>_</td>
						<td>@</td>
						<td>&lt;</td>
						<td>&gt;</td>
					</tr>
				</table>
			</div>
			<div>
				&copy; D Tapader 
				<a href="https://github.com/openroot" target="_blank">g</a> 
				<a href="https://www.facebook.com/larrypage34" target="_blank">f</a>
			</div>
		</div>
	</body>
</html>
