<?php

include ("../config/dbcon.php");
include ("../functions/userFunction.php");

if (isset($_POST["add_customer_btn"])) {
    // Trim inputs
    $name = validateNameAddCustomer(trim($_POST['name']));
    $email = filter_var(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
    $address = validateAddAddress(trim($_POST['address']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Check fileds not null
    if ($name != "" && $email != "" && $address != "" && $phone) {

        // Insert query to DB using prepared statements Check if query run successfully
        if (addCustomer($name, $email, $address, $phone)) {
            redirect("add-customer.php", "Customer Added Successfully!");
        } else {
            redirect("add-customer.php", "Something Went Wrong on customer inputs!");
        }
    } else {
        redirect("add-customer.php", "All The Fields Mandatory !");
    }

} else if (isset($_POST["update_customer_btn"])) {

    $customer_id = htmlspecialchars(trim($_POST['customer_id']));
    $name = validateNameUpCustomer(trim($_POST['name']), $customer_id);
    $email = filter_var(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
    $address = validateUpAddress(trim($_POST['address']), $customer_id);
    $phone = htmlspecialchars(trim($_POST['phone']));

    if ($name != "" && $email != "" && $address != "" && $phone) {
        // Update query to DB
        if (updateCustomer($customer_id, $name, $email, $address, $phone)) {
            redirect("edit-customer.php?id=$customer_id", "Customer Update Successfully.");
        } else {
            // If there is any error on query redirect to the same page
            redirect("edit-customer.php?id=$customer_id", "Something Went Wrong.");
        }
    } else {
        redirect("edit-customer.php", "All The Fields Mandatory !");
    }

} else if (isset($_POST['delete_customer_btn'])) {

    if (deleteCustomer(htmlspecialchars(trim($_POST['customer_id'])))) {
        echo 200;
    } else {
        // If there is any error on query
        echo 500;
    }

} else {
    // Default
    header('Location: ../index.php');
}

?>