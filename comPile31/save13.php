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
			foreach ($divisions as $sections) {
				$division = new division($sections);
				array_push($this->divisions, $division);
			}
		}

		public function fromDivisions(): ?array {
			return $this->divisions;
		}
	}

	class division {
		private ?string $sections = null;
		private const allowedLengthUnit = [
			1 => 117,
			2 => 117,
			3 => 117,
			4 => 117,
			5 => 117,
			6 => 117,
			7 => 117,
			8 => 117,
			9 => 117,
			10 => 117,
			11 => 117,
			12 => 117,
			13 => 117,
			14 => 117,
			15 => 117,
			16 => 117,
			17 => 117,
			18 => 117,
			19 => 117,
			20 => 117,
			21 => 117,
			22 => 117,
			23 => 117,
			24 => 117,
			25 => 117,
			26 => 117,
			27 => 117,
			28 => 117,
			29 => 114,
			30 => 114,
			31 => 117
		];

		function __construct(string $sections) {
			$this->sections = $sections ?? "";
		}

		public function fromSections(): ?string {
			return $this->sections;
		}
	}

	class section {
		private ?string $segment = null;
		public const allowedLengthUnit = [
			1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			3 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			4 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			5 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			6 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			7 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			8 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			9 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			10 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			11 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			12 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			13 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			14 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			15 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			16 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			17 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			18 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			19 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			20 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			21 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			22 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			23 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			24 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			25 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			26 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			27 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			28 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]],
			29 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]],
			30 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]],
			31 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]
		];

		function __construct(string $segment) {
			$this->segment = $segment ?? "";
		}

		public function fromSegment(): ?string {
			return $this->segment;
		}
	}
?>