<?php

	if(!isset($_SESSION['user_id'])){
		header('Location: ../../index.php');
	}
	
	if(isset($_GET['id'])){
		$id = _e($_GET['id']);
		try{
			$stmt = $conn->prepare('SELECT k.id,k.naziv,k.cijena FROM kave k, kave_u_kavomatima kuk WHERE kuk.kavomat_id = :id AND kuk.kava_id = k.id');
			$stmt->bindParam(':id',$id);
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

?>
<div class="panel-heading clearfix">
	<h3 style="float:left; margin:0;">Kave u kavomatu <?php isset($_GET['automat']) ? print _e($_GET['automat']) : '';?></h3>
	<a href="coffee-machines.php" role="button" class="btn btn-default btn-sm" style="float:right;">
		<i class="fa fa-chevron-left"></i> Nazad
	</a>
</div>
	

		<table class="table table-hover">
			<tr>
				<th>
					<a href="#" id="check">Označi sve</a>
					<a href="#" id="uncheck" style="display:none;">Odznači sve</a>
				</th>
				<th>ID</th>
				<th>Kava</th>
				<th>Cijena</th>
				<th></th>
			</tr>
			<?php
			
				foreach($data as $value){
			
			?>
			<tr>
				<td>
					<input type="checkbox" name="delete-box" class="delete-box" value="<?php echo $value['id'];?>">
				</td>
				<td><?php echo $value['id'];?></td>
				<td><?php echo $value['naziv'];?></td>
				<td><?php echo $value['cijena'];?> kn</td>
				<td align="right">
					<a href="#" data-toggle="modal" data-target="#delete<?php echo $value['id'];?>" role="button" class="btn btn-danger btn-sm">
						<i class="fa fa-trash-o"></i> Izbriši
					</a>
					
					<div class="modal fade" id="delete<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content" style="text-align:center;">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color:#a80b27;text-transform:uppercase;font-size:1.6rem;">upozorenje	!</h2>
								</div>
								<div class="modal-body">
									<h5>Da li si siguran da želiš obrisati <b><?php echo $value['naziv'];?></b> iz kavomata?</h5>
								</div>
								<div class="modal-footer">
									<a href="include/coffee-machines/delete-coffee.php?kava_id=<?php echo $value['id'];?>&automat_id=<?php echo $id;?>&automat=<?php isset($_GET['automat']) ? print _e($_GET['automat']) : '';?>" role="button" class="btn btn-danger">
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
<?php
	}
	else{
		header('Location:index.php');
	}
?>

<div class="panel-footer">
	<a href="#" data-toggle="modal" data-target="#addModal" role="button" class="btn btn-primary btn-sm">
        Dodaj kavu
    </a>
	<a href="#" data-toggle="modal" data-target="#deleteall" role="button" class="btn btn-danger btn-sm">
        Izbriši označene
    </a>
	
	<div class="modal fade" id="deleteall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content" style="text-align:center;">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color:#a80b27;text-transform:uppercase;font-size:1.6rem;">upozorenje	!</h2>
								</div>
								<div class="modal-body">
									<h5>Da li si siguran da želiš izbrisati označene kave iz kavomata?</h5>
								</div>
								<div class="modal-footer">
									<a href="#" id="delete-all" role="button" class="btn btn-danger">
										Da, siguran sam!
									</a>
									<button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
								</div>
							</div>
						</div>
					</div>
</div>

<?php

	try{
		$stmt = $conn->prepare('SELECT k.id,k.naziv FROM kave k WHERE k.id NOT IN(SELECT kava_id FROM kave_u_kavomatima kuk WHERE kuk.kavomat_id=:id_kavomat)');
		$stmt->bindParam(':id_kavomat',$id);
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

?>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj kavu u <?php isset($_GET['automat']) ? print _e($_GET['automat']) : '';?> kavomat</h4>
            </div>
            <form action="" method="POST">
				<input type="hidden" name="automat_id" id="automat_id" value="<?php echo $id;?>">
				<input type="hidden" name="automat" id="automat" value="<?php isset($_GET['automat']) ? print _e($_GET['automat']) : '';?>">
                <div class="modal-body">
                    <div class="form-group coffee">
                        <label for="coffee">Kava</label>
                        <select class="form-control" name="coffee" id="coffee" multiple>
								
                            
							<?php
								foreach($data as $value){
							?>	
								<option value="<?php echo $value['id']?>"><?php echo $value['naziv']?></option>
							<?php
								}
							?>  
                        </select>
                    </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary" id="add-coffee">Dodaj</button>
                </div>
        </div>
    </div>
</div>

