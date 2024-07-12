<?php

    session_start();

    $_SESSION['englishbreakfasttea'] = 0;   
    $_SESSION['frenchvanillatea'] = 0;
    $_SESSION['moroccanminttea'] = 0;
    $_SESSION['applespicetea'] = 0;
    $_SESSION['pomegranategreentea'] = 0;
    $_SESSION['orangeblacktea'] = 0;
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body {
            background-image: url("https://img.freepik.com/free-vector/watercolor-nature-background-with-leaves_52683-59449.jpg?w=1380&t=st=1700650086~exp=1700650686~hmac=7ef38e06b188597bccc813b98582061f138ce705f67b273db053989195a8b413");
        }

        .order {
            margin-top: 18%;
            font-size: xx-large;
            margin-left: 37%;
            font-size: xx-large;
            font-weight: 600;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:darkgreen;

        }

        .button1 {
            width: 150px;
            padding: 20px 20px;
            background-color: crimson;
            border: none;
            border-radius: 5px;
            margin-left: 42%;
            cursor: pointer;
            color: white;
            font-size: large;
        }

        .button1:hover {
            background-color: lightgreen;
            color:black;
        }

    </style>


</head>
<body>


    <p class="order">
        ORDER PLACED ! <br>
        Thank for visiting !
    </p>

    <form action="http://localhost/php_program/newproject/draft1\index.html">
        <input type="submit" value="Back to Home" class="button1"> 
    </form>
    
</body>
</html>