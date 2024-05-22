<?php
// Find the position of the last occurrence of a substring in a string, then we will get the file name in $page. 
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><span class="nav-link-text">Dashboard</span></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page == "index.php" ? 'active' : ''; ?> " href="index.php"><span
              class="nav-link-text">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == "customer.php" ? 'active' : ''; ?>" href="customer.php"><span
              class="nav-link-text">All Customers</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == "add-customer.php" ? 'active' : ''; ?>" href="add-customer.php"><span
              class="nav-link-text">Add Customer</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php"><span class="nav-link-text">Logout</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>