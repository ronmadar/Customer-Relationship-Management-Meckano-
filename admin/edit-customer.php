<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Check if the id is set or not in the url
                $id = $_GET['id'];
                if (isset($id) && !empty($id)) {
                    // Fetch id from url
                    
                    $customer = getByID("customers", $id);

                    // If there are record with that id then we show
                    if (mysqli_num_rows($customer) > 0) {
                        $data = mysqli_fetch_array($customer);
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Customer
                                    <a href="customer.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="customer_id" value="<?= $data['id'] ?>">
                                            <label class="mb-0">Name:</label>
                                            <input type="text" required name="name" value="<?= $data['name'] ?>" placeholder="Enter Name"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">email:</label>
                                            <input type="email" required name="email" value="<?= $data['email'] ?>"
                                                placeholder="Enter email" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">address:</label>
                                            <input type="text" required name="address" value="<?= $data['address'] ?>" placeholder="Enter address"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">phone:</label>
                                            <input type="number" required name="phone" value="<?= $data['phone'] ?>"
                                                placeholder="Enter phone number" class="form-control">
                                        </div>

                                        <div class="col-md-12 py-2">
                                            <button type="submit" class="btn btn-primary" name="update_customer_btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "Customer not found";
                    }
                } else {
                    echo "Id missing from the url";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>