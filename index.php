<?php
    session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY WEBSITE</title>
</head>
<body>

<style type="text/css">

        body{
            font-family: Courier;
        }
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
            position: relative;
            width: 100px;
            color: white;
            background-color: red;
            border: none;
            text-decoration: none;
            top: 15px;
            margin: 2px;
            display: block;
            text-align: center;
            text-transform: uppercase;
        }

        .btn{
            position: relative;
            top: 0px;
            padding: 5px 20px;
            background-color: red;
            cursor: pointer;

        }
        h2,h1{
            margin-top: 50px;
            text-align: center;
        }

        .table{
            display: flex;
            justify-content: center;
        }

        .container{
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .logout{
            display: flex;
            justify-content: center;

            
        }

        label{
            font-family: monospace;
        }

        tbody{
            font-family: monospace;
            font-weight: bold;
            font-size: 1rem;
        }
    </style>

    <h1>Dashboard</h1>

    <br>
    <h2>Hello, <?php echo ucwords($user_data['user_name']); ?></h2>


    <h2>COURSES</h2>

    <table class="table">
        <tbody>
        <?php include './dashboard/read.php'; ?>
        </tbody>
    </table>

    <div class="container">
    <p>ADD COURSES BELOW</p>
    <form class="form-inline m-2" action="./dashboard/create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" class="form-control m-2" id="name" name="name">
        <button type="submit" class="btn">Add</button>
    </form>
    </div>

    <div class="logout">
        <a href="logout.php" class="logout">logout</a>
    </div>






</body>
</html>