<form method="POST" enctype="multipart/form-data">
	<h3>Odaberite datoteku</h3>
	<input type="file" name="datoteka">
	<br><br> 
	<input type="submit" name="posalji" value="Posalji">
	
</form>
<?php
echo '<pre>';
print_r($_FILES);
echo '</pre>';
?>










