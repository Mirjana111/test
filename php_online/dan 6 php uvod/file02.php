<?php
$fp = fopen('data.txt','a');
fwrite($fp,";\nKoko Kokić;");
fclose($fp);
?>