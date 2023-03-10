<?php
  session_start();
?>

<?php
    if($_POST){
    include ('connect.php');

    $item_title = $_POST['itemTitle'];
    $image_thumbnail= $_POST['imageThumbnail'];
    $price = $_POST['price'];
    $item_description = $_POST['itemDescription'];

    if($conn->connect_error){
        die('connection failed :'.connect_error);
    }else{
        $insert = $conn->prepare("INSERT INTO listings(itemTitle,ImageThumbnail,price,itemDescription) VALUE(?,?,?,?)");
        $insert->bind_param("ssis",$item_title,$image_thumbnail,$price,$item_description);
        $insert->execute();
        header( "Location: insert-success.php" );
        $insert->close();
        $conn->close();
    }
  }
?>

<?php
  if(!$_SESSION['auth']){
    header('location:admin-login.php');
  }else{
    echo '<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List item</title>
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
    <link rel="stylesheet" href="css/styles.css" />
  </head>

  <body class="h-100 body listing-body">
    <div class="row h-100">
      <div class="col-auto mx-auto my-auto column listing-form">
        <div class="card content">
          <div class="card-body">
            <div class="login">
              <form action="listing-page.php" method="POST">
                <h1 class="card-title listing-page-title">Add your listing</h1>

                <label for="ItemTitle">Item Title </label>
                <input
                  type="text"
                  id="ItemTitle"
                  name="itemTitle"
                  class="w-100"
                  required
                />

                <label for="imageThumbnail">Image Thumbnail </label>
                <input
                  type="text"
                  id="imageThumbnail"
                  name="imageThumbnail"
                  class="w-100"
                  required
                />

                <label for="ItemTitle" class="">Price </label>
                <input
                  type="text"
                  id="price"
                  name="price"
                  class="w-100 listing-id-price"
                  required
                />

                <label for="itemDescription" class="">Item Description </label>
                <textarea
                  name="itemDescription"
                  id="ItemTitle"
                  cols="30"
                  rows="10"
                  class="w-100"
                  required
                ></textarea>

                <div class="listing-button">
                  <button type="submit" class="btn btn-dark btn-lg">
                    List item
                  </button>
                  <button
                    id="listing-cancel"
                    type="button"
                    class="btn btn-outline-secondary btn-lg"
                  >
                    Cancel
                  </button>
                </div>
              </form>
            </div>
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
  }
?>
