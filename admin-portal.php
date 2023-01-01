<?php
  session_start();
?>

<?php
  if(!$_SESSION['auth']){
    header('location:login.php');
  }else{
    echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin portal</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@100;400;500;900&display=swap"
      rel="stylesheet"
    />

    <!-- css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="admin-portal.css" />

    <!-- fontawesome -->
    <script
      src="https://kit.fontawesome.com/efd7ef5346.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="py-3 w-75 mx-auto text-center">
    <div class="my-5">
      <h1 class="display-4 admin-portal-heading">
        Manage your listings and orders
      </h1>
      <p class="fs-5 text-muted">
        Add your listings, view, remove and manage your orders from here
      </p>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm add-card">
          <div class="card-body">
            <i class="fa-solid fa-plus portal-icon"></i>
            <h1 class="portal-card-title">Add your listings</h1>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm manage-card">
          <div class="card-body">
            <i class="fa-solid fa-shop portal-icon"></i>
            <h1 class="portal-card-title">Manage your listings</h1>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-body">
            <i class="fa-sharp fa-solid fa-cart-shopping portal-icon"></i>
            <h1 class="view-order-heading portal-card-title">View orders</h1>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>';
  }?>