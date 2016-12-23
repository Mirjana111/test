<?php
$fpath = fopen('data.txt','r');
$fsize = filesize('data.txt');
$readed = fread($fpath,$fsize );
$file_array = explode(';',$readed);
echo'<pre>';
print_r($file_array);
echo'</pre>';
fclose($path);

?>