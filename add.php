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
            <h1>Adding Profile for UMSI</h1>
            <form method="post" action="add.php" >
                <p id="error" style="color: red;"></p>
                <p>First Name:
                    <input type="text" name="first_name" id="fname" size="60"/>
                </p>
                <p>Last Name:
                    <input type="text" name="last_name" id="lname" size="60"/>
                </p>
                <p>Email:
                    <input type="text" name="email" id="email" size="30"/>
                </p>
                <p>Headline:<br/>
                    <input type="text" id="hline" name="headline" size="80"/>
                </p>
                <p>Summary:<br/>
                    <textarea name="summary" id="sum" rows="8" cols="80"></textarea>
                <p>
                    <input type="submit" value="Add" onclick="return doValidate();" name="submit">
                    <input type="submit" name="cancel" value="Cancel">
                </p>
            </form>
        </div>
        <script>
            function doValidate() {
                console.log('Validating...');
                try {
                    var text = "All fields are required";
                    var addr = document.getElementById('email').value;
                    var fname = document.getElementById('fname').value;
                    var lname = document.getElementById('lname').value;
                    var hline = document.getElementById('hline').value;
                    var sum = document.getElementById('sum').value;
                    // alert("hello" + addr + " " + fname + lname +" "+hline +" " +sum);
                    console.log("Validating addr="+addr);
                    if (fname == null || fname == "" || lname == null || lname == "" || hline == null || hline == "" || sum == null || sum == "") {
                        document.getElementById('error').innerHTML = text;
                        return false;
                    }
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

    if(isset($_POST['submit']))
    {
        $stmt = $conn->prepare('INSERT INTO Profile
            (user_id, first_name, last_name, email, headline, summary)
            VALUES ( :uid, :fn, :ln, :em, :he, :su)');
        $stmt->execute(array(
            ':uid' => $_SESSION['user_id'],
            ':fn' => $_POST['first_name'],
            ':ln' => $_POST['last_name'],
            ':em' => $_POST['email'],
            ':he' => $_POST['headline'],
            ':su' => $_POST['summary'])
        );
        header("Location: index.php");
    }
    elseif(isset($_POST['cancel'])) 
    {
        header("Location: index.php");
    }
?>