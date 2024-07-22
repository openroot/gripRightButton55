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

		function __construct(string $sections) {
			$this->sections = $sections ?? "";
		}

		public function fromSections(): ?string {
			return $this->sections;
		}
	}

	class section {
		private ?int $sectionNumber = null;
		private ?string $segment = null;

		public const acceptableTableMultiplier = [ // Addressing
			31 => 1,
			5 => 2,
			14 => 3,
			18 => 4
		];
		public const rangeSectionNumber = [ // Registering
			1 => [
				1 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				2 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				3 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				4 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				5 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				6 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				7 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				8 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				9 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				10 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				11 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				12 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				13 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				14 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				15 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				16 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				17 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				18 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				19 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				20 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				21 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				22 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				23 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				24 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				25 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				26 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				27 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				28 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]],
				29 => [1 => [1, 2, 3, 4], 2 => [1, 2, 3, 4]],
				30 => [1 => [1, 2, 3, 4], 2 => [1, 2, 3, 4]],
				31 => [1 => [1, 2, 3, 4, 5], 2 => [1, 2, 3, 4, 5]]
			],
			2 => [
				1 => [1, 2, 3, 4, 5],
				2 => [1, 2, 3, 4, 5],
				3 => [1, 2, 3, 4],
				4 => [1, 2, 3, 4],
				5 => [1, 2, 3, 4, 5]
			],
			3 => [
				1 => [1, 2, 3, 4, 5],
				2 => [1, 2, 3, 4, 5],
				3 => [1, 2, 3, 4, 5],
				4 => [1, 2, 3, 4, 5],
				5 => [1, 2, 3, 4, 5],
				6 => [1, 2, 3, 4, 5],
				7 => [1, 2, 3, 4, 5],
				8 => [1, 2, 3, 4, 5],
				9 => [1, 2, 3, 4, 5],
				10 => [1, 2, 3, 4, 5],
				11 => [1, 2, 3, 4, 5],
				12 => [1, 2, 3, 4],
				13 => [1, 2, 3, 4],
				14 => [1, 2, 3, 4, 5]
			],
			4 => [
				1 => [1, 2, 3, 4, 5],
				2 => [1, 2, 3, 4, 5],
				3 => [1, 2, 3, 4, 5],
				4 => [1, 2, 3, 4, 5],
				5 => [1, 2, 3, 4, 5],
				6 => [1, 2, 3, 4, 5],
				7 => [1, 2, 3, 4, 5],
				8 => [1, 2, 3, 4, 5],
				9 => [1, 2, 3, 4, 5],
				10 => [1, 2, 3, 4, 5],
				11 => [1, 2, 3, 4, 5],
				12 => [1, 2, 3, 4, 5],
				13 => [1, 2, 3, 4, 5],
				14 => [1, 2, 3, 4, 5],
				15 => [1, 2, 3, 4, 5],
				16 => [1, 2, 3, 4],
				17 => [1, 2, 3, 4],
				18 => [1, 2, 3, 4, 5]
			]
		];
		public const allowedLengthUnit = [ // Allowing
			1 => [
				1 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				2 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				3 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				4 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				5 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				6 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				7 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				8 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				9 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				10 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				11 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				12 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				13 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				14 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				15 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				16 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				17 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				18 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				19 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				20 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				21 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				22 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				23 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				24 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				25 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				26 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				27 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				28 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				29 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]]],
				30 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]]],
				31 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]], 2 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]]
			],
			2 => [
				1 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				2 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				3 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]]],
				4 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]]],
				5 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]]
			],
			3 => [
				1 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				2 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				3 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				4 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				5 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				6 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				7 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				8 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				9 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				10 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				11 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				12 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]]],
				13 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]]],
				14 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]]
			],
			4 => [
				1 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				2 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				3 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				4 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				5 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				6 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				7 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				8 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				9 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				10 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				11 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				12 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				13 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				14 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				15 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]],
				16 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1 => [21], 2 => [8]]]],
				17 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29]]],
				18 => [1 => [1 => [2], 2 => [19], 3 => [64], 4 => [29], 5 => [3]]]
			]
		];
		private const verifyCountTotal = [ // Verifying
			1 => [
				1 => [1 => 117, 2 => 117],
				2 => [1 => 117, 2 => 117],
				3 => [1 => 117, 2 => 117],
				4 => [1 => 117, 2 => 117],
				5 => [1 => 117, 2 => 117],
				6 => [1 => 117, 2 => 117],
				7 => [1 => 117, 2 => 117],
				8 => [1 => 117, 2 => 117],
				9 => [1 => 117, 2 => 117],
				10 => [1 => 117, 2 => 117],
				11 => [1 => 117, 2 => 117],
				12 => [1 => 117, 2 => 117],
				13 => [1 => 117, 2 => 117],
				14 => [1 => 117, 2 => 117],
				15 => [1 => 117, 2 => 117],
				16 => [1 => 117, 2 => 117],
				17 => [1 => 117, 2 => 117],
				18 => [1 => 117, 2 => 117],
				19 => [1 => 117, 2 => 117],
				20 => [1 => 117, 2 => 117],
				21 => [1 => 117, 2 => 117],
				22 => [1 => 117, 2 => 117],
				23 => [1 => 117, 2 => 117],
				24 => [1 => 117, 2 => 117],
				25 => [1 => 117, 2 => 117],
				26 => [1 => 117, 2 => 117],
				27 => [1 => 117, 2 => 117],
				28 => [1 => 117, 2 => 117],
				29 => [1 => 114, 2 => 114],
				30 => [1 => 114, 2 => 114],
				31 => [1 => 117, 2 => 117]
			],
			2 => [
				1 => [1 => 117],
				2 => [1 => 117],
				3 => [1 => 114],
				4 => [1 => 114],
				5 => [1 => 117]
			],
			3 => [				
				1 => [1 => 117],
				2 => [1 => 117],
				3 => [1 => 117],
				4 => [1 => 117],
				5 => [1 => 117],
				6 => [1 => 117],
				7 => [1 => 117],
				8 => [1 => 117],
				9 => [1 => 117],
				10 => [1 => 117],
				11 => [1 => 117],
				12 => [1 => 114],
				13 => [1 => 114],
				14=> [1 => 117]
			],
			4 => [				
				1 => [1 => 117],
				2 => [1 => 117],
				3 => [1 => 117],
				4 => [1 => 117],
				5 => [1 => 117],
				6 => [1 => 117],
				7 => [1 => 117],
				8 => [1 => 117],
				9 => [1 => 117],
				10 => [1 => 117],
				11 => [1 => 117],
				12 => [1 => 117],
				13 => [1 => 117],
				14 => [1 => 117],
				15 => [1 => 117],
				16 => [1 => 114],
				17 => [1 => 114],
				18=> [1 => 117]
			]
		];
		private const commonIdentificationString = [ // Moderating
			1 => [
				1 => [1 => "o", 2 => "��"],
				2 => [1 => "x", 2 => "��"],
				3 => [1 => "1", 2 => "��"],
				4 => [1 => "2", 2 => "<>"],
				5 => [1 => "3", 2 => "��"],
				6 => [1 => "4", 2 => "��"],
				7 => [1 => "5", 2 => "||"],
				8 => [1 => "6", 2 => "__"],
				9 => [1 => "7", 2 => "��"],
				10 => [1 => "8", 2 => "~~"],
				11 => [1 => "9", 2 => "��"],
				12 => [1 => "10", 2 => "��"],
				13 => [1 => "11", 2 => "��"],
				14 => [1 => "12", 2 => "��"],
				15 => [1 => "13", 2 => "��"],
				16 => [1 => "14", 2 => "^^"],
				17 => [1 => "15", 2 => "[]"],
				18 => [1 => "16", 2 => "{}"],
				19 => [1 => "17", 2 => "()"],
				20 => [1 => "18", 2 => "��"],
				21 => [1 => "19", 2 => "��"],
				22 => [1 => "20", 2 => "++"],
				23 => [1 => "21", 2 => "--"],
				24 => [1 => "22", 2 => "%%"],
				25 => [1 => "23", 2 => "=="],
				26 => [1 => "24", 2 => "��"],
				27 => [1 => "25", 2 => "��"],
				28 => [1 => "26", 2 => "��"],
				29 => [1 => "t", 2 => "��"],
				30 => [1 => "u", 2 => "��"],
				31 => [1 => "+-", 2 => "��"]
			],
			2 => [
				1 => [1 => "o"],
				2 => [1 => "x"],
				3 => [1 => "t"],
				4 => [1 => "u"],
				5 => [1 => "+-"]
			],
			3 => [
				1 => [1 => "o"],
				2 => [1 => "x"],
				3 => [1 => "1"],
				4 => [1 => "2"],
				5 => [1 => "3"],
				6 => [1 => "4"],
				7 => [1 => "5"],
				8 => [1 => "6"],
				9 => [1 => "7"],
				10 => [1 => "8"],
				11 => [1 => "9"],
				12 => [1 => "t"],
				13 => [1 => "u"],
				14 => [1 => "+-"]
			],
			4 => [
				1 => [1 => "o"],
				2 => [1 => "x"],
				3 => [1 => "1"],
				4 => [1 => "2"],
				5 => [1 => "3"],
				6 => [1 => "4"],
				7 => [1 => "5"],
				8 => [1 => "6"],
				9 => [1 => "7"],
				10 => [1 => "8"],
				11 => [1 => "9"],
				12 => [1 => "10"],
				13 => [1 => "11"],
				14 => [1 => "12"],
				15 => [1 => "13"],
				16 => [1 => "t"],
				17 => [1 => "u"],
				18 => [1 => "+-"]
			]
		];

		function __construct(int $sectionNumber, string $segment) {
			$this->segment = $segment ?? "";
		}

		public function fromSegment(): ?string {
			return $this->segment;
		}
	}
?>