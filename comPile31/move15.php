<?php
	namespace comPile31\move15;
?>

<?php
	class context {
		private string $basePath = __DIR__ . "\..";
		private string $signatureFileName = "o";
		private array $extraReservedName = [".", ".."];
		private array $extraDirectoryName = [".git", ".vs"];
		private array $extraFileName = [".gitattributes", ".gitignore"];
		private array $hologramDirectoryPath = [];
		private array $hologramFilePath = [];

		function __construct() {
			$this->scanDirectories($this->basePath);
		}

		private function scanDirectories(string $path) {
			if (is_dir($path)) {
				$directoryList = [];
				$fileList = [];
				foreach (scandir($path) as $value) {
					if (!in_array($value, $this->extraReservedName, true)) {
						if (is_dir($path . "\\" . "$value") && !in_array($value, $this->extraDirectoryName, true)) {
							array_push($directoryList, $path . "\\" . $value);
							array_push($this->hologramDirectoryPath, $path . "\\" . $value);
						}
						if (is_file($path . "\\" . "$value") && !in_array($value, $this->extraFileName, true)) {
							array_push($fileList, $path . "\\" . $value);
							array_push($this->hologramFilePath, $path . "\\" . $value);
						}
					}
				}

				if (count($directoryList) > 0) {
					foreach ($directoryList as $directoryPath) {
						$this->scanDirectories($directoryPath);
					}
				}
			}
		}

		public function fromHologramDirectoryPath(): array {
			return $this->hologramDirectoryPath;
		}

		public function fromHologramFilePath(): array {
			return $this->hologramFilePath;
		}
	}
?>