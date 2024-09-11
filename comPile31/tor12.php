<?php
	namespace comPile31\tor12;

	require_once("tor12/c.ore/kernel27.php");

	use comPile31\tor12\kernel27 as kernel27;
?>

<?php
	class html {
		public function attribute(string $class = "", string $id = "", string $name = "", string $title = "", string $style = "", array $custom = []): ?string {
			$cascade = null;
			if (!empty($class)) {
				$cascade .= ' class="' . $class . '"';
			}
			if (!empty($id)) {
				$cascade .= ' id="' . $id . '"';
			}
			if (!empty($name)) {
				$cascade .= ' name="' . $name . '"';
			}
			if (!empty($title)) {
				$cascade .= ' title="' . $title . '"';
			}
			if (!empty($style)) {
				$cascade .= ' style="' . $style . '"';
			}
			if (count($custom) > 0) {
				$t1 = "";
				foreach ($custom as $index => $value) {
					if (!empty($index) && !empty($value)) {
						$t1 .= ' ' . $index . '="' . $value . '"';
					}
				}
				if (!empty($t1)) {
					$cascade .= $t1;
				}
			}
			return $cascade;
		}

		public function segment(string $value, string $element = "span", ?string $htmlAttribute = null): ?string {
			$cascade = null;
			if (!empty($element)) {
				$cascade = "<" . $element . $htmlAttribute . ">" . $value . "</" . $element . ">";
			}
			return $cascade;
		}

		public function head(string $title, ?string $htmlAttribute = null): ?string {
			$cascade = null;
			$cascade = "<head" . $htmlAttribute . ">";
			$cascade .= "<title>" . $title . "</title>";
			$cascade .= '<meta charset="utf-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<link rel="stylesheet" href="../../../interNet29/plugIn128/n.umber/style.css">
							<script src="../../../interNet29/plugIn128/n.umber/script.js"></script>
						</head>';
			return $cascade;
		}

		public function pre(array $value, string $prefix = "", string $suffix = "", ?string $htmlAttribute = null): ?string {
			$cascade = null;
			if (count($value) > 0) {
				$cascade .= "<pre" . $htmlAttribute . ">" . $prefix . print_r($value, true) . $suffix . "</pre>";
			}
			return $cascade;
		}

		public function table(array $value, array $headers = [], string $caption = "", ?string $htmlAttribute = null): ?string {
			$cascade = null;
			if (!empty($caption)) {
				$cascade .= "<caption>" . $caption . "</caption>";
			}
			if (count($headers) > 0) {
				$thead = "";
				foreach ($headers as $header) {
					$thead .= "<th>" . $header . "</th>";
				}
				if (!empty($thead)) {
					$cascade .= "<thead>" . $thead . "</thead>";
				}
			}
			$tbody = "";
			foreach ($value as $row) {
				$t1 = "";
				foreach ($row as $column) {
					$t1 .= "<td>" . $column . "</td>";
				}
				if (!empty($t1)) {
					$tbody .= "<tr>" . $t1 . "</tr>";
				}
			}
			if (!empty($tbody)) {
				$cascade .= "<tbody>" . $tbody . "</tbody>";
			}
			if (!empty($cascade)) {
				$cascade = "<table" . $htmlAttribute . ">" . $cascade . "</table>";
			}
			return $cascade;
		}
	}

	class fault {
		private kernel27\display $display;
		private html $html;

		function __construct() {
			$this->display = new kernel27\display();
			$this->html = new html();
		}

		public function show(array $value): void {
			date_default_timezone_set("Asia/Kolkata");
			$date = date("Y/m/d h:i:s a", time());
			$this->display->show($this->html->pre($value, "Error Information ", $date));
		}
	}

	class example {
		private kernel27\display $display;
		private html $html;

		function __construct() {
			$this->display = new kernel27\display();
			$this->html = new html();
		}

		public function plainText(): void {
			$this->display->show("gripRightButton55");
		}

		public function htmlSegment(): void {
			$this->display->show($this->html->segment(
				"Website's goal is to provide " . $this->html->segment("Synchronized Active Platform", "q") . ".",
				"p"
			));
		}

		public function htmlPre(): void {
			$this->display->show($this->html->pre(["A quick note.", "Question" => "Answer"], "Cap ", "Box"));
		}

		public function htmlTable(): void {
			$this->display->show($this->html->table([
					[1, "D", "Tapader", "dev.openroot@gmail.com", "India", "Computer Researcher"]
				],
				["o", "First Name", "Last Name", "Email Address", "Location", "Profession"],
				"Profiles",
				$this->html->attribute("animated", "anExampleTable", "exampleTable", "A list of profiles.", "border: 3px dotted #FFFFFF;",
					["data-randomNumber" => "876234", "dir" => "rtl", "accesskey" => "t"]
				)
			));
		}

		public function error(): void {
			throw new \ErrorException("It is an error.");
		}
	}

	class frame {
		private kernel27\display $display;
		private html $html;
		
		function __construct() {
			$this->display = new kernel27\display();
			$this->html = new html();
		}

		public function head(): void {
			$this->display->show($this->html->head("gripRightButton55"));
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