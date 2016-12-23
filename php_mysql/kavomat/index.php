<?php

	require 'layout/header.php';
	require 'include/services/cookie-check.php';

?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dobrodošli</div>

                <div class="panel-body">
                    Početna stranica aplikacije Kavomat.
                </div>
            </div>
        </div>
    </div>
</div>

<?php

	require 'layout/footer.php';
	
?>


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Prijava korisnika</h4>
      		</div>
      		<form method="POST">
				<input type="hidden" name="csrf" id="csrf" value="<?php echo $_SESSION['csrf'];?>">
      			<div class="modal-body">
				  	<div class="form-group email">
				    	<label for="email">Email</label>
				    	<input type="email" class="form-control" name="email" id="email" placeholder="Email">
				  	</div>
				  	<div class="form-group pass">
				    	<label for="pass">Lozinka</label>
				    	<input type="password" class="form-control" name="pass" id="pass" placeholder="Lozinka">
				  	</div>
				  	<div class="checkbox">
				    	<label>
				      		<input type="checkbox" name="remember" id="remember"> Zapamti me
				    	</label>
				  	</div>
      			</div>
      		</form>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        			<button type="button" class="btn btn-primary" id="login">Prijavi se</button>
      			</div>
    	</div>
  	</div>
</div>