<?php
include('connection.php');
require 'checker.php';
redirectIfLoggedIn();

if(isset($_POST['log-in']))
{
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM `admin`";
    $result = $con->query($sql);
    if(!$result){
        die("Invalid Query: " .$connection->error);
    }
    while($row = $result->fetch_assoc())
    {
        if($username == $row['username'] && $password == $row['password'])
        {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('Location:admin.php');
        }
        else
        {?>
        <script>
            alert("Wrong Username or Password");
        </script>
        <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: whitesmoke;
            margin: 0;
            padding: 0 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 420px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            color: #444;
            text-align: left;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #ff758c;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 117, 140, 0.5);
        }

        .reserve {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }

        .reserve:hover {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            box-shadow: 0 6px 12px rgba(255, 117, 140, 0.5);
        }

        input, button {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Log In</h2>
        <div class="formbx">
            <form action="log-in.php" method="post" class="signinform">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required>

                <label for="Password">Password:</label>
                <input type="password" id="pass" name="pass" required>
                
                <input type="submit" name="log-in" class= "reserve" value= "Log In" >
                
            </form>
        </div>
    </div>
</body>
</html>