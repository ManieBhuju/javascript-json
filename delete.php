<?php
require 'connect.php';
$id = $_GET['profile_id'];
// echo $id;

$sql = "SELECT first_name, last_name FROM profile WHERE profile_id='$id'";
// $row = $conn->query($sql);
foreach ($conn->query($sql) as $row) {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manee Raj Bhuju</title>
    </head>
    <body>
        <form method="POST" action="delete.php?profile_id=<?php echo $id; ?>">
            <p>First Name: <?php echo $row['first_name'];?></p>
            <p>Last Name: <?php echo $row['last_name'];?></p>

            <input type="submit" name="delete" value="Delete">  
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>


<?php
}

if (isset($_POST['delete'])) {
    $id = $_GET['profile_id'];
    $sql = $conn->prepare("DELETE FROM profile WHERE profile_id='$id'");
    $sql->execute();
    $sql2= $conn->prepare("ALTER TABLE profile AUTO_INCREMENT = 1");
    $sql2->execute();
    header ("Location: index.php");
}
elseif (isset($_POST['cancel'])) {
    header ("Location: index.php");
}

?>