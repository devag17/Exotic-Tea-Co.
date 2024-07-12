<?php
    session_start();   
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
            font-family:Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: black;
            margin-top: 20px;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: lightgray;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px; 
            overflow: hidden;
        }

        th, td {

            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            color: darkslategray;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:hover {
            background-color: #e0f7fa; /* Light blue on hover */
        }

        tfoot tr:nth-child(odd) {
            background-color: #ffe0b2; /* Light orange for odd rows in footer */
        }

        tfoot td {
            font-weight: bold;
            color: #333;
        }


        .btn1 {
            color:yellow;
            background-color: red;
            padding: 20px 20px;
            border: none;
            border-radius: 5px;
            margin-left: 66%;
            cursor: pointer;
            font-size: medium;
        }

        .btn1:hover {
            background-color: green;
            color: white;
            font-size: larger;
        }

        .btn2 {
            color:black;
            background-color: cornflowerblue;
            padding: 15px 15px;
            border: none;
            border-radius: 5px;
            margin-left: 45%;
            cursor: pointer;
        }

        .btn2:hover {
            background-color: lightgreen;
        }


    </style>

    <?php
        
        $allempty = empty($_SESSION['englishbreakfasttea']) && empty($_SESSION['frenchvanillatea']) && 
        empty($_SESSION['moroccanminttea']) && empty($_SESSION['applespicetea']) && empty($_SESSION['pomegranatetea']) && 
        empty($_SESSION['orangeblacktea']);

        if($allempty) {
            echo "<h1> CART IS EMPTY !</h1>";
            exit();
        }

    ?>

</head>
<body>
    

    <h2 id="user" align="center" style="color: black; padding:5px 5px">
        HELLO
        <?php echo $_SESSION['USER'] ?>
        ! <br><br> Here is your Bill :
    </h2>
    


    <table border="2px" cellpadding = 10px cellspacing = 0px width="50%"> 
        
        <thead align="center" style="font-weight: bold;">
            
            <tr>
                <td> ITEM </td>
                <td> QUANTITY  </td>
                <td> PRICE (per unit) </td>
            </tr>
            
        </thead>

        <tbody align="center">

            <?php   

                $menuItems = array(
                    'englishbreakfasttea' => 279,
                    'frenchvanillatea' => 339,
                    'moroccanminttea' => 259,
                    'applespicetea' => 399,
                    'pomegranategreentea' => 469,
                    'orangeblacktea' => 389
                );


                foreach($menuItems as $item => $price) {

                    $quantity = isset($_SESSION[strtolower(str_replace(' ', '', $item))]) ? $_SESSION[strtolower(str_replace(' ', '', $item))] : 0;
                    if($quantity > 0 ){
                        
                        echo "<tr>";
                        echo "<td> {$item} </td>";
                        echo "<td> {$quantity} </td>";
                        echo "<td> {$price} </td>";
                        echo "</tr>";

                    }

                }
                

            ?>

       
        </tbody>
        
        <tfoot align="center">
    
            <tr>
                <td>Total MRP</td>
                <td colspan="2"> 
                    <?php
                       
                        $total = $_SESSION['englishbreakfasttea']*279 + $_SESSION['frenchvanillatea']*339 + $_SESSION['moroccanminttea']*259 +
                        $_SESSION['applespicetea']*399 + $_SESSION['pomegranategreentea']*469 + $_SESSION['orangeblacktea']*389;
                        echo "Rs. {$total}";
                        
                        
                    ?> 
                </td>
            </tr>

            <tr>
                <td>TOTAL Amount (18% GST included)</td>
                <td colspan="2" > 
                    <?php
                        $total = $_SESSION['englishbreakfasttea']*279 + $_SESSION['frenchvanillatea']*339 + $_SESSION['moroccanminttea']*259 +
                        $_SESSION['applespicetea']*399 + $_SESSION['pomegranategreentea']*469 + $_SESSION['orangeblacktea']*389;
                        $totalwithGST = $total*0.18 + $total;
                        echo "Rs. {$totalwithGST}";
                    ?> 
                </td>
            </tr>

        </tfoot>
        
    </table>

    <form action="final.php" method="POST">
        <input type="submit" class="btn1" value="place order">
    </form>


    <!--  1. addmore items button -->
    <form action="addtocart.php">
        <input type="submit" value="add more" class="btn2"> 
    </form>

</body>



</html>

