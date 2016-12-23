<?php
	if(!isset($_SESSION['user_id'])){
		header('Location: ../../index.php');
	}
	try{
		$stmt = $conn->prepare('SELECT k.id,k.naziv,k.lokacija_id,CONCAT(RTRIM(l.ulica)," ",RTRIM(l.kc_broj),", ",RTRIM(l.mjesto)) as adresa FROM kavomati k, lokacije l WHERE k.lokacija_id=l.id ORDER BY naziv ASC');
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){
		if(DEBUG === true){
			header('Location:error/db_error.php?err_msg='.$e->getMessage());
		}
		else{
			header('Location:error/db_error.php?err_msg');
		}
	}
	try{
		$stmt_loc = $conn->prepare('SELECT * FROM lokacije ORDER BY mjesto ASC');
		$stmt_loc->execute();
		$data_loc = $stmt_loc->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){
		if(DEBUG === true){
			header('Location:error/db_error.php?err_msg='.$e->getMessage());
		}
		else{
			header('Location:error/db_error.php?err_msg');
		}
	}

?>
<div class="panel-heading clearfix">
	<h3 style="float:left; margin:0;">Kavomati</h3>
	<a href="" data-toggle="modal" data-target="#addModal" role="button" class="btn btn-primary btn-sm" style="float:right;">Dodaj kavomat</a>
</div>

	<table class="table table-hover">
		<tr>
			<th>ID</th>
			<th>Automat</th>
			<th>Lokacija</th>
			<th></th>
		</tr>
		<?php
			foreach($data as $value){
		?>
		<tr>
			<td><?php echo $value['id']?></td>
			<td>
				<a href="coffee-machines.php?id=<?php echo $value['id']?>&automat=<?php echo $value['naziv']?>">
					<?php echo $value['naziv']?>
				</a>
			</td>
			<td>
				<?php echo $value['adresa']?>
			</td>
			<td align="right">
				
				<a href="#" data-toggle="modal" data-target="#edit<?php echo $value['id']?>" role="button" class="btn btn-success btn-sm edit">
					<i class="fa fa-pencil-square-o"></i> Uredi
				</a>
				
				<div class="modal fade edit-u" id="edit<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="text-align:left;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Uredi <?php echo $value['naziv']?> kavomat</h4>
							</div>
							<form action="" method="POST">
								<div class="modal-body">
									<input type="hidden" name="id_automat" id="id_automat" value="<?php echo $value['id']?>">
									<div class="form-group name">
										<label for="naziv_kavomata">Naziv kavomata</label>
										<input type="text" class="form-control" name="naziv_kavomata" id="naziv_kavomata-u" placeholder="Ostavite prazno polje ako ne želite mjenjati naziv kavomata" value="">
									</div>
									<div class="form-group location">
										<label for="location">Lokacija</label>
										<select class="form-control" name="location" id="location-u">
											<?php
												foreach($data_loc as $value_loc){
													$address = $value_loc['ulica'].' '.$value_loc['kc_broj'].',
													'.$value_loc['mjesto'];
													if($value['lokacija_id'] == $value_loc['id']){
											?>
														<option value="<?php echo $value_loc['id'];?>" selected><?php echo $address;?></option>
												<?php
													}
													else{
												?>
														<option value="<?php echo $value_loc['id'];?>"><?php echo $address;?></option>
											<?php
													}
												}
											?>	
										</select>
									</div>
								</div>
							</form>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
									<button type="button" class="btn btn-primary" id="edit">Spremi</button>
								</div>
						</div>
					</div>
				</div>
				
				<a href="#" data-toggle="modal" data-target="#delete<?php echo $value['id']?>" role="button" class="btn btn-danger btn-sm">
					<i class="fa fa-trash-o"></i> Izbriši
				</a>

					<div class="modal fade" id="delete<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content" style="text-align:center;">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color:#a80b27;text-transform:uppercase;font-size:1.6rem;">upozorenje	!</h2>
								</div>
								<div class="modal-body">
									<h5>Da li si siguran da želiš obrisati <b><?php echo $value['naziv']?></b> kavomat?</h5>
								</div>
								<div class="modal-footer">
									<a href="include/coffee-machines/delete.php?id=<?php echo $value['id']?>" role="button" class="btn btn-danger">
										Da, siguran sam!
									</a>
									<button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
								</div>
							</div>
						</div>
					</div>

			</td>
		</tr>
		<?php
			}
		?>
	</table>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj novi kavomat</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group name">
                        <label for="naziv_kavomata">Naziv kavomata</label>
                        <input type="text" class="form-control" name="naziv_kavomata" id="naziv_kavomata" placeholder="Naziv kavomata">
                    </div>
                    <div class="form-group location">
                        <label for="location">Lokacija</label>
                        <select class="form-control" name="location" id="location">

                            <option value="none">Odaberite lokaciju</option>
							<?php
								
								foreach($data_loc as $value_loc){
							?>
								<option value="<?php echo $value_loc['id']?>">
								<?php echo $value_loc['ulica'].' '.$value_loc['kc_broj'].', '.$value_loc['mjesto']?></option>
							<?php
								}
							?>  
                        </select>
                    </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary" id="add">Dodaj</button>
                </div>
        </div>
    </div>
</div>




