<?php

$c = array();
$c ['korisnici']= 'Godište';
$c[0]['ime'] = 'Ana';
$c[0]['prezime'] = 'Anić';
$c[0]['spol'] = 'Ž';
$c[0]['godina'] = '1980';

$c ['korisnici']= 'Godište';
$c[1]['ime'] = 'Pero';
$c[1]['prezime'] = 'Perić';
$c[1]['spol'] = 'M';
$c[1]['godina'] = '1980';
//da nema ključa [0] i [1] prikazali bi se samo podaci od Pere Perića i pregazuilo bi prethodne podatke 
echo '<pre>';
print_r($c);
echo '</pre>';

echo '<table border=1 width=600 align=center>';
echo'<tr>';
echo'<td align=center colspan=4>';
echo'<h2>'.$c['korisnici'].'</h2>';
echo'</td>';
echo'</tr>';

echo'<tr>';//početak retka
echo'<td align=center> ';//prva ćelija
echo'<h3>Ime</h3>';
echo'</td>';
//druga ćelija
echo'<td align=center> ';//druga ćelija
echo'<h3>Prezime</h3>';
echo'</td>';

//druga ćelija
echo'<td align=center> ';//treća ćelija
echo'<h3>Spol</h3>';
echo'</td>';
//druga ćelija
echo'<td align=center> ';//prva ćelija
echo'<h3>Godina</h3>';
echo'</td>';
echo'</tr>';

foreach($c as $key=>$value){
	if(is_array($value)){
echo'<tr>';//početak retka
echo'<td align=center> ';//prva ćelija
echo'<h3>'.$value['ime'].'</h3>';
echo'</td>';
//druga ćelija
echo'<td align=center>';//druga ćelija
echo'<h3>'.$value['prezime'].'</h3>';
echo'</td>';

//druga ćelija
echo'<td align=center> ';//treća ćelija
echo'<h3>'.$value['spol'].'</h3>';
echo'</td>';
//druga ćelija
echo'<td align=center> ';//prva ćelija
echo'<h3>'.$value['godina'].'</h3>';
echo'</td>';
echo'</tr>';


	}
}
//echo'<table>';



?>