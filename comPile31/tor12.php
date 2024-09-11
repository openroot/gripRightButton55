<?php
	namespace comPile31\tor12;

	require_once("tor12/c.ore/kernel27.php");

	use comPile31\tor12\kernel27 as kernel27;
?>

<?php
	class material {
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

		public function top(string $language, ?string $value = null, ?string $attribute = null): ?string {
			$cascade = null;
			$cascade = "<!DOCTYPE html>";
			$cascade .= '<html' . $attribute . ' lang="' . $language . '">';
			$cascade .= $value;
			return $cascade;
		}

		public function bottom(?string $value = null): ?string {
			$cascade = null;
			$cascade = $value;
			$cascade .= "</html>";
			return $cascade;
		}

		public function head(string $title, array $metas = [], array $links = [], array $scripts = [], ?string $attribute = null): ?string {
			$cascade = null;
			$cascade = "<head" . $attribute . ">";
			$cascade .= "<title>" . $title . "</title>";
			if (count($metas) > 0) {
				foreach ($metas as $meta) {
					$cascade .= "<meta " . $meta . ">";
				}
			}
			if (count($links) > 0) {
				foreach ($links as $link) {
					$cascade .= "<link " . $link . ">";
				}
			}
			if (count($scripts) > 0) {
				foreach ($scripts as $script) {
					$cascade .= "<script " . $script . "></script>";
				}
			}
			$cascade .= "</head>";
			return $cascade;
		}

		public function body(array $values, ?string $attribute = null): ?string {
			$cascade = null;
			$cascade = "<body" .$attribute . ">";
			if (count($values) > 0) {
				foreach($values as $key => $value) {
					if ($key === "spectrum" && $value === true) {
						$cascade .= '
							<div id="spectrum"></div>
							<div class="dustParticle">
								<div>
									<div class="starSecond"></div>
									<div class="starThird"></div>
									<div class="starFourth"></div>
									<div class="starFifth"></div>
								</div>
							</div>
						';
					}
					if ($key === "frame" && count($value) > 0) {
						$cascade .= '<div class="frame">';
						foreach ($value as $val) {
							$cascade .= $val;
						}
						$cascade .= "</div>";
					}
					if ($key === "menu" && $value === true) {
						$cascade .= '
							<div id="menu">
								<div>
									<table>
										<caption>
											<div>
												gripRightButton55
											</div>
											<div>
												Leverage Any Complications
											</div>
										</caption>
										<tr>
											<td>A</td>
											<td>B</td>
											<td>C</td>
											<td>D</td>
											<td>E</td>
										</tr>
										<tr>
											<td>F</td>
											<td>G</td>
											<td>H</td>
											<td>I</td>
											<td>J</td>
										</tr>
										<tr>
											<td>K</td>
											<td>L</td>
											<td>M</td>
											<td>N</td>
											<td>O</td>
										</tr>
										<tr>
											<td>P</td>
											<td>Q</td>
											<td>R</td>
											<td>S</td>
											<td>T</td>
										</tr>
										<tr>
											<td>U</td>
											<td>V</td>
											<td>W</td>
											<td>X</td>
											<td>Y</td>
										</tr>
										<tr>
											<td>Z</td>
											<td>_</td>
											<td>@</td>
											<td>&lt;</td>
											<td>&gt;</td>
										</tr>
									</table>
								</div>
								<div>
									&copy; D Tapader 
									<a href="https://github.com/openroot" target="_blank">g</a> 
									<a href="https://www.facebook.com/larrypage34" target="_blank">f</a>
								</div>
							</div>
						';
					}
				}
			}
			$cascade .= "</body>";
			return $cascade;
		}

		public function segment(string $value, string $element = "span", ?string $attribute = null): ?string {
			$cascade = null;
			if (!empty($element)) {
				$cascade = "<" . $element . $attribute . ">" . $value . "</" . $element . ">";
			}
			return $cascade;
		}

		public function pre(array $value, string $prefix = "", string $suffix = "", ?string $attribute = null): ?string {
			$cascade = null;
			if (count($value) > 0) {
				$cascade .= "<pre" . $attribute . ">" . $prefix . print_r($value, true) . $suffix . "</pre>";
			}
			return $cascade;
		}

		public function table(array $value, array $headers = [], string $caption = "", ?string $attribute = null): ?string {
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
				$cascade = "<table" . $attribute . ">" . $cascade . "</table>";
			}
			return $cascade;
		}
	}

	class fault {
		private kernel27\display $display;
		private material $material;

		function __construct() {
			$this->display = new kernel27\display();
			$this->material = new material();
		}

		public function show(array $value): void {
			date_default_timezone_set("Asia/Kolkata");
			$date = date("Y/m/d h:i:s a", time());
			$this->display->show($this->material->pre($value, "Error Information ", $date));
		}
	}

	class example {
		private material $material;

		function __construct() {
			$this->material = new material();
		}

		public function plainText(): string {
			return "gripRightButton55";
		}

		public function materialSegment(): string {
			return $this->material->segment(
				"Website's goal is to provide " . $this->material->segment("Synchronized Active Platform", "q") . ".",
				"p"
			);
		}

		public function materialPre(): string {
			return $this->material->pre(["A quick note.", "Question" => "Answer"], "Cap ", "Box");
		}

		public function materialTable(): string {
			return $this->material->table([
					[1, "D", "Tapader", "dev.openroot@gmail.com", "India", "Computer Researcher"]
				],
				["o", "First Name", "Last Name", "Email Address", "Location", "Profession"],
				"Profiles",
				$this->material->attribute("animated", "anExampleTable", "exampleTable", "A list of profiles.", "border: 3px dotted #FFFFFF;",
					["data-randomNumber" => "876234", "dir" => "rtl", "accesskey" => "t"]
				)
			);
		}

		public function error(): void {
			throw new \ErrorException("It is an error.");
		}
	}

	class panel {
		private kernel27\display $display;
		private material $material;

		function __construct() {
			$this->display = new kernel27\display();
			$this->material = new material();
		}

		public function top(string $language = "en", ?string $value = null): void {
			$this->display->show($this->material->top($language, $value));
		}

		public function bottom(?string $value): void {
			$this->display->show($this->material->bottom($value));
		}

		public function head(): void {
			$this->display->show($this->material->head(
				"gripRightButton55",
				['charset="utf-8"', 'name="viewport" content="width=device-width, initial-scale=1"'],
				['rel="stylesheet" href="../../../interNet29/plugIn128/n.umber/style.css"'],
				['src="../../../interNet29/plugIn128/n.umber/script.js"']
			));
		}

		public function body(array $values): void {
			$this->display->show($this->material->body($values));
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