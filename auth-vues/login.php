

<?php
include('../includes/header.php');
?>



<div class="py-5">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
               <div class="card">
                    <h5 class="card-header">Login Form</h5>
                    <div class="card-body">
                        <form method="POST" action="../auth-services/login.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                           
                            <button type="submit" class="btn btn-primary" name="login-btn">Submit</button>
                      </form>
                            <div class="mt-5 form-check ">
                                <label class="form-check-label" >D'ont have account <a href="register.php" >Register</a></label>
                            </div>
                        </div>
                        </div>

            </div>
        </div>
    </div>
</div>
