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
				public $name;
				public $contentRows;
				public $size;

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

				private function htmlAdapter() {
					$t = "";
					foreach ($this->contentRows as $contentRow) {
						$contentRow = mb_convert_encoding($contentRow, "UTF-8", "HTML-ENTITIES");
						$contentRow = htmlspecialchars($contentRow);
						$contentRow = str_replace(" ", "&nbsp;", $contentRow) . "<br>";
						$t .= $contentRow;
					}
					return $t;
				}

				public function displayData() {
					print "File name: " . $this->name . "<br>";
					print "File size: " . $this->size . "<br>";
					print "File content:<br>". $this->htmlAdapter();
					print "<br><br>";
				}

				function __destruct() { }
			}
			/* save13 */

			/* buy13 */
			/* buy13 */

			$fileAddresses = ["o", "aSpec19/rackLevelSystem64/o/t/o/o/o/2/1"];
			foreach ($fileAddresses as $fileAddress) {
				$file = new readFile($fileAddress);
				$file->displayData();
			}
		?>
	</body>
</html>
