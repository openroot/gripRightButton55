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
			set_error_handler(function($errNo, $errStr, $errFile, $errLine) {
				if (0 === error_reporting()) {
					return false;
				}
				throw new ErrorException($errStr, 0, $errNo, $errFile, $errLine);
			});

			function displayError($error) {
				print "<br>-<br>" . $error . "<br>-<br>";
			}

			/* save13 */
			class readFile {
				private $name;
				private $contentRows;
				private $size;

				function __construct($name) {
					$this->name = $name;
					$this->contentRows = [];
					$this->read();
				}

				private function read() {
					$file = null;
					try {
						$file = fopen($this->name, "r");
					}
					catch (Exception $e) {
						displayError($e);
					}
					if ($file) {
						$this->size = filesize($this->name);
						if ($this->size > 0) {
							while (!feof($file)) {
								array_push($this->contentRows, fgets($file));
							}
							fclose($file);
						}
					}
				}

				public function displayData() {
					print "File name: " . $this->name . "<br>";
					print "File size: " . $this->size . "<br>";
					print "File content:<br>". (new adapter($this->contentRows, adapterInputType::isArray))->convert(adapterOutputType::isHtml);
					print "<br><br>";
				}

				function __destruct() { }
			}
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

				public function convert($adapterOutputType) {
					if ($this->adapterInputType === adapterInputType::isString) {
						$this->content = [$this->content];
					}
					switch($adapterOutputType) {
						case adapterOutputType::isHtml:
							$t = "";
							foreach ($this->content as $row) {
								$row = mb_convert_encoding($row, "UTF-8", "HTML-ENTITIES");
								$row = htmlspecialchars($row);
								$row = str_replace(" ", "&nbsp;", $row) . "<br>";
								$t .= $row;
							}
							return $t;
							break;
					}
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
