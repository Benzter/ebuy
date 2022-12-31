<?php
    include ('connect.php');

    $id =  $_POST['remove'];

    $sql = "DELETE FROM listings WHERE itemId='$id'";

    // echo $sql
    if ($conn->query($sql) === TRUE) {
       header("Location: manage-listing.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>