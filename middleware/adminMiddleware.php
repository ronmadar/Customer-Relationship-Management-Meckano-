<?php
include("../functions/userFunction.php");
    // Check if auth is true , means the user is logged in.
    if(isset($_SESSION['auth'])){
        // Check if is not the admin , any other role it is not be allowed to access to this page(admin).
        if($_SESSION['role_as'] != 1)
        {
            redirect("../index.php", "You are not authorized to access this page.");
        }
    }
    else{
        // Redirect to the login page, if the user not login and try to access the admin dashborad.
        redirect("../login.php", "Login To continue.");       
    }
?>