<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Name:</label>
                                    <input type="text" required name="name" placeholder="Enter Name"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">email:</label>
                                    <input type="email" required name="email" placeholder="Enter email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">address:</label>
                                    <input type="text" required name="address" placeholder="Enter address"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">phone:</label>
                                    <input type="number" required name="phone"
                                        placeholder="Enter phone number" class="form-control">
                                </div>

                                <div class="col-md-12 py-2">
                                    <button type="submit" class="btn btn-primary" name="add_customer_btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>