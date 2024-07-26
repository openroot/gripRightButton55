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
		public const acceptableDivisionMultiplier = [ // Addressing
			31 => "",
			5 => "",
			14 => "",
			18 => ""
		];
		private const commonIdentificationString = [ // Monitoring
			1 => ["o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13",
				 "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "t", "u", ".."],
			2 => ["++", "=v", "=d", "=w", "=a", "=s", "=p", "=i", "=g", "=n", "=c", "=f", "=r", "=h", "=y",
				 "?p", "=3", "=2", "=1", "?m", "?d", "?a", "?s", "?r", "?e", "=b", "=t", "=o", "=9", "=k", "--"],
			3 => ["o", "x", "t", "u", ".."],
			4 => ["o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "t", "u", ".."],
			5 => ["o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "t", "u", ".."]
		];
		private const verifyCountTotal = [ // Verifying
			1 => [119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119,
				 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119],
			2 => [119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119,
				 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119],
			3 => [119, 119,  116, 116, 119],
			4 => [119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119],
			5 => [119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119]
		];
		public const allowedLengthUnit = [ // Allowing
			1 => [
				1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				3 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				4 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				5 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				6 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				7 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				8 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				9 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				10 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				11 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				12 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				13 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				14 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				15 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				16 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				17 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				18 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				19 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				20 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				21 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				22 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				23 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				24 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				25 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				26 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				27 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				28 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				29 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 21, 8, 1]],
				30 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1]],
				31 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]]
			],
			2 => [
				1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				3 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				4 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				5 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				6 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				7 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				8 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				9 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				10 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				11 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				12 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				13 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				14 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				15 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				16 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				17 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				18 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				19 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				20 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				21 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				22 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				23 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				24 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				25 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				26 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				27 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				28 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				29 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 21, 8, 1]],
				30 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1]],
				31 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]]
			],
			3 => [
				1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				3 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 21, 8, 1]],
				4 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1]],
				5 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]]
			],
			4 => [
				1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				3 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				4 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				5 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				6 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				7 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				8 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				9 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				10 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				11 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				12 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 21, 8, 1]],
				13 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1]],
				14 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]]
			],
			5 => [				
				1 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				2 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				3 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				4 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				5 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				6 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				7 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				8 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				9 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				10 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				11 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				12 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				13 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				14 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				15 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]],
				16 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 21, 8, 1]],
				17 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1]],
				18 => [1 => [2], 2 => [19], 3 => [64], 4 => [1, 29, 1], 5 => [3]]
			]
		];
		public const rangeSectionNumber = [ // Registering
			1 => [
				1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				3 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				4 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				5 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				6 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				7 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				8 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				9 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				10 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				11 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				12 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				13 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				14 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				15 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				16 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				17 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				18 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				19 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				20 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				21 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				22 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				23 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				24 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				25 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				26 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				27 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				28 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				29 => [1 => [], 2 => [], 3 => [], 4 => []],
				30 => [1 => [], 2 => [], 3 => [], 4 => []],
				31 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []]
			],
			2 => [
				1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				3 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				4 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				5 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				6 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				7 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				8 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				9 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				10 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				11 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				12 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				13 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				14 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				15 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				16 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				17 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				18 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				19 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				20 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				21 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				22 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				23 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				24 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				25 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				26 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				27 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				28 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				29 => [1 => [], 2 => [], 3 => [], 4 => []],
				30 => [1 => [], 2 => [], 3 => [], 4 => []],
				31 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []]
			],
			3 => [
				1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				3 => [1 => [], 2 => [], 3 => [], 4 => []],
				4 => [1 => [], 2 => [], 3 => [], 4 => []],
				5 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []]
			],
			4 => [
				1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				3 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				4 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				5 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				6 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				7 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				8 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				9 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				10 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				11 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				12 => [1 => [], 2 => [], 3 => [], 4 => []],
				13 => [1 => [], 2 => [], 3 => [], 4 => []],
				14 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []]
			],
			5 => [
				1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				3 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				4 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				5 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				6 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				7 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				8 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				9 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				10 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				11 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				12 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				13 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				14 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				15 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
				16 => [1 => [], 2 => [], 3 => [], 4 => []],
				17 => [1 => [], 2 => [], 3 => [], 4 => []],
				18 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []]
			]
		];
		private array $errors = [];
		private array $struct = [];

		function __construct(array $divisions) {
			$divisionsCount = count($divisions);
			if (array_key_exists($divisionsCount, structure::acceptableDivisionMultiplier)) {
				foreach ($divisions as $division) {
					$sections = explode(":", $division);
					array_shift($sections);
					array_pop($sections);
					$secs = [];
					foreach ($sections as $section) {
						$sectionLength = strlen($section);
						if (!($section === $this->createDummyString("_", $sectionLength) || $section === $this->createDummyString("@", $sectionLength))) {
							array_push($secs, $section);
						}
					}
					array_push($this->struct, $secs);
				}
				$this->isStructure();
			}
			else {
				array_push($this->errors, "Allowed count of divisions are " . implode(", ", array_keys(structure::acceptableDivisionMultiplier)) . ", provided " . $divisionsCount . ".");
			}
		}

		private function createDummyString(string $content, int $count): string {
			$result = "";
			if ($count > 0) {
				for ($i = 1; $i <= $count; $i++) {
					$result .= $content;
				}
			}
			return $result;
		}

		private function findCommonIdentificationString(): ?int {
			$identification = null;
			if ($this->struct) {
				$identificationItems = [];
				foreach ($this->struct as $division) {
					array_push($identificationItems,  rtrim($division[0]));
				}
				foreach (structure::commonIdentificationString as $index1 => $value1) {
					$i = 0;
					$temp = true;
					foreach ($value1 as $value2) {
						if ($identificationItems[$i++] !== $value2) {
							$temp = false;
						}
					}
					if ($temp) {
						$identification = $index1;
						break;
					}
				}
			}
			return $identification;
		}

		private function isVerifyCountTotal(int $identification): bool {
			$isVerified = true;
			if ($this->struct) {
				if (count(structure::verifyCountTotal[$identification]) === count ($this->struct)) {
					$i = 0;
					foreach ($this->struct as $index1 => $value1) {
						$temp = 0;
						foreach ($value1 as $value2) {
							$temp += strlen($value2);
						}
						if (structure::verifyCountTotal[$identification][$i++] !== $temp) {
							$isVerified = false;
						}
					}
				}
				else {
					$isVerified = false;
				}
			}
			return $isVerified;
		}

		public function isStructure(): bool {
			if ($this->struct) {
				print "<br><br>";

				$identification = $this->findCommonIdentificationString();
				if ($identification !== null) {
					print "Identification: " . $identification . "<br>";
					if ($this->isVerifyCountTotal($identification)) {
						print "Verify count total: TRUE<br>";
					}
					else {
						print "Verify count total: FALSE<br>";
					}
				}

				print "<br><br>";
			}
			return false;
		}

		public function fromErrors(): ?array {
			return count($this->errors) > 0 ? $this->errors : null;
		}

		public function fromStruct(): ?array {
			return !$this->fromErrors() ? $this->struct : null;
		}
	}
?>