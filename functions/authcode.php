<?php

include ('../config/dbcon.php');
include ("userFunction.php");

if (isset($_POST['register_btn'])) {

    // Validate and sanitize input
    $name = validateName(trim($_POST['name']));
    $phone = validatePhone(trim($_POST['phone']));
    $email = validateEmail(trim($_POST['email']));
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    // Check for empty user table and set role_as accordingly
    $role_as = checkEmptyUserTable($con);
    
    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $check_email_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Then check if number of rows greater then zero, if so the email already registered
    if (mysqli_stmt_num_rows($stmt) > 0) {
        redirect("../register.php", "Email already registered.");
    } else {
        if (isset($password) && !empty($password) && isset($cpassword) && !empty($cpassword)) {
            // Check if password is match to cpassword
            if ($password == $cpassword) {

                // Hash the password before storing
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data using prepared statements
                $insert_query = "INSERT INTO users (name, phone, email, password, role_as) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $insert_query);
                mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $email, $hashed_password, $role_as);
                $insert_query_run = mysqli_stmt_execute($stmt);

                // Check if query is run successfull
                if ($insert_query_run) {
                    redirect("../login.php", "Registered Successfully.");
                } else {
                    redirect("../register.php", "Something went wrong.");
                }

            } else {
                // Redirect to the same page
                redirect("../register.php", "Password do not match.");
            }

        } else {
            // Redirect to the same page
            redirect("../register.php", "Password can't be empty");
        }
    }
    mysqli_stmt_close($stmt);
} else if (isset($_POST['login_btn'])) {
    // Validate and sanitize input
    $email = validateEmail(trim($_POST['email']));
    $password = trim($_POST['password']);

    if (isset($password) && !empty($password)) {

        // Fetch user data
        $login_query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $login_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if user exists 
        if ($userdata = mysqli_fetch_assoc($result)) {

            if (password_verify($password, $userdata['password'])) {
                // Password verification successful
                $_SESSION['auth'] = true;
                $userid = $userdata['id'];
                $username = $userdata['name'];
                $useremail = $userdata['email'];
                $role_as = $userdata['role_as'];

                // User logged in and storing data user in our session
                $_SESSION['auth_user'] = [
                    'user_id' => $userid,
                    'name' => $username,
                    'email' => $useremail
                ];

                // After user logged in check if is admin Or user
                $_SESSION['role_as'] = $role_as;
                if ($role_as == 1) {
                    redirect("../admin/index.php", "Welcome To Dashborad.");
                } else {
                    redirect("../index.php", "Logged In Successfully.");
                }
            } else {
                // Password verification failed
                redirect("../login.php", "Invalid Credentials.");
            }
        } else {
            redirect("../login.php", "User not found.");
        }
    } else {
        redirect("../login.php", "Invalid Credentials fill the fileds.");
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($con);

?>