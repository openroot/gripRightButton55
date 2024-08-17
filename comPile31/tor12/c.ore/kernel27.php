<?php
	namespace comPile31\tor12\kernel27;

	class display {
		public function show(?string $value) {
			if (!empty($value)) {
				print $value;
			}
		}
	}
?>