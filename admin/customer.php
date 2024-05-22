<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<div class="py-4">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Customers </h4>
                    </div>
                    <div class="card-body" id="customer_table">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $customer = getAll("customers");
                                if ($customer && mysqli_num_rows($customer) > 0) {

                                    foreach ($customer as $rowItem) {
                                        ?>
                                        <tr>
                                            <td><?= $rowItem['id']; ?></td>
                                            <td><?= $rowItem['name']; ?></td>
                                            <td><?= $rowItem['email']; ?></td>
                                            <td><?= $rowItem['address']; ?></td>
                                            <td><?= $rowItem['phone']; ?></td>
                                            <td>
                                                <a href="edit-customer.php?id=<?= $rowItem['id']; ?>" class="btn btn-primary">Edit</a>  
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete_customer_btn" value="<?= $rowItem['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                } else {
                                    echo "No Records Found";
                                }
                                ?>
                                <div id="count" class="my-2">Showing <?= mysqli_num_rows($customer)?> entries</div>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>