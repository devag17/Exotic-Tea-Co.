<?php

session_start();



// Get the JSON data from the request body
$data = file_get_contents('php://input');
file_put_contents('received_data.txt', $data); // Save the received data to a file
header("Access-Control-Allow-Origin: http://localhost");  // Replace with your local server address
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");


echo "data is: ".$data."<br>";

// Decode the JSON data into a PHP array
$cartData = json_decode($data, true);



// Now you can work with the $cartData array in PHP
// For example, you can insert it into a database, perform calculations, etc.

$conn = mysqli_connect("localhost:3306","root","","wbdevdb");

if($conn) {
    echo "connection successful<br>";
}
else{
    die("error".mysqli_connect_error());
}



if ($cartData == NULL) {
    file_put_contents('error_log.txt', json_last_error_msg());
    die('Error decoding JSON data.');
}


foreach($cartData as $item) {

    $username = $_SESSION['USER'];

    $englishbreakfast = $item['englishbreakfastteacartcnt'];
    $_SESSION['englishbreakfasttea'] = $englishbreakfast;

    $frenchvanilla = $item['frenchvanillateacartcnt'];
    $_SESSION['frenchvanillatea'] = $frenchvanilla;

    $moroccanmint = $item['moroccanmintteacartcnt'];
    $_SESSION['moroccanmint'] = $moroccanmint;

    $applespice = $item['applespiceteacartcnt'];
    $_SESSION['applespicetea'] = $applespice;

    $pomegranategreen = $item['pomegranategreenteacartcnt'];
    $_SESSION['pomegranategreentea'] = $pomegranategreen;

    $orangeblack = $item['orangeblackteacartcnt'];
    $_SESSION['orangeblacktea'] = $orangeblack;


    $total = ($englishbreakfast*279) + ($frenchvanilla*339) + ($moroccanmint*259) + ($applespice*399) + ($pomegranategreen*469) + ($orangeblack*389);
    $totalwithGST = $total + 0.18*($total);


    $q = "UPDATE usercart SET englishbreakfasttea=$englishbreakfast, frenchvanillatea=$frenchvanilla, 
    moroccanminttea=$moroccanmint, applespicetea=$applespice , pomegranategreentea=$pomegranategreen ,orangeblacktea=$orangeblack,
    totalwithGST=$totalwithGST WHERE username='$username'";
    mysqli_query($conn,$q);

}



echo "data inserted";



// Respond to the client (optional)
echo 'Data received and processed on the server.';

?>
