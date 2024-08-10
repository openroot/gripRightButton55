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
		private array $struct = [];

		function __construct(array $divisions) {
			$valid = true;
			foreach ($divisions as $index => $division) {
				$sections = explode("::", $division);
				array_shift($sections);
				array_pop($sections);
				if (count($sections) !== 5) {
					$this->struct = [];
					break;
				}
				$this->struct[0][$index] = trim($sections[0]);
				$this->struct[1][$index] = trim($sections[1]);
				$this->struct[2][$index] = trim($sections[2]);
				$this->struct[3][$index] = trim(ltrim(rtrim($sections[3], "#"), "="));
				$this->struct[4][$index] = trim($sections[4]);
			}
		}

		public function fromStruct(): array {
			return $this->struct;
		}
	}