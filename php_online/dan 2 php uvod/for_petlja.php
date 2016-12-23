<?php
	$a = array();
	$a[] ='Ovo je prvi element'; 
	$a[] ='Ovo je drugi element'; 
	$a[] = 24;
	$a[] = true;
	$a[] = 3.14;
	
	echo '<pre>';
	print_r($a);
	echo '</pre>';
	//Pošto je count ugrađena php funkcija,i=1, jedan 
// je manje od pet, povećaj i za jedan i ispiši,
//toćebiti jedan i tako dok god je uvjet zadovoljen, zanči klju 0 
// je sada dobio broj 1, i tako dalje
//kad je došao do pet, pet nije više manje od pet, uvjet nije 
//dovoljen i prestaje se izvršavati petlja
	
	echo 'Vrijednost elementa s indeksom 2 je: '$a[2].'<br>';
	echo 'Polje se sastoji od :'.count($a). 'elemenata<br>';
	$b=count($a);
	for($i =0;$i <$b;$i++){//ko želimo svaki drugi napisati ćemo$i+=2
		if (sset($a[$i])){
		
		echo $i.'=>'.$a[$i].'<br>';
		}
		else{ 
		echo 'Nepostojeći ključ';
		}
		//sa countom se jednom ulazi u for petlju i štedi se vrijeme i resursi
		//ovo ide kad su ključevi u nekom redu inače ne funkcionira tj ako znamo
	//indekse, ako su indeksi string ili asocijatvni ne ide
}
	
	//[]{}[ ]
//''
?>