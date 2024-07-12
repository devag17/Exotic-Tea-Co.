<?php


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

$conn = mysqli_connect("localhost:3308","root","","manandb");

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

    $username = $item['user'];
    $burgers = $item['b_quantity'];
    $pizza = $item['p_quantity'];
    $milkshake = $item['ms_quantity'];
    $total = ($burgers*60) + ($pizza*140) + ($milkshake*80);
    $totalwithGST = $total + 0.18*($total);


    $q = "UPDATE usercart SET Q_burger=$burgers, Q_pizza=$pizza, Q_milkshake=$milkshake, totalwithGST=$totalwithGST WHERE username='$username'";
    mysqli_query($conn,$q);

}



echo "data inserted";



// Respond to the client (optional)
echo 'Data received and processed on the server.';

?>
