<?php

	$_SESSION['csrf'] = substr(md5(uniqid(rand(),1)),0,32);

?>