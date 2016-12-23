<?php
include 'simple_html_dom.php';
$readed = file_get_html('http://www.algebra.hr');

var_dump($readed);
foreach ($readed->find('img')as $image){
	echo'<img src="'.$image->src.'"width=200px>';
	
}

?>