<?php
  session_start();
?>

<?php
    if($_POST){
      include ('../connect.php');

      if($conn->connect_error){
        die('connection failed :'.connect_error);
      }else{
        $qurey = "SELECT table_name FROM information_schema.tables
        WHERE table_schema = 'ebuy';";
        $result = $conn->query($qurey);
        $output = $result;
        $hasTable = false;
        while ($row = $result->fetch_assoc()) {
          echo "<script>console.log('Debug Objects: " . $row['table_name'] . "' );</script>";
          if($row['table_name'] == "orders"){
            $hasTable = true;
            break;
          }else{
            $hasTable = false;
          }
        }
    
        if(!$hasTable){
          $qurey = "CREATE TABLE orders(
            orderId int NOT NULL AUTO_INCREMENT,
            userFullName VARCHAR(255),
            userEmail VARCHAR(255),
            userMobile VARCHAR(255),
            userOrderDate VARCHAR(255),
            totalPrice VARCHAR(255),
            PRIMARY KEY (orderId)
          )";
          $conn->query($qurey);
        }
    
        $user_full_name = $_POST['userFullName'];
        $user_email = $_POST['userEmail'];
        $user_mobile = $_POST['userMobile'];
        $user_orderDate = $_POST['userOrderDate'];
        $items = array();
        $totalPrice = 0;

        $qry = "SELECT * FROM cart WHERE userEmail='$user_email'";
        $result = $conn->query($qry);
        while($row = $result->fetch_assoc()){
          array_push($items, $row['itemName']);
          $totalPrice = $totalPrice + $row["unitPrice"];
        }

        if(count($items) > 0){
            $insert = $conn->prepare("INSERT INTO orders(userFullName,userEmail,userMobile, userOrderDate, totalPrice) VALUE(?,?,?,?,?)");
            $insert->bind_param("sssss",$user_full_name,$user_email,$user_mobile,$user_orderDate, $totalPrice);
            $insert->execute();
            header( "Location: add-success.php" );
            $insert->close();
            $conn->close();
        }
    }
  }
?>


<?php
//   if(!$_SESSION['auth']){
//     header('location:user-login.php');
//   }else{
    echo '<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@100;400;500;900&display=swap"
      rel="stylesheet"
    />

    <!-- styles including bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/user-checkout-form.css" />
  </head>

  <body class="h-100 body">
    <div class="row h-100">
      <div class="col-auto mx-auto my-auto" style="display: flex; justify-content:center; height: 75%;">
        <div class="card content" >
          <div class="card-body" style="width: 600px;">
              <form action="user-checkout-form.php" method="POST" style="height: 100%;display: flex; flex-direction: column; justify-content: space-evenly;">
                <h1 class="card-title checkout-page-title">Order Checkout</h1>
                <br/>
                <label for="userFullName">User Full Name </label>
                <input
                  style="margin-bottom: 10px;"
                  type="text"
                  id="userFullName"
                  name="userFullName"
                  class="w-100"
                  required
                />
              
                <label for="userEmail">User email </label>
                <input
                  style="margin-bottom: 10px;"
                  type="email"
                  id="userEmail"
                  name="userEmail"
                  class="w-100"
                  required
                />

                <label for="userMobile">User contact number </label>
                <input
                  style="margin-bottom: 20px;"
                  type="number"
                  id="userMobile"
                  name="userMobile"
                  class="w-100"
                  required
                />

                <label for="userOrderDate">Order Date </label>
                <input
                    style="margin-bottom: 30px;"
                    type="date"
                    name="userOrderDate"
                    id="userOrderDate"
                    required
                />

                <div>
                  <button type="submit" class="btn btn-dark btn-md">
                    Checkout
                  </button>
                  <button
                    id="listing-cancel"
                    type="button"
                    class="btn btn-outline-secondary btn-md"
                  >
                    Cancel
                  </button>
                </div>
              </form>
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
  //}
?>