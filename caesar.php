<?php

/**
 * 
 */
 class Caesar
 {
 	
 	
 
	private $vocal = array(
			'A' => 'O', 
			'O' => 'E', 
			'E' => 'I', 
			'I' => 'U', 
			'U' => 'A', 
			'a' => 'o', 
			'o' => 'e', 
			'e' => 'i', 
			'i' => 'u', 
			'u' => 'a' 
		);
	private $vocal_dec = array(
			'O' => 'A', 
			'E' => 'O', 
			'I' => 'E', 
			'U' => 'I', 
			'A' => 'U', 
			'o' => 'a', 
			'e' => 'o', 
			'i' => 'e', 
			'u' => 'i', 
			'a' => 'u' 
		);
	private $consonant = array(
			'B' => 'D', 
			'D' => 'J', 
			'J' => 'M', 
			'M' => 'P', 
			'P' => 'R', 
			'R' => 'L', 
			'L' => 'S', 
			'S' => 'C', 
			'C' => 'F', 
			'F' => 'H', 
			'H' => 'K', 
			'K' => 'T', 
			'T' => 'W', 
			'W' => 'B',
			'b' => 'd',
			'd' => 'j',
			'j' => 'm',
			'm' => 'p',
			'p' => 'r',
			'r' => 'l',
			'l' => 's',
			's' => 'c',
			'c' => 'f',
			'f' => 'h',
			'h' => 'k',
			'k' => 't',
			't' => 'w',
			'w' => 'b'
		);
	private $consonant_dec = array(
			'D' => 'B', 
			'J' => 'D', 
			'M' => 'J', 
			'P' => 'M', 
			'R' => 'P', 
			'L' => 'R', 
			'S' => 'L', 
			'C' => 'S', 
			'F' => 'C', 
			'H' => 'F', 
			'K' => 'H', 
			'T' => 'K', 
			'W' => 'T',
			'B' => 'W', 
			'd' => 'b',
			'j' => 'd',
			'm' => 'j',
			'p' => 'm',
			'r' => 'p',
			'l' => 'r',
			's' => 'l',
			'c' => 's',
			'f' => 'c',
			'h' => 'f',
			'k' => 'h',
			't' => 'k',
			'w' => 't',
			'b' => 'w'
		);

	

	private function encryptChar($plain){
		if (in_array($plain, $this->consonant)) {
			return $this->consonant[$plain];
		} else if(in_array($plain, $this->vocal)){
			return $this->vocal[$plain];
		} else {
			return $plain;
		}
	}

	private function decryptChar($plain){
		if (in_array($plain, $this->consonant_dec)) {
			return $this->consonant_dec[$plain];
		} else if(in_array($plain, $this->vocal_dec)){
			return $this->vocal_dec[$plain];
		} else {
			return $plain;
		}
	}

	function encryptString($plain, $key){
		$plain1 = str_split($plain);
		$cipher = array();

		$i = 0;
		foreach ($plain1 as $p) {
			$cipher[$i] = $this->encryptChar($p);
			$i++;
		}

		/*echo implode("",$cipher);
		echo "<br>";*/

		for ($i=0; $i < $key-1; $i++) { 
			// $a = $cipher;
			// $cipher[$i] = $this->encryptChar($a);
			$j = 0;
			foreach ($cipher as $p) {
				$cipher[$j] = $this->encryptChar($p);
				$j++;
			}
			/*echo implode("",$cipher);
			echo "<br>";*/
		}

		return implode("",$cipher);
	}

	function decryptString($plain, $key){
		$plain1 = str_split($plain);
		$cipher = array();

		$i = 0;
		foreach ($plain1 as $p) {
			$cipher[$i] = $this->decryptChar($p);
			$i++;
		}

		/*echo implode("",$cipher);
		echo "<br>";*/

		for ($i=0; $i < $key-1; $i++) { 
			// $a = $cipher;
			// $cipher[$i] = $this->encryptChar($a);
			$j = 0;
			foreach ($cipher as $p) {
				$cipher[$j] = $this->decryptChar($p);
				$j++;
			}
			/*echo implode("",$cipher);
			echo "<br>";*/
		}

		return implode("",$cipher);
	}

	function encrypt($plain, $key=array()){
		$plain1 = explode(" ", $plain);
		$new = array();

		$i=0;
		foreach ($plain1 as $value) {
			$new[$i] = $this->encryptString($value, $key[$i%3]);
			$i++;
		}

		return implode(" ",$new);
	}

	function decrypt($plain, $key=array()){
		$plain1 = explode(" ", $plain);
		$new = array();

		$i=0;
		foreach ($plain1 as $value) {
			$new[$i] = $this->decryptString($value, $key[$i%3]);
			$i++;
		}

		return implode(" ",$new);
	}


}
	/*$caesar = new Caesar();

	echo $caesar->decrypt("Cutud Lamang", array(5,5,5));*/
	
