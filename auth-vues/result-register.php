<?php
session_start();
$page_title="Result Regiter";
include('../includes/header.php');
include('../includes/navbar.php');

$alert="primary";
$msg = "ici on affiche le resultat de votre inscription";
if(isset($_SESSION['alert']) && isset($_SESSION['status'])){
    $msg=$_SESSION['status'];
    $alert=$_SESSION['alert'];
}

?>



<div class="py-5">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
               <div class="alert alert-<?= $alert ?>">
                    <?=$msg ?>
               </div>
            </div>
        </div>
        <a class="mt-3 btn btn-outline-warning "  href="../index.php">Home</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>






