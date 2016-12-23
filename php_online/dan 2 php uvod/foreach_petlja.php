<?php
$a[10] ='Ovo je prvi element';
$a[20] ='Ovo je drug element';
$a[30] =24;
$a[40] =true;
$a[50] =3.14;

echo '<pre>';
print_r($a);
echo '</pre>';
foreach($a as $key=>$value){
echo $key.'=>'.$value.'<br>';
}


?>