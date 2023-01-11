<?php
    include('connect.php');
   
   ?>

<?php
if($_POST){
    $item_id = $_POST['add'];
    

    $qurey = "SELECT * FROM listings WHERE itemId = $item_id";
    $result = $conn->query($qurey);
    $row = $result->fetch_assoc();

    $itemTitle = $row['itemTitle'];
    $quantity = $_POST['quantity'];  
    $price = $row['price'];
    $userEmail = "sithum123@gmail.com";

    

  

    if($conn->connect_error){
      die('connection failed :'.connect_error);
    }
    else{
      $insert = $conn->prepare("INSERT INTO cart(itemName,quantity,price ,userEmail) VALUE(?,?,?,?)");
      $insert->bind_param("siis",$itemTitle,$quantity,$price ,$userEmail);
      $insert->execute();
      header( "Location:home-index.php" );
      $insert->close();
      $conn->close();
  }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ebuy</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@100;400;500;900&display=swap"
      rel="stylesheet"
    />

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/home-styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Ebuy</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Shop</a>
            </li>
          </ul>
          <form class="d-flex" action="cart.php">
            <button class="btn btn-outline-dark" type="submit" >
              <i class="bi-cart-fill me-1"></i>
              Cart
              <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Product section-->

    <!-- Related items section-->
    <section class="py-5 bg-light">
      <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">All products</h2>
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
        >

        <?php

        $qurey = "SELECT * FROM listings";

        $result = $conn->query($qurey);
        if($result->num_rows>0){

        while($row = $result->fetch_assoc()){
        echo '<div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img
            class="card-img-top h-40"
            src="'. $row["ImageThumbnail"].'"
            alt="..."
          />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">'. $row["itemTitle"].'</h5>
              <!-- Product price-->
              '. $row["price"].'
              <div class="image-dis h-40">'. $row["itemDescription"].'</div>
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <form  method="post">
                    <div class="d-flex justify-content-center my-2 mx-auto">
                      <label for="quantity" class="mx-3 my-auto fw-bold"
                        >Quantity</label>
                      <input
                        type="number"
                        name="quantity"
                        min="1"
                        max="10"
                        id="quantity"
                        value="1"
                        class="m-0 form-control w-25 p-1 w-25"
                      />
                    </div>
                    <button class="btn btn-outline-dark mt-auto w-100"  name="add" value="'.$row["itemId"].'">
                      Add to cart
                    </button>
                  </form>
                </div>
              </div>
        </div>
      </div>';
        }}
        ?>
          
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; eBuy 2023</p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="app.js"></script>
  </body>
</html>
