<!DOCTYPE html>

<?php
  session_start();
  include('nav.php');
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@100;400;500;900&display=swap"
      rel="stylesheet"
    />

    <!-- css styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/orders.css" />
  </head>
  <body class="body">

    <?php echo '
      <nav class="navbar bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand">' .$email. '</a>
          <div>
            <a class="btn btn-outline-light " href="admin-portal.php" role="button">Home</a>
            <a class="btn btn-outline-light " href="log-out.php" role="button">Logout</a>
          </div>
        </div>
      </nav> ';
    ?>

    <h1 class="text-center py-5 text-uppercase order-heading">
      Manage your orders from here
    </h1>
    <h4 class="text-center py-2">Click to View Orders</h4>

    <?php
      include("connect.php");

      //$conn = getDbConnection();

      // SQL QUERY
      $query = "SELECT * FROM orders";

      // FETCHING DATA FROM DATABASE
      $result = $conn->query($query);

      if ($result->num_rows > 0)
      {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
          echo '
          <div class="container" style="margin-bottom: 10px;">
            <div class="accordion d-flex justify-content-between">
              <lable style="margin-left: 30px;">'. $row["userFullName"].'</lable>
              <lable style="margin-left: 30px;">'. $row["userEmail"].'</lable>
              <button class="btn dropdown" style=""><i class="bi bi-chevron-down"></i></button>
            </div>
            <div class="panel">
              <table class="container-fluid table">
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                </tr>
                <tr>
                  <td>'. $row["orderID"].'</td>
                  <td>'. $row["userOrderDate"].'</td>
                  <td>'. $row["itemName"].'</td>
                  <td>'. $row["itemQuantity"].'</td>
                  <td><span>&dollar;</span>'. $row["unitPrice"].'</td>
                  <td><span>&dollar;</span>'. $row["totalPrice"].'</td>
                </tr>
              </table>
            </div>   
          </div>
          ';

        }
      }
      else {
          echo "0 results";
      }

      $conn->close();

    ?> 

    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          } 
        });
      }
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
