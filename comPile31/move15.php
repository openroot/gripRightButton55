<?php
	namespace comPile31\move15;
?>

<?php
	class context {
		private string $basePath = __DIR__ . "/..";
		private array $hologram = [];

		function __construct() {
			$this->scanDirectories($this->basePath);
		}

		private function scanDirectories(string $path) {
			if (is_dir($path)) {
				$directoryList = [];
				$fileList = [];
				foreach (scandir($path) as $value) {
					if (!($value === "." || $value === "..")) {
						if (is_dir($value)) {
							array_push($directoryList, $value);
						}
						if (is_file($value)) {
							array_push($fileList, $value);
						}
					}
				}
				print_r($directoryList);
				print_r($fileList);
			}
		}

		public function fromHologram(): array {
			return $this->hologram;
		}
	}
?>