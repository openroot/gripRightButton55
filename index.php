<?php
	require_once("comPile31/save13.php");
	require_once("comPile31/buy13.php");
	require_once("comPile31/tor12.php");
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
			function displayError($error) {
				print "<br>-<br>" . $error . "<br>-<br>";
			}

			/* save13 */
			/* save13 */

			/* buy13 */
			enum adapterInputType: string {
				case isString = "string";
				case isArray = "array";
			};
			
			enum adapterOutputType: string {
				case isHtml = "html";
			};
			
			class adapter {
				private $content;
				private $adapterInputType;

				function __construct($content, $adapterInputType) {
					$this->content = $content;
					$this->adapterInputType = $adapterInputType;
				}

				private function convertToHTML($str) {
					$str = mb_convert_encoding($str, "UTF-8", "HTML-ENTITIES");
					$str = htmlspecialchars($str);
					$str = str_replace(" ", "&nbsp;", $str);
					return $str;
				}

				public function convert($adapterOutputType) {
					if ($this->adapterInputType === adapterInputType::isString) {
						$this->content = [$this->content];
					}
					switch($adapterOutputType) {
						case adapterOutputType::isHtml:
							switch($this->adapterInputType) {
								case adapterInputType::isString:
									return $this->convertToHTML($this->content);
									break;
								case adapterInputType::isArray:
									$t = "";
									foreach ($this->content as $row) {
										$t .= $this->convertToHTML($row) . "<br>";
									}
									return $t;
									break;
							}
							break;
					}
					return null;
				}
			}
			/* buy13 */

			$fileAddresses = [
				"o",
				"aSpec19/rackLevelSystem64/o/t/o/o/o/2/1"
			];
			foreach ($fileAddresses as $fileAddress) {
				$file = new readFile($fileAddress);
				$file->displayData();
			}
		?>
	</body>
</html>
