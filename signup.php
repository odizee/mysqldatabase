<?php
    session_start();

    include("connection.php");
    include("functions.php");
    

    if (isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = array();

        $u = "SELECT user_name FROM user WHERE user_name='$user_name'";
        $uu = mysqli_query($con,$u);

        $e = "SELECT email FROM user WHERE email='$email'";
        $ee = mysqli_query($con,$u);


        if(empty($user_name)){
            $errors['u'] = "Username Required";
        } else if(mysqli_num_rows($uu) > 0){
            $errors['u'] = "Username Exists";
        }

        if (empty($email)) {
            $errors['e'] = "Email Required";
        }else if(mysqli_num_rows($ee) > 0){
            $errors['e'] = "Email Exists";
        }

        if (empty($password)) {
            $errors['p'] = "Password Required";
        }

        if (count($errors) == 0) {
            
            $user_id = random_num(20);
            $query = "insert into user (user_id, user_name, email, password) values('$user_id', '$user_name', '$email', '$password')";

            $result = mysqli_query($con,$query);

            if ($result) {
                echo "<script>alert('done')</script>";
                header("Location: login.php");

            }else{
                echo "<script>alert('failed')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
        <div style="font-size: 20px;margin: 10px;color:white">Signup</div>

            <input id="text" type="text" name="user_name" autocomplete="off" placeholder="Enter Username">
            <p><?php if(isset($errors['u'])) echo $errors['u'];?></p>
            <br><br>
            <input id="text" type="email" name="email" autocomplete="off" placeholder="Enter Email">
            <p><?php if(isset($errors['e'])) echo $errors['e'];?></p>
            <br><br>
            <input id="text" type="password" name="password" autocomplete="off">
            <p><?php if(isset($errors['p'])) echo $errors['p'];?></p>
            <br><br>

            <input id="button" type="submit" value="Signup" name="submit"><br><br>
            <a href="login.php">Click to Login</a>
        </form>
    </div>
</body>
</html>