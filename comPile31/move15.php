<?php
	namespace comPile31\move15;
?>

<?php
	class context {
		private array $extraReservedName = [".", ".."];
		private array $extraDirectoryName = [".git", ".vs"];
		private array $extraFileName = [".gitattributes", ".gitignore"];
		private string $basePath = "";
		private string $signatureFileName = "";
		private array $hologramDirectoryPath = [];
		private array $hologramFilePath = [];

		function __construct(string $basePath = "", string $signatureFileName = "") {
			$this->basePath = empty($basePath) ? __DIR__ . "\.." : $basePath;
			$this->signatureFileName = empty($signatureFileName) ? "o" : $signatureFileName;
			$this->scanDirectories($this->basePath);
		}

		private function scanDirectories(string $path) {
			if (is_dir($path)) {
				$directoryList = [];
				foreach (scandir($path) as $value) {
					if (!in_array($value, $this->extraReservedName, true)) {
						if (is_dir($path . "\\" . "$value") && !in_array($value, $this->extraDirectoryName, true)) {
							$this->hologramDirectoryPath[$path . "\\" . $value] = $value;
							array_push($directoryList, $path . "\\" . $value);
						}
						if (is_file($path . "\\" . "$value") && !in_array($value, $this->extraFileName, true)) {
							$this->hologramFilePath[$path . "\\" . $value] = $value;
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

		public function fromBasePath(): string {
			return $this->basePath;
		}

		public function fromSignatureFileName(): string {
			return $this->signatureFileName;
		}

		public function fromHologramDirectoryPath(): array {
			return $this->hologramDirectoryPath;
		}

		public function fromHologramFilePath(): array {
			return $this->hologramFilePath;
		}
	}
?>