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
			foreach ($divisions as $index => $value) {

			}
		}
	}