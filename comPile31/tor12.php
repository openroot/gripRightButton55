<?php
	namespace comPile31\tor12;
?>

<?php
	class indicate {
		public function htmlPre(array $value, string $prefix = "", string $suffix = "") {
			if (count($value) > 0) {
				print "<pre>" . $prefix;
				print_r($value);
				print $suffix . "</pre>";
			}
		}
	}

	class fault {
		private indicate $indicate;

		function __construct() {
			$this->indicate = new indicate();
		}

		public function show(array $value): void {
			$this->indicate->htmlPre($value, "-Error Information ", "<br>-");
		}
	}
?>

<?php
	class assembly {
		private ?array $struct = null;

		function __construct(array $divisions) {
			$this->struct = [];
			foreach ($divisions as $index => $division) {
				$sections = explode("::", $division);
				array_shift($sections);
				array_pop($sections);
				if (count($sections) !== 5) {
					$this->struct = null;
					break;
				}
				$formattedSections = [
					$sections[0],
					$sections[1],
					$sections[2],
					substr($sections[3], 0, 1),
					substr($sections[3], 1, strlen($sections[3]) - 2),
					substr($sections[3], -1),
					$sections[4]
				];
				array_push($this->struct, $formattedSections);
			}
			$this->rectifyStruct();
		}

		private function rectifyStruct() {
			if ($this->struct !== null) {
				$sum = 0;
				$rowNumber = 1;
				foreach ($this->struct as $value1) {
					$columnNumber = 1;
					foreach ($value1 as $value2) {
						if (!($columnNumber === 1 || $columnNumber === 4 || $columnNumber === 6)) {
							$sum += strlen(trim($value2));
						}
						$columnNumber++;
					}
					$rowNumber++;
				}
				$sum -= 6;
				if ($sum === 0) {
					$this->struct = null;
				}
			}
		}

		public function fromStruct(): ?array {
			return $this->struct;
		}
	}
?>

<?php
	class example {
		public static function anError(): void {
			throw new \ErrorException("It is an error.");
		}
	}
?>