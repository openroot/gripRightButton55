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
			1 => [
				"o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13",
				"14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "t", "u", ".."
			],
			2 => [
				"++", "=v", "=d", "=w", "=a", "=s", "=p", "=i", "=g", "=n", "=c", "=f", "=r", "=h", "=y",
				"?p", "=3", "=2", "=1", "?m", "?d", "?a", "?s", "?r", "?e", "=b", "=t", "=o", "=9", "=k", "--"
			],
			3 => ["o", "x", "t", "u", ".."],
			4 => ["o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "t", "u", ".."],
			5 => ["o", "x", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "t", "u", ".."]
		];
		private const verifyCountTotal = [ // Verifying
			1 => [
				119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119,
				119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119
			],
			2 => [
				119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119,
				119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119, 116, 116, 119
			],
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
			"alpha" => [
				"a" => 3, "b" => 2, "c" => 3, "d" => 3, "e" => 3,
				"f" => 5, "g" => 3, "h" => 4, "i" => 3, "j" => 5,
				"k" => 5, "l" => 7, "m" => 5, "n" => 5, "o" => 5,
				"p" => 5, "q" => 4, "r" => 4, "s" => 5, "t" => 3,
				"u" => 5, "v" => 2, "w" => 7, "x" => 1, "y" => 6,
				"z" => 6
			],
			"gamma" => [
				"save13.php" => 1, "buy13.php" => 2, "date12.php" => 3, "time14.php" => 4, "mint16.php" => 5,
				"race13.php" => 6, "rush18.php" => 7, "roof19.php" => 8, "expo14.php" => 9, "clue18.php" => 10,
				"fact14.php" => 11, "back13.php" => 12, "air10.php" => 13, "miss18.php" => 14, "start18.php" => 15,
				"cold18.php" => 16, "zero18.php" => 17, "hero16.php" => 18, "err11.php" => 19, "gap11.php" => 20,
				"pass18.php" => 21, "low19.php" => 22, "tick14.php" => 23, "pure17.php" => 24, "rep12.php" => 25,
				"chip15.php" => 26, "new15.php" => 27, "pin13.php" => 28, "rate13.php" => 29, "move15.php" => 30,
				"tor12.php" => 31
			],
			"beta" => [
				"++" => 1, "%u" => 2, "&d" => 3, "&w" => 4, "&a" => 5,
				"&s" => 6, "&e" => 7, "&q" => 8, "/g" => 9, "/n" => 10,
				"/c" => 11, "!f" => 12, "!r" => 13, "!h" => 14, "!y" => 15,
				"?z" => 16, "=|" => 17, "==" => 18, "=#" => 19, "?x" => 20,
				"?d" => 21, "?a" => 22, "?s" => 23, "?r" => 24, "?e" => 25,
				";l" => 26, ";i" => 27, ";p" => 28, "%j" => 29, "%k" => 30,
				"--" => 31
			],
			"delta" => [
				"a.mount" => 1, "fs.arcade" => 2, "l.apps" => 3, "axe.store" => 4, "meet.them" => 5,
				"re.press" => 6, "oi.vice" => 7, "mass.vis" => 8, "de.min" => 9, "row.s" => 10,
				"in.tense" => 11, "be.lows" => 12, "b.ore" => 13, "in.stead" => 14, "con.next" => 15,
				"quo.star" => 16, "pro.via" => 17, "not.e" => 18, "numb.or" => 19, "hug.e" => 20,
				"spec.al" => 21, "blue.far" => 22, "co.unite" => 23, "same.sad" => 24, "re.cord" => 25,
				"corner.s" => 26, "m.no" => 27, "lid.near" => 28, "are.range" => 29, "add.resin" => 30,
				"c.ore" => 31
			],
			"theta" => [
				"en_uk" => "*", "en_us" => "*",
				"en_in" => "*", "en_nz" => ":"
			],
			1 => [
				1 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				2 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				3 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				4 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				5 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				6 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				7 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				8 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				9 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				10 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				11 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				12 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				13 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				14 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				15 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				16 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				17 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				18 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				19 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				20 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				21 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				22 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				23 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				24 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				25 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				26 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				27 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				28 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				29 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				30 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				31 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
			],
			2 => [
				1 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				2 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				3 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				4 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				5 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				6 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				7 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				8 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				9 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				10 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				11 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				12 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				13 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				14 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				15 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				16 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				17 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				18 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				19 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				20 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				21 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				22 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				23 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				24 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				25 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				26 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				27 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				28 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				29 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				30 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				31 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
			],
			3 => [
				1 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				2 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				3 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				4 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				5 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
			],
			4 => [
				1 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				2 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				3 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				4 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				5 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				6 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				7 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				8 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				9 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				10 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				11 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				12 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				13 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				14 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
			],
			5 => [
				1 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				2 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				3 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				4 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				5 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				6 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				7 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				8 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				9 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				10 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				11 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				12 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				13 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				14 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				15 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
				16 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				17 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"]],
				18 => [1 => ["alpha", "gamma", "delta", "theta"], 2 => ["alpha", "gamma", "delta", "theta"], 3 => ["alpha", "gamma", "delta", "theta"], 4 => ["alpha", "gamma", "beta", "delta", "theta"], 5 => ["gamma", "delta", "theta"]],
			]
		];
		private array $errors = [];
		private array $struct = [];
		private ?int $identification = null;

		function __construct(array $divisions) {
			$this->one($divisions);
			/*$divisionsCount = count($divisions);
			if (array_key_exists($divisionsCount, structure::acceptableDivisionMultiplier)) {
				foreach ($divisions as $division) {
					$sections = explode("::", $division);
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
			}*/
		}

		private function one(array $divisions) {
			$tempArr = [];
			foreach ($divisions as $index1 => $value1) {
				array_push($tempArr, $this->strposAll($value1, "::"));
			}
			print "<pre>"; print_r($tempArr); print "</pre>";
		}

		private function strposAll($haystack, $needle) {
			$offset = 0;
			$allpos = array();
			while (($pos = strpos($haystack, $needle, $offset)) !== false) {
				$offset   = $pos + 1;
				$allpos[] = $pos;
			}
			return $allpos;
		}

		private function createDummyString(string $content, int $count): string {
			// echo str_repeat("-=", 10);
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

		private function isVerifyCountTotal(): bool {
			$isVerified = true;
			if ($this->struct && $this->identification) {
				if (count(structure::verifyCountTotal[$this->identification]) === count ($this->struct)) {
					$i = 0;
					foreach ($this->struct as $index1 => $value1) {
						$temp = 0;
						foreach ($value1 as $value2) {
							$temp += strlen($value2);
						}
						if (structure::verifyCountTotal[$this->identification][$i++] !== $temp) {
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

		private function toStruct() {
			if ($this->struct && $this->identification) {
				$structTemp = [];
				foreach ($this->struct as $index1 => $value1) {
					$divisions = [];
					foreach ($value1 as $index2 => $value2) {
						$sections = [];
						$temp = 0;
						foreach (structure::allowedLengthUnit[$this->identification][$index1 + 1][$index2 + 1] as $index3 => $value3) {
							array_push($sections, substr($value2, $temp, $value3));
							$temp += $value3;
						}
						array_push($divisions, $sections);
					}
					array_push($structTemp, $divisions);
				}
				$this->struct = $structTemp;
			}
		}

		public function isStructure(): bool {
			if ($this->struct) {
				print "<br><br>";

				$this->identification = $this->findCommonIdentificationString();
				if ($this->identification) {
					print "Identification: " . $this->identification . "<br>";
					if ($this->isVerifyCountTotal()) {
						print "Verify count total: TRUE<br>";
						$this->toStruct();
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