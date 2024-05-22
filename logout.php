<?php
    session_start();
    // if the user not logged in and if we try access logout.php, will be redirected back to index.php
    if(isset($_SESSION['auth'])){
        // if the user loggin then should unset the sessions: $_SESSION['auth'] ,$_SESSION['auth_user']
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        // once the user logout set the: $_SESSION['message'] 
        $_SESSION['message'] = "Logged Out Successfully";
    }
    header('Location: index.php');
?>