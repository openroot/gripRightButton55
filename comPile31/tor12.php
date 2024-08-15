<?php
	namespace comPile31\tor12;
?>

<?php
	class trace {
		function __construct() { }

		public function report($errstr, $errno, $errfile, $errline): Throwable {
			throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
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
		}

		public function fromStruct(): ?array {
			return $this->struct;
		}
	}