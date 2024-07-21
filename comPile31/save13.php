<?php
	set_error_handler(function($errNo, $errStr, $errFile, $errLine) {
		if (0 === error_reporting()) {
			return false;
		}
		throw new ErrorException($errStr, 0, $errNo, $errFile, $errLine);
	});
	
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
?>