<?php
    $user = 'root';
    $password = '';
    $db = 'ebuy';

    $db = new mysqli('localhost',$user,$password,$db) or die("Unable to connect");

    echo"Great work! It's done!!!";
?>