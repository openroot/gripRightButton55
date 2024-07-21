<?php
	namespace comPile31\save13;
?>

<?php
	class readFile {
		private string $name = "";
		private ?int $size = null;
		private ?array $content = null;

		function __construct(string $name) {
			$this->name = $name;
			$this->read();
		}

		private function read(): void {
			$file = null;
			$file = fopen($this->name, "r");
			if ($file) {
				$this->size = filesize($this->name);
				if ($this->size > 0) {
					$this->content = [];
					while (!feof($file)) {
						array_push($this->content, fgets($file));
					}
					fclose($file);
				}
			}
		}

		public function fromName(): string {
			return $this->name;
		}

		public function fromSize(): ?int {
			return $this->size;
		}

		public function fromContent(): ?array {
			return $this->content;
		}
	}
?>

<?php
	class container {
		private ?array $structure = null;

		function __construct(array $structure) {
			$this->structure = [];
			foreach ($structure as $section) {
				$division = new division($section);
				array_push($this->structure, $division);
			}
		}

		public function fromStructure(): ?array {
			return $this->structure;
		}
	}

	class division {
		private ?string $section = null;

		function __construct(string $section) {
			$this->section = $section or "";
		}

		public function fromSection(): ?string {
			return $this->section;
		}
	}
?>