<?php
#reference
$v = 10;
$v1 = &$v;//v1 je referenca na v
$v = 15;
$v1.=5;

echo $v;
echo'<br>';
echo $v1;
//referenca je dozvolila da hvatam globalnu varijablu
$a = 5;
$b =10;
echo '<br>';
echo '$a=>'.$a.'<br>';
echo '$b=>'.$b.'<br>';

function zamjeni(&$x,&$y){ 
$t = $x;
$x = $y;
$y = $t;
}
zamjeni ($a, $b);
echo '$a=>'.$a.'<br>';
echo '$b=>'.$b.'<br>';



?>