<?php
require 'connect.php';
session_start();
$id = $_GET['profile_id'];
// echo $id;
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Manee Raj Bhuju</title>
    </head>
    <body>
        <div class="container">
            <h1>Adding Profile for UMSI</h1>
            <?php 
                $sql = "SELECT * FROM profile WHERE profile_id = '$id'";
                foreach ($conn->query($sql) as $row) {
                
            ?>
            <form method="POST" onsubmit="return doValidate();" action="edit.php?profile_id=<?php echo $id; ?>">
                <p>First Name:
                    <input type="text" value= "<?php echo $row['first_name'];?>" name="first_name" size="60" required/>
                </p>
                <p>Last Name:
                    <input type="text" value= "<?php echo $row['last_name'];?>" name="last_name" size="60" required/>
                </p>
                <p>Email:
                    <input type="text" id="email" value= "<?php echo $row['email'];?>" name="email" size="30"/>
                </p>
                <p>Headline:<br/>
                    <input type="text" value= "<?php echo $row['headline'];?>" name="headline" size="80"/>
                </p>
                <p>Summary:<br/>
                    <textarea name="summary" rows="8" cols="80"><?php echo $row['summary'];?></textarea>
                <p>
                    <input type="submit" value="Edit" onclick="return doValidate();" name="Edit">
                    <input type="submit" name="cancel" value="Cancel">
                </p>
            </form>
            <?php 
                }
            ?>
        </div>
        <script>
            function doValidate() {
                console.log('Validating...');
                try {
                    var addr = document.getElementById('email').value;
                    // alert("hello" + addr);
                    console.log("Validating addr="+addr);
                    if ( addr.indexOf('@') == -1 ) {
                        alert("Invalid email address");
                        return false;
                    }
                    return true;
                } catch(e) {
                    return false;
                }
            }
        </script>
    </body>
</html>

<?php
    if (isset($_POST['Edit'])) {
        $id = $_GET['profile_id'];
        // echo $id;
        extract ($_POST);
        $fn = htmlentities($first_name);
        $ln = htmlentities($last_name);
        $em = htmlentities($email);
        $he = htmlentities($headline);
        $su = htmlentities($summary);

        $stmt = $conn->prepare("UPDATE profile SET first_name='$fn', last_name='$ln', email='$em', headline='$he', summary='$su'
                    WHERE profile_id= '$id'");
        $stmt->execute();
        
        header ("Location: index.php");
    }
?>