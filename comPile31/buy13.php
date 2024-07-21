<?php
	namespace comPile31\buy13;
?>

<?php
	enum adapterInputType: string {
		case string = "string";
		case array = "array";
	};

	enum adapterOutputType: string {
		case html = "html";
	};
	
	enum screenSocketType: string {
		case netbrowser = "netbrowser";
		case rest = "rest";
		case cli = "cli";
		case simulator = "simulator";
		case export = "export";
	}
?>

<?php
	class adapter {
		private mixed $content;
		private adapterInputType $inputType;

		function __construct(mixed $content, adapterInputType $inputType) {
			$this->content = $content;
			$this->inputType = $inputType;
		}

		private function convertToHTML(string $value): string {
			$value = mb_convert_encoding($value, "UTF-8", "HTML-ENTITIES");
			$value = htmlspecialchars($value);
			$value = str_replace(" ", "&nbsp;", $value);
			return $value;
		}

		public function convert(adapterOutputType $outputType): ?string {
			switch($outputType) {
				case adapterOutputType::html:
					switch($this->inputType) {
						case adapterInputType::string:
							return $this->convertToHTML($this->content);
							break;
						case adapterInputType::array:
							$t = "";
							foreach ($this->content as $row) {
								$t .= $this->convertToHTML($row) . "<br>";
							}
							return $t;
							break;
					}
					break;
			}
			return null;
		}
	}
?>

<?php
	class screen {
		private screenSocketType $socketType;

		function __construct(screenSocketType $socketType) {
			$this->socketType = $socketType;
		}
	}
?>