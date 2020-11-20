<?php
require 'connect.php';
session_start(); 
$id = $_GET['profile_id'];
$sql = $conn->prepare("SELECT * FROM profile WHERE profile_id= '$id'");
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Manee Raj Bhuju</title>
    </head>
    <body>
        <div class="container">
            <h1>Profile information</h1>
            <p>First Name:<?php echo $row['first_name'];?></p>
            <p>Last Name:<?php echo $row['last_name'];?></p>
            <p>Email:<?php echo $row['email'];?>
            <p>Headline:<?php echo $row['headline'];?><br/></p>
            <p>Summary:<?php echo $row['summary'];?><br/><p>
            </p>
            <a href="index.php">Done</a>
        </div>
    </body>
</html>
