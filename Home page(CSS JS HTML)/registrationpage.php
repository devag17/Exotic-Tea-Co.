<?php

    $conn = mysqli_connect('localhost:3308','root','','manandb');
    if($conn) {
        echo "connection successful <br>";
    }
    else{
        die("error".mysqli_connect_error());
    }

    // $createtable = "CREATE TABLE usercart (username varchar(55) primary key, 
    // password varchar(12), Q_burger int, Q_pizza int, Q_milkshake int, totalwithGST int)";   
    // mysqli_query($conn, $createtable);

    // $createusertable = "CREATE TABLE credentials (username varchar(55) primary key, password varchar(12),
    // email varchar(40), address varchar(100), phoneNo bigint)";
    // mysqli_query($conn, $createusertable);

    $id = $_POST['idname'];
    $pass = $_POST['passname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    //$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    if(isset($_POST['submitbutton'])) {

        if(!empty($id) && !empty($pass) && !empty($phone) && !empty($email) && !empty($address)) {  
            
            $query = "SELECT * FROM credentials WHERE username = '$id'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
                echo "username already taken! <br>";
            }
            else{

                $insertvalues = "INSERT INTO usercart VALUES ('$id', '$pass', 0, 0, 0, 0)";
                $res = mysqli_query($conn, $insertvalues);
                
                $insertcred =  "INSERT INTO credentials VALUES ('$id', '$pass','$email' ,'$address', $phone)";
                $res1 = mysqli_query($conn, $insertcred);

                if($res) {
                    echo "values inserted";
                }   
                else{
                    die("error".mysqli_error($conn));
                }

                // to send username to addtocart.html file to pack it in json file
                header("Location: addtocart.html?username=" . urlencode($id));
                exit();
            }
        }
        else{
            die("enter credentials");
        }

    
    }

    mysqli_close($conn);

?>


