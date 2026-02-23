<?php
include(__DIR__ . "/../includes/authentication.php");
$page_title="Dashboard ";
include('../includes/header.php');
include('../includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
               
                <?php 
                    if(isset($_SESSION['status'])):
                ?>
                <div class="alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h2>Access when you are logged in</h2>
                        <hr>
                        <h5><strong>Username: </strong><?= $_SESSION['auth_user']['username']; ?></h5>
                        <h5><strong>Email: </strong><?= $_SESSION['auth_user']['email']; ?></h5>
                        <h5><strong>Phone: </strong><?= $_SESSION['auth_user']['phone'] ;?></h5>
                    </div>
                </div>
                <?php  endif ?>
                <a class="btn btn-outline-warning mt-3" href="../auth-services/logout.php">Logout</a>
        </div>
    </div>
</div>

<?php 
include('../includes/footer.php');
?>