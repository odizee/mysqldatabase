<?php

    session_start();

    include("connection.php");
    include("functions.php");
    if (isset($_POST['submit']))
    {
        if (mysqli_query($con, "UPDATE user SET password='$_POST[password]' WHERE email='$_POST[email]'"))
        {
            ?>
            <script type="text/javascript">
                alert("password update successfully")
            </script>
            <?php
                    
        }
        header("Location: login.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    
    <style type="text/css">
        #text{
            height: 25px;
             border-radius: 5px;
             padding: solid thin #aaa;
             width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
        a{
            padding: 5px;
            width: 100px;
            color: white;
            background-color: red;
            border: none;
            text-decoration: none;
        }
    </style>

    <div id="box">
        <form action="" method="post">
        <div style="font-size: 20px;margin: 10px;color:white">Change Password</div>

            <input id="text" type="email" name="email"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" name="submit" value="Submit"><br><br>
            <a href="signup.php">Click to Signup</a>
        </form>
    </div>
</body>
</html>