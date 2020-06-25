<?php
   /* Connect to a MySQL database using driver invocation */
   $dsn   = "mysql:host=localhost;dbname=formula1";
   $user  = "root";
   $pass  = "";

    try {
        $con = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
?>
