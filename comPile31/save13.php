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
		private const allowedLengthUnit = 3621;

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
		private const allowedLengthUnit = [117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 117, 114, 114, 117];

		function __construct(string $sections) {
			$this->sections = $sections ?? "";
		}

		public function fromSections(): ?string {
			return $this->sections;
		}
	}

	class section {
		private ?string $segment = null;
		private const allowedLengthUnit = [
			1 => [2, 19, 64, 29, 3],
			2 => [2, 19, 64, 29, 3],
			3 => [2, 19, 64, 29, 3],
			4 => [2, 19, 64, 29, 3],
			5 => [2, 19, 64, 29, 3],
			6 => [2, 19, 64, 29, 3],
			7 => [2, 19, 64, 29, 3],
			8 => [2, 19, 64, 29, 3],
			9 => [2, 19, 64, 29, 3],
			10 => [2, 19, 64, 29, 3],
			11 => [2, 19, 64, 29, 3],
			12 => [2, 19, 64, 29, 3],
			13 => [2, 19, 64, 29, 3],
			14 => [2, 19, 64, 29, 3],
			15 => [2, 19, 64, 29, 3],
			16 => [2, 19, 64, 29, 3],
			17 => [2, 19, 64, 29, 3],
			18 => [2, 19, 64, 29, 3],
			19 => [2, 19, 64, 29, 3],
			20 => [2, 19, 64, 29, 3],
			21 => [2, 19, 64, 29, 3],
			22 => [2, 19, 64, 29, 3],
			23 => [2, 19, 64, 29, 3],
			24 => [2, 19, 64, 29, 3],
			25 => [2, 19, 64, 29, 3],
			26 => [2, 19, 64, 29, 3],
			27 => [2, 19, 64, 29, 3],
			28 => [2, 19, 64, 29, 3],
			29 => [2, 19, 64, 21, 8],
			30 => [2, 19, 64, 29],
			31 => [2, 19, 64, 29, 3]
		];

		function __construct() { }

		public function fromSegment(): ?string {
			return $this->segment;
		}
	}
?>