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
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="display-4">Item listed!!!</h1>
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
        >Cancel</a
      >
    </div>
  </body>
</html>';}
?>
