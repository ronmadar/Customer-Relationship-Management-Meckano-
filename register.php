<?php
session_start();

// if the user logged in we will just redirect to index.php page. (prevent access to register.php page)
if(isset($_SESSION["auth"])){
    $_SESSION['message'] ='You are already register...';
    // Block access to register
    header('Location: index.php');
    exit();
}

include('includes/header.php');
 ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php 
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message'];?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    // once message has been displayed we have unset the session
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Registration Form</h4>
                    </div>

                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control"
                                    placeholder="Enter your phone">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control"
                                    placeholder="Confirm password">
                            </div>
                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
