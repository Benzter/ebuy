
<?php
 $email = $_SESSION['email'];


  $nav ='<nav class="navbar">
      <div class="container-fluid">
        <a class="navbar-brand">'
          .$email.
        '</a>
        <form class="d-flex" action="log-out.php" method="post">
          <button class="btn btn-outline-light" type="submit">Logout</button>
        </form>
      </div>
    </nav>';
  
?>