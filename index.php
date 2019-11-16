<?php

class LongInt{
	public $numbers;
	public $length;
	
	public function __construct($string){
		$this->numbers=[];
		if($string!=''){
			for($i=0;$i<strlen($string);$i++){
				if(is_numeric($string[$i])){
					array_unshift($this->numbers,intval($string[$i]));
				}
			}
			$this->length = count($this->numbers);
		}
	}
	
	
	
	public static function Sum($string1,$string2){
		$longint1 = new LongInt($string1);
		$longint2 = new LongInt($string2);
		$new_length = max($longint1->length,$longint2->length)+1;
		//$longint1->addzero($new_length-$longint1->length);
		//$longint2->addzero($new_length-$longint2->length);
		$result='';
		$new_numbers=[];
		$ost=0;
		for($i=0;$i<$new_length;$i++){
			$s1=$i+1>$longint1->length ? 0 : $longint1->numbers[$i];
			$s2=$i+1>$longint2->length ? 0 : $longint2->numbers[$i];
			$s=$s1+$s2+$ost;
			$ost=0;			
			if($s>9){
				$s=$s % 10;
				$ost=1;
			}
			$result = $s.$result;
		}
		if($result[0]=='0')
			$result = substr($result, 1);
		return $result;
	}
	
}

//echo LongInt::Sum('1999999999999696666666666666669','101');
