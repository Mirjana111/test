<?php

	require 'layout/header.php';

?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
				<?php
				if(isset($_SESSION['user_id'])){
					if(isset($_GET['id'])){
						require 'include/coffee-machines/show.php';
					}
					else{
						require 'include/coffee-machines/index.php';
					}
				}
				else{
					header('Location: index.php');
				}
				?>
            </div>
        </div>
    </div>
</div>
<?php

	require 'layout/footer.php';
	
?>

