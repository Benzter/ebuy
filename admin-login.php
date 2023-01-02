<?php
  session_start();
?>
<?php
  include_once('connect.php');
?>
<?php
    if($_POST){
    $email ='';
    $password='';
    $msg = '';

    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "SELECT * FROM admins WHERE email ='{$email}' AND pwd ='{$password}' LIMIT 1";
    $showResult = mysqli_query($conn,$query);
  
    if($showResult){
      if(mysqli_num_rows($showResult) == 1){
        $user = mysqli_fetch_assoc($showResult);
        $_SESSION['email'] = $user['email'];
        $_SESSION['auth'] ='true';
        
        header("Location: admin-portal.php");
      }
      else{
        $msg =  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Incorrect email or password!</strong> Please try again.<br>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";  
    }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-Shopping</title>

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
    <link rel="stylesheet" href="css/styles.css" />
  </head>

  <body class="h-100 body">
    <div class="row h-100">
      <div class="col-auto mx-auto my-auto column">
        <div class="card content">
          <div class="card-body">
            <div class="login">
              <form action="admin-login.php" method="POST">
                <?php if(!empty($msg)){echo $msg;}?>
                <h1 class="card-title">Ebuy</h1>
                <h5 class="my-3">admin login</h5>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="w-100" />

                <label for="password">Password </label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="w-100"
                />
                <div class="d-grid gap-3 col-12">
                  <button
                    type="submit"
                    value="submit"
                    class="btn btn-lg btn-dark w-90 gap-10 btn1 mt-5"
                  >
                    Login
                  </button>
                
                  <!-- <button
                    type="button"
                    class="btn btn-lg btn-outline-dark col gap-10"
                  >
                    Create account
                  </button> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
