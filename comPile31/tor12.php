<?php
	namespace comPile31\tor12;
?>

<?php
	class html {
		public function attribute(string $class = "", string $id = "", string $name = "", string $style = "", string $data = "", array $custom = []): string {
			$cascade = "";
			// TODO: Put coding.
			$cascade += " ";
			return $cascade;
		}

		public function pre(array $value, string $prefix = "", string $suffix = "", string $htmlAttribute = ""): void {
			if (count($value) > 0) {
				print "<pre" . $htmlAttribute . ">" . $prefix;
				print_r($value);
				print $suffix . "</pre>";
			}
		}

		public function table(array $value, array $headers = [], string $caption = "", string $htmlAttribute = ""): void {
			$cascade = "";
			if (!empty($caption)) {
				$cascade += "<caption>" . $caption . "</caption>";
			}
			if (count($headers) > 0) {
				foreach ($headers as $header) {
					$cascade += "<th>" . $header . "</th>";
				}
			}
			foreach ($value as $row) {
				$t1 = "";
				foreach ($value as $column) {
					$t1 += "<td>" . $column . "</td>";
				}
				if (!empty($t1)) {
					$cascade += "<tr>" . $t1 . "</tr>";
				}
			}
			if (!empty($cascade)) {
				$cascade = "<table" . $htmlAttribute . ">" . $cascade . "</table>";
			}
		}
	}

	class fault {
		private html $html;

		function __construct() {
			$this->html = new html();
		}

		public function show(array $value): void {
			$this->html->pre($value, "<hr>Error Information ", "<hr>");
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
		public static function error(): void {
			throw new \ErrorException("It is an error.");
		}
	}
?>