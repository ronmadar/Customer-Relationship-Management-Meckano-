<footer class="footer pt-5">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-12">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item" style="color:#000">
            <a class="nav-link" href="../logout.php" style="color: #000;">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</main>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- sweetalert cdn-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Files -->
<script src="assets/js/custom.js"></script>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  <?php if (isset($_SESSION['message'])) { ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?= $_SESSION['message']; ?>');
    <?php
    unset($_SESSION['message']);
  }
  ?>
        </script>
  </body>

</html>