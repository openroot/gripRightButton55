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

			class readFile {
				public $name;
				public $content;
				public $size;

				function __construct($name) {
					$this->name = $name;
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
							$this->content = fread($file, $this->size);
							fclose($file);
						}
					}
				}

				public function displayData() {
					print "File name: " . $this->name . "<br>";
					print "File size: " . $this->size . "<br>";					
					$this->content = mb_convert_encoding($this->content, "UTF-8", "HTML-ENTITIES");
					$this->content = nl2br(htmlspecialchars($this->content));
					$this->content = str_replace(" ", "&nbsp;", $this->content);
					print "File content:<br>" . $this->content;
					print "<br>";
				}

				function __destruct() { }
			}

			$file = new readFile("o");
			$file->displayData();
		?>
	</body>
</html>
