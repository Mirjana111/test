<?php
$a = 22;
$b = 10;
$c = 15;
if(($b>$a && $b<$c)|($b<$a && $b>$c)){
	echo 'Varijabla B nalazi se između varijabli A i C';
}
else{
	echo 'Ne nalazi se !';
}
echo'<br>';
#& ili && Logički operator AND. 
#Kada želimo ispitati da li je zadovoljeno više uvjeta odjenom. 
//u ovom slučaju je dosta jedan and &
if($b>$a | $b<$c){
echo 'Varijabla b se nalazi između varijabli A i c';
} 
// Logički operator OR, jednostruki tube | 
//znači: ili prvi uvjet ili drugi uvjet, svejedno. 
//Ako je prvi zadovoljen neće pročitati drugi uvjet.
// Kad je dvostruki pročitati će i prvi i drugi uvjet.
//echo'<br>';
else{
	echo 'Ne nalazi se!';
}
//if empty($a)){}
//{}  ''
?>