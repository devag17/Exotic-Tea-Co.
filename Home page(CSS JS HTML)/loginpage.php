<?php
 
    $conn = mysqli_connect('localhost:3308','root','','manandb');
    if($conn) {
        echo "connection successful <br>";
    }
    else{
        die("error".mysqli_connect_error());
    }

    $username = $_POST['luser'];
    $pass = $_POST['lpass'];
    
    if(isset($_POST['login'])) {

        if(!empty($username) && !empty($pass)) {

            $query = "SELECT * FROM credentials WHERE username = '$username' AND password = '$pass'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                echo "user found";
                // to send username to addtocart.html file to pack it in json file
                header("Location: addtocart.html?username=" . urlencode($username));
                exit();

            }
            else{

                die("User not found!");
               
            }
        }
        else{
            die("enter credentials");
        }

    }

    mysqli_close($conn);    



?>
