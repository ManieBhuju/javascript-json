<?php
    $servername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="javascript";
    // $conn= mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);
    // echo "Connected";
    // if (!$conn)
    // {
    //     die("Connection Error!:".mysqli_connect_error());
    // }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
?>