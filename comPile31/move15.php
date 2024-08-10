<?php
	namespace comPile31\move15;
?>

<?php
	class context {
		private string $basePath = __DIR__ . "\..";
		private string $signatureFileName = "o";
		private array $extraDirectoryName = [".git", ".vs"];
		private array $extraFileName = [".gitattributes", ".gitignore"];
		private array $hologramFilePath = [];

		function __construct() {
			$this->scanDirectories($this->basePath);
		}

		private function scanDirectories(string $path) {
			if (is_dir($path)) {
				$directoryList = [];
				$fileList = [];
				foreach (scandir($path) as $value) {
					if (!($value === "." || $value === "..")) {
						if (is_dir($value) && !in_array($value, $this->extraDirectoryName, true)) {
							array_push($directoryList, $path . "\\" . $value);
						}
						if (is_file($value) && !in_array($value, $this->extraFileName, true)) {
							array_push($fileList, $path . "\\" . $value);
						}
					}
				}

				print "<pre>";
				print_r($directoryList);
				print_r($fileList);
				print "</pre>";
				print "<br>";

				if (count($directoryList) > 0) {
					foreach ($directoryList as $directoryPath) {
						$this->scanDirectories($directoryPath);
					}
				}
			}
		}

		public function fromHologramFilePath(): array {
			return $this->hologramFilePath;
		}
	}
?>