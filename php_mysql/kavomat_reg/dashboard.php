<?php

require 'layout/header.php';
if(!isset($_SESSION['user_id'])){
	header('Location:index.php');
}

?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nadzorna ploča</div>

                <div class="panel-body">
                    DEMO.
                </div>
            </div>
        </div>
    </div>
</div>
<?php

require 'layout/footer.php';

?>