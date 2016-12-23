<?php

	if(!isset($_GET['err_msg'])){
		header('Location:../index.php');
	}
	require '../config/db-config.php';
	require '../layout/error_header.php';

?>
<div class="container spark-screen" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
					<?php
						if(DEBUG === true){
					?>
                    <h2 style="margin:0;">Greška prilikom spajanja na bazu podataka!</h2>
					<?php
						}
						if(DEBUG === false){
					?>
					<h2 style="margin:0;">Došlo je do pogreške!</h2>
					<?php
						}
					?>
                </div>
				<?php
					if(DEBUG === true){
				?>
                <div class="panel-body">
                    GREŠKA:<br>
					<?php
						echo $_GET['err_msg'];
					?>
                </div>
				<?php
					}
				?>
            </div>
        </div>
    </div>
</div>
<?php
	require '../layout/footer.php';
?>
