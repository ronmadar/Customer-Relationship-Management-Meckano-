<?php
session_start();
include("../config/dbcon.php");

// Redirect function is used to redirect users with a message after performing an action
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

function getAll($table)
{
    // throw an error that variable is undefined, so we have declare that as global 
    global $con;
    if(ValidateTable($table)){
        $query = "SELECT * FROM $table";
        $query_run = mysqli_query($con, $query);
        return $query_run;
    }
}

function getByID($table, $id)
{
    global $con;
    if(ValidateTable($table)){
        $query = "SELECT * FROM $table WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $query_run = mysqli_stmt_get_result($stmt);  
        return $query_run;
    }
}

function checkEmptyUserTable($con) {
    $check_empty_table_query = "SELECT COUNT(*) AS user_count FROM users";
    $stmt = mysqli_prepare($con, $check_empty_table_query);
    mysqli_stmt_execute($stmt);
    $stmt->bind_result($user_count);
    $stmt->fetch();

    mysqli_stmt_close($stmt);
    
    return ($user_count === 0) ? 1 : 0;
}

// ValidateTable function ensures that only predefined and trusted table names ('users' and 'customers') are allowed.
// This prevents SQL injection attacks by validating user-supplied table names before executing queries.
function ValidateTable($table)
{
    // Whitelist table names to prevent SQL injection
    $allowed_tables = ['users', 'customers'];
    if (!in_array($table, $allowed_tables)) {
        return false;
    }else{
        return true;
    }
}


function validateName($name) {
    // Sanitize and validate name
    $name = htmlspecialchars($name);
    if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return $name;
    } else {
        redirect("../register.php", "Invalid name format.");
        exit();
    }
}

function validatePhone($phone) {
    // Sanitize and validate phone number
    $phone = htmlspecialchars($phone);
    if (preg_match("/^[0-9]{10,15}$/", $phone)) {
        return $phone;
    } else {
        redirect("../register.php", "Invalid phone number format.");
        exit();
    }
}

function validateEmail($email) {
    // Sanitize and validate email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        redirect("../register.php", "Invalid email format.");
        exit();
    }
}


function validateNameAddCustomer($name)
{
    // Sanitize and validate name
    $name = htmlspecialchars($name);
    if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return $name;
    } else {
        redirect("add-customer.php", "Invalid name format.");
        exit();
    }
}
function validateAddAddress($address)
{
    // Sanitize and validate address
    $address = htmlspecialchars($address);
    // Adjust the regex pattern according to your address format
    if (preg_match("/^[a-zA-Z0-9\s,'.-]*$/", $address)) {
        return $address;
    } else {
        redirect("add-customer.php", "Invalid address format.");
        exit();
    }
}

function validateNameUpCustomer($name, $customer_id)
{
    // Sanitize and validate name
    $name = htmlspecialchars($name);
    if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return $name;
    } else {
        redirect("edit-customer.php?id=$customer_id", "Invalid name format.");
        exit();
    }
}
function validateUpAddress($address, $customer_id)
{
    // Sanitize and validate address
    $address = htmlspecialchars($address);
    // Adjust the regex pattern according to your address format
    if (preg_match("/^[a-zA-Z0-9\s,'.-]*$/", $address)) {
        return $address;
    } else {
        redirect("edit-customer.php?id=$customer_id", "Invalid address format.");
        exit();
    }
}

function addCustomer($name, $email, $address, $phone) {
    global $con;
    $customer_query = "INSERT INTO customers (name, email, address, phone) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $customer_query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $address, $phone);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

function updateCustomer($customer_id, $name, $email, $address, $phone) {
    global $con;
    $update_query = "UPDATE customers SET name = ?, email = ?, address = ?, phone = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $address, $phone, $customer_id);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

function deleteCustomer($customer_id) {
    global $con;
    $delete_query = "DELETE FROM customers WHERE id = ?";
    $stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $customer_id);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}
?>