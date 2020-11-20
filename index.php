<?php
require 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manee Raj Bhuju</title>
    </head>
    <body>
        <div class="container">
        <h1>Manee's Resume Registry</h1>
        <p><a href="logout.php">Logout</a></p>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Headline</th>
                <th>Action</th>
            </tr>
            <?php 
                $id = $_SESSION['user_id'];
                $sql = "SELECT * FROM profile WHERE user_id='$id'";
                $result = $conn->query($sql);
                // $count = $result->rowCount();
                // print_r($count);
                
                foreach ( $result as $row) {
            ?>
            <tr>
                <td>
                    <a href="view.php?profile_id=<?php echo $row['profile_id'];?>">
                        <?php echo $row['first_name'] ,' ',$row['last_name']; ?>    
                    </a>
                </td>
                <td>
                    <?php echo $row['headline']; ?>
                </td>
                <td>
                    <a href="edit.php?profile_id=<?php echo $row['profile_id'];?>">Edit</a> 
                    <a href="delete.php?profile_id=<?php echo $row['profile_id'];?>">Delete</a>
                </td>
            </tr> 
            <?php
                }
            ?>
        </table>
        <p><a href="add.php">Add New Entry</a></p>
        <p>
        </div>
    </body>
</html>
