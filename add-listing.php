<?php
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
        header( "Location: insert-success.html" );
        $insert->close();
        $conn->close();
    }
?>