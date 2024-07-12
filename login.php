<?php
    
    session_start();


    $conn = mysqli_connect('localhost:3306','root','','wbdevdb');
    if(!($conn)) {
        die("error".mysqli_connect_error());
    }


    $username = $_POST['luser'];
    $pass = $_POST['lpass'];

    
    // creating session variable 
    $_SESSION["USER"] = $username;
    
    
    if(isset($_POST['login'])) {

        if(!empty($username) && !empty($pass)) {

            $query = "SELECT * FROM credentials WHERE username = '$username'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                // verify password
                $rows = mysqli_fetch_array($result);
                $hashedpass = $rows['password'];


                if(password_verify ($pass, $hashedpass)) {
                    $_SESSION['logined'] = true;
                    header("Location: http://localhost/php_program/newproject/code.php?login_success=true", true, 301);
                    exit();
                }
                else{
                    echo "wrong password";
                }

            }
            else{
                $_SESSION['logined'] = false;
                die("User not found!");
            }
        }
        else{
            die("enter credentials");
        }

    }

    mysqli_close($conn);    

?>
