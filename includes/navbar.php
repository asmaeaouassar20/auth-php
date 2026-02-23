<?php
include(__DIR__ . '/../config/config.php');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $BASE_URL; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $BASE_URL; ?>auth-vues/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $BASE_URL; ?>auth-vues/register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="<?php echo $BASE_URL; ?>user/dashboard.php" >Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['authenticated'])){ echo "disabled";}?>" >Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>