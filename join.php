<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>


    <style>
       
       @import url('https://fonts.googleapis.com/css?family=Roboto');

        * {
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            color: #4CAF50;
            text-align: center;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

       
        a {
            color: #4CAF50;
            text-decoration: none;
        }

        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        div {
            margin-top: 5%;
            margin-left: 33%;
            width: 30%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 20px;
        }

    </style>


</head>
<body>


    <div id="loginForm">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" placeholder="EnterLOGINusername" name="luser"><br><br>
            <input type="password" placeholder="EnterLOGINpassword" name="lpass"><br><br>
            <input type="submit" value="Login" name="login">
        </form>
        <p>Don't have an account? <a href="#" onclick="showRegistrationForm()">Register</a></p>
    </div>

    <div id="registrationForm" style="display: none;">
        <h2>Registration</h2>
        <form action="registration.php" method="POST">
            <input type="text" placeholder="Enter username" name="idname"><br><br>
            <input type="password" placeholder="Enter password" name="passname"><br><br>
            <input type="email" placeholder="Enter email" name="email">
            <input type="number" placeholder="Enter phone" name="phone">
            <input type="textfield" placeholder="Enter address" name="address">
            <input type="submit" value="Register" name="submitbutton">
        </form>
        <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
    </div>

    <script>
        function showRegistrationForm() {
            document.getElementById("loginForm").style.display = "none";
            document.getElementById("registrationForm").style.display = "block";
        }

        function showLoginForm() {
            document.getElementById("loginForm").style.display = "block";
            document.getElementById("registrationForm").style.display = "none";
        }
    </script>
</body>
</html>
