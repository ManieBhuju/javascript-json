<?php
require 'connect.php';
$id = $_GET['profile_id'];
echo $id;

$sql = $conn->prepare("DELETE FROM profile WHERE profile_id='$id'");
$sql->execute();
$sql2= $conn->prepare("ALTER TABLE profile AUTO_INCREMENT = 1");
$sql2->execute();
header ("Location: index.php");
?>