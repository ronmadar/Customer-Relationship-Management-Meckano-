<?php
session_start();

// If the user logged in we will just redirect to index.php page. (prevent access to loggin.php page)
if(isset($_SESSION["auth"])){
    $_SESSION['message'] ='You are already logged In...';
    // Block access to login
    header('Location: index.php');
    // We have function of exit(), to make sure this page does not continue to excute after this line, because on line 27 we unset the session and the message not display - therefore exit().
    exit();
}

include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>

                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" value="ronmadar9@gmail.com" class="form-control"
                                    placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" value="1234" class="form-control"
                                    placeholder="Enter password">
                            </div>

                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>