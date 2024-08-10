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
				print_r(scandir($path));
			}
		}

		public function fromHologram(): array {
			return $this->hologram;
		}
	}
?>