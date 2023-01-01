<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage listings</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@100;400;500;900&display=swap"
      rel="stylesheet"
    />

    <!-- bootstrap and styles -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body class="container" id="ml-body">
  <div class="jumbotron">
      <h1 class="display-4">View and remove your listings</h1>
      <p class="lead">
        Item listed successfully on store. Item will display to users.
      </p>
      <hr class="my-4" />

      <a class="btn btn-dark btn-lg mx-1" href="listing-page.php" role="button"
        >Add new</a
      >
      <a
        class="btn btn-outline-dark btn-lg mx-1"
        href="admin-portal.php"
        role="button"
        >Admin-portal</a
      >
    </div>
    <div
      class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 manage-listing-body my-3"
    >
    <?php
        include('connect.php');
        // $conn = getDbConnection();

        $qurey = "SELECT * FROM listings";

        $result = $conn->query($qurey);
        if($result->num_rows>0){

        while($row = $result->fetch_assoc()){
        echo 
      '<div class="col">
        <div class="card shadow-sm">
          <img
            src="'. $row["ImageThumbnail"].'"
            alt=""
            srcset=""
            class="image-pic"
          />
          <div class="card-body">
            <h2 class="card-title">'. $row["itemTitle"].'</h2>
            <h5 class="card-title">'. $row["price"].'$</h5>
            <p class="card-text">
            '. $row["itemDescription"].'
            
            </p>
            <form action="remove-item.php" method="post">
                <button type="submit" class="btn btn-danger" value="'.$row["itemId"].'" name="remove">Remove</button>
            </form>
            </div>
        </div>
      </div>';
        }
    }
      ?>
    </div>

    <!-- bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
