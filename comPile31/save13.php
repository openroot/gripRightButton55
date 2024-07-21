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
	class structure {
		private ?array $divisions = null;

		function __construct(array $divisions) {
			$this->divisions = [];
			foreach ($divisions as $section) {
				$division = new division($section);
				array_push($this->divisions, $division);
			}
		}

		public function fromDivisions(): ?array {
			return $this->divisions;
		}
	}

	class division {
		private ?string $sections = null;

		function __construct(string $sections) {
			$this->sections = $sections or "";
		}

		public function fromSections(): ?string {
			return $this->sections;
		}
	}

	class section {
		private ?string $segment = null;

		function __construct() { }

		public function fromSegment(): ?string {
			return $this->segment;
		}
	}
?>