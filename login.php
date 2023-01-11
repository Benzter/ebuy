<?php
session_start();
?>

<?php
    include 'connect.php';

?>

<?php 



    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

   

        
        $sql ="SELECT * FROM users WHERE email = '$email' And password='$password';";

        $result= mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){

            $user=mysqli_fetch_assoc($result);
            $_SESSION['user_id']=$user['id'];
            $_SESSION['userEmail'] = $email;
            $_SESSION["userAuth"] = true;
             
             //header('Location:home-index.php');
            header('location: home-index.php');
            
        }else{
                $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Something Wrong!</strong> Invalid user name or password
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            ?>
              
           <?php }
        

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/userStyle.css">
</head>
<body>

    <div class="nav">
        <p>ebuy</p>
        
           
    
    </div>
    
    

    <div class="container">

            <form method="post">
                <h2>User Log In</h2>
                <?php
                if(!empty($msg)){echo $msg;}
                ?>
                <input class="input-fields" type="email" name="email" placeholder="Enter your email">
                <input class="input-fields" type="password" name="password" placeholder="Enter your password">
                <input type="submit" name="submit" value="log in" class="form-btn">
                <p>no account yet? <a href="register.php">register now</a> </p>
            </form>
    </div>
    
  
      
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>





