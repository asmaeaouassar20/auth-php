<?php

session_start();
$page_title="Home ";
include('includes/header.php');
include('includes/navbar.php');

?>


    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Home</h1>
                <div class="card">
                    <?php if(isset($_SESSION['auth_user'])): ?>
                   <div class="card-body">
                     <p>You're logged in</p>
                    <p>hey, <?= htmlspecialchars($_SESSION['auth_user']['username']) ?></p>
                   </div>
                    <a class="btn btn-outline-danger" href="auth-services/logout.php">Logout</a>
                <?php else : ?>
                    <p class="p-3"><a href="/auth-php/auth-vues/login.php">Log In</a> or <a href="/auth-php/auth-vues/register.php">Sign up</a></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>

<?php include('includes/footer.php'); ?>