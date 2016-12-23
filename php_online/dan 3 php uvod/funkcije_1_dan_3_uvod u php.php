<?php
	$a =10; 
	function ispis(){
		//$a =5;
		global $a;
		echo $a;
		}
	ispis();
	echo$a;
	
	function vrati(){
		$a = 5;
		$b = 10;
		$c = $a + $b;	
		return $c;
	}
echo '<br>';
echo vrati();
$c = vrati() + 5;
echo'<br>';
echo $c;
?>