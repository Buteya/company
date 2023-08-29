<?php
    $host = "localhost";
    $db_name = "company";
    $user = "root";
    $password = "";
    try{
        $db = new PDO("mysql:host = $host;dbname=$db_name",$user,$password);
        $db ->setAttribute(PDO ::ATTR_ERRMODE,PDO ::ERRMODE_EXCEPTION);
    }catch(PDOException $E){
        die("CONNECTION FAILED".$E->getMessage());
    }
?>