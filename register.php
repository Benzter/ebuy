<?php
    include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="css/register-style.css">
</head>
<body>

    
<!--------------- nav bar ---------------->
    <div class="nav">
        <p> ebuy</p>
    </div>
    
    
<!-- -----------message box ----------------------->

    <div class="container">
        
            <form onsubmit="return validate();" action="register.php" method="post">
                <h2>User Registration</h2>
                <input id="userName" class="input-fields" type="text" name="name" placeholder="Enter your name" >
                <input id="address" class="input-fields" type="text" name="address" placeholder="Enter your address">
                <input id="email" class="input-fields" type="email" name="email" placeholder="Enter your email">
                <input id="password" class="input-fields" type="password" name="password" placeholder="Enter your password">
                <input id="cpassword" class="input-fields" type="password" name="cpassword" placeholder="confirm your password">
                
                <input type="submit" name="submit" value="REGISTER" class="form-btn" >
                <p>already have an account? <a href="login.php">log in now</a> </p>
            </form>
    </div>

    <script>

        function validate(){
            var userName = document.getElementById("userName");
            var address = document.getElementById("address");
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var cpassword = document.getElementById("cpassword");

            if(userName.value == "" || address.value == "" || email.value == "" || password.value == "" || cpassword.value == ""){
                alert("Please fill out all the input fields");
                return false;
            }else{
                true;
            }
        }
    </script>
    
     
</body>
</html>




<?php
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        

        
        $query = "INSERT INTO users(name,address,email,password,cPassword) VALUES('$name','$address','$email','$password','$cpassword')";

        if(mysqli_query($conn,$query)){
            header("Location:register.php");
            exit;
        }


    }
?>











