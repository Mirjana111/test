<?php
function autor ($autor){
	$autor_array = explode(',',$autor);
	$ime = $autor_array[1];
	$prezime = $autor_array[0];
	$prezime_ln = strlen($prezime);
	$ime_slovo = strtoupper (substr ($ime,0,1));
	$prezime_slovo = strtoupper (substr ($prezime,0,1));
	$prezime = $prezime_slovo.strtolower(substr($prezime,1,50));
	return $ime_slovo.'.'.$prezime;
}
echo autor('peric,pero');
echo '<br>';
echo autor('markic,marko');

#P. Peric[]
#M. Markic





?>