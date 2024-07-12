<?php

    session_start();

    $conn = mysqli_connect('localhost:3306','root','','wbdevdb');
    if(!$conn) {
        die("error".mysqli_connect_error());
    }
    

    $id = $_POST['idname'];
    $pass = $_POST['passname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // filtering and sanitizing the inputs
    $id = htmlspecialchars($id);
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars($address);


    //$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
    // $hashed_password = hash('sha-256', $pass);

    if(isset($_POST['submitbutton'])) {

        if(!empty($id) && !empty($pass) && !empty($phone) && !empty($email) && !empty($address)) {  
            
            $query = "SELECT * FROM credentials WHERE username = '$id'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
                echo "username already taken! <br>";
            }
            else{

                $insertvalues = "INSERT INTO usercart VALUES ('$id', '$hashed_password', 0, 0, 0, 0, 0, 0, 0)";
                $res = mysqli_query($conn, $insertvalues);
                
                $insertcred =  "INSERT INTO credentials VALUES ('$id', '$hashed_password','$email' ,'$address', $phone)";
                $res1 = mysqli_query($conn, $insertcred);

                if($res) {
                    echo "values inserted";
                }   
                else{
                    die("error".mysqli_error($conn));
                }
        
                exit();
            }
        }
        else{
            die("enter credentials");
        }

    
    }

    mysqli_close($conn);

?>


