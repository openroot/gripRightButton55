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
				$this->struct[4][$index] = ($sections[4] === "___" || $sections[4] === "@@@") ? "" : trim($sections[4]);
			}
			$sum = 0;
			foreach ($this->struct as $value1) {
				foreach ($value1 as $value2) {
					$sum += strlen($value2);
				}
			}
			if ($sum === 0 || $sum === 49) {
				$this->struct = [];
			}
		}

		public function fromStruct(): array {
			return $this->struct;
		}
	}