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
          
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-image: url('https://img.freepik.com/free-vector/watercolor-nature-background-with-leaves_52683-59449.jpg?w=1380&t=st=1700650086~exp=1700650686~hmac=7ef38e06b188597bccc813b98582061f138ce705f67b273db053989195a8b413');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;

        }

        h1 {
            text-align: center;
        }

        hr {
            border: 1px solid #ccc;
            margin: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .menu-item img {
            max-width: 100px;
            margin-right: 20px;
        }

        .button-container {
            display: flex;
            align-items: center;
        }

        .button, .delete {
            padding: 10px 10px;
            /* background-color: #000102;
            color: #fff; */
            border:none;
            cursor: pointer;
        }

        .button i, .delete i {
            margin-right: 0px;
        }

        .button:hover, .delete:hover {
            background-color: #0056b3;
        }

        .phpbutton {
            
            background-color: green;
            border-radius: 15px;
            border: 5px;
            margin-left: 80%;
            padding: 10px 10px;
            margin-bottom: 50px;
            cursor:pointer;

        }

        .card {

            background-color: rgb(218, 195, 195);
            display: grid;
            position: relative;
            grid-template-rows: auto 1fr;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 10px 20px;

        }
    
        .card img {
            
            position: relative;
            width: 100%;
            height: 50vh;
            border-radius: 15px 0 15px 0;
        }
        
        .details {
            padding: 20px 10px;
            display: grid;
            grid-template-rows: auto 1fr 50px;
            grid-row-gap: 15px;
        }
        .details-sub {
            display: grid;
            grid-template-columns: auto auto;
        }
        .details-sub h5 {
            font-weight: 600;
            font-size: 18px;
        }
        .price {
            text-align: right;
        }
        .details p {
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: rgb(45, 41, 37);
            font-size: 15px;
            line-height: 25px;
            align-self: stretch;
        }
        .details button {
            /* background-color: #cb202d; */
            border: none;
            color: yellow;
            font-size: 15px;
            font-weight: 800;
            width: 50px;
        }

        #menu {
            
            background-image: url('https://img.freepik.com/free-vector/watercolor-nature-background-with-leaves_52683-59449.jpg?w=1380&t=st=1700650086~exp=1700650686~hmac=7ef38e06b188597bccc813b98582061f138ce705f67b273db053989195a8b413');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            grid-gap: 20px 40px;
            min-height: 100vh;

        }

/* ---------------------------------------------------------------------------- */
        
        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control button {
            padding: 10px 20px;
            background-color: black;
            color: yellow;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .quantity-control button:hover {
            background-color: #0056b3;
        }


    </style>
    



</head>
<body>

    <div class="quantity-control">
        
        <h2>Hello <?php if(isset($_SESSION['USER'])) {echo " ".$_SESSION['USER']." !<br> ";} else {echo "RANDOM USER".",<br>";} ?> Welcome to Shop!</h2>
        
    </div>

    
    <hr>
    <h1 align="center">- MENU -</h1>
    <hr>

    <br><br>    


    <div id="menu">


        <div class="card">
            <img
                src="https://themarlenamarie.files.wordpress.com/2020/12/img_1349.jpg?w=1024">
            
            <div class="details">
                
                <div class="details-sub">
                    <h5>English Breakfast Tea</h5>
                    <h5 class="price"> Rs 279</h5>
                </div>

                <p> Enjoy the rich and invigorating flavor of our English Breakfast Tea, a perfect blend to start your day with a refreshing and aromatic cup.
                </p>

                <!-- buttons -->
                <div class="quantity-control">
                    <button class="button" onclick="addtocart(0)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam0" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(0)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>

        </div>




        <div class="card">
            
            <img src="https://themarlenamarie.files.wordpress.com/2020/12/img_1348.jpg?w=1024"
                alt="">
            <div class="details">
                <div class="details-sub">
                    <h5>French Vanilla Tea</h5>
                    <h5 class="price"> Rs 339 </h5>
                </div>
                <p>Delight in the smooth and creamy flavor of French Vanilla Tea, a delightful blend of aromatic black tea and rich vanilla notes.!/p>
                
                <!-- buttons -->
                <div class="quantity-control">
                    <button class="button" onclick="addtocart(1)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam1" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(1)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>
            
            
        </div>




        <div class="card">
            
            <img src="https://themarlenamarie.files.wordpress.com/2020/12/img_1326.jpg?w=1024"
                alt="">
            <div class="details">
                <div class="details-sub">
                    <h5>Moroccan Mint Tea</h5>
                    <h5 class="price"> Rs 259 </h5>
                </div>
                <p>Experience the refreshing taste of Moroccan Mint Tea, a harmonious blend of vibrant green tea and invigorating mint leaves!
                </p>
                    
                <div class="quantity-control">
                    <button class="button" onclick="addtocart(2)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam2" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(2)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>
    
        </div>


        <div class="card">
            <img src="https://themarlenamarie.files.wordpress.com/2020/12/img_1329.jpg?w=1024"
                alt="">
            <div class="details">

                <div class="details-sub">
                    <h5>Apple Spice Tea</h5>
                    <h5 class="price"> Rs 399 </h5>
                </div>

                <p>Indulge in the warm and comforting flavors of Turkey: Apple Spice Tea, a delightful fusion of aromatic spices and crisp apple notes!
                </p>
                    
                <div class="quantity-control">
                    <button class="button" onclick="addtocart(3)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam3" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(3)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>
        </div>



        <div class="card">
            <img src="https://themarlenamarie.files.wordpress.com/2020/12/img_1346.jpg?w=1024"
                alt="pomgt">

            <div class="details">
                <div class="details-sub">
                    <h5>Pomegranate Green Tea</h5>
                    <h5 class="price"> Rs 469 </h5>
                </div>

                <p>Discover the perfect balance of tangy sweetness and smooth green tea with our Pomegranate Green Tea blend. Refreshing and revitalizing
                </p>

                <div class="quantity-control">
                    <button class="button" onclick="addtocart(4)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam4" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(4)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>
        </div>




        <div class="card">
            <img src="https://themarlenamarie.files.wordpress.com/2020/12/img_1347.jpg?w=1024"
                alt="t6">
            <div class="details">

                <div class="details-sub">
                    <h5>Orange Black Tea</h5>
                    <h5 class="price"> Rs 389 </h5>
                </div>

                <p>Experience the bold and zesty combination of robust black tea infused with the bright and citrusy essence of orange.
                </p>

                <div class="quantity-control">
                    <button class="button" onclick="addtocart(5)">
                        <i class="fas fa-plus"></i> +
                    </button>
                    <span id="naam5" style="padding: 7px 7px; font-weight: 900;">0</span>
                    <button class="delete" onclick="deletefromcart(5)">
                        <i class="fas fa-minus"></i> -
                    </button>
                </div>

            </div>

        </div>



    </div>

    <br><br>
    <button class="phpbutton" onclick="send()"> Process Data to PHP </button>

    
    <script>

        let cartcnt = [

            {user: '<?php if(isset($_SESSION['USER'])) {echo "{$_SESSION['USER']}";} else {echo "xxx";} ?>', 
            englishbreakfastteacartcnt: <?php if(isset($_SESSION['englishbreakfasttea'])) {echo "{$_SESSION['englishbreakfasttea']}";} else {echo "0";} ?>, 
            frenchvanillateacartcnt: <?php if(isset($_SESSION['frenchvanillatea'])) {echo "{$_SESSION['frenchvanillatea']}";} else {echo "0";} ?>, 
            moroccanmintteacartcnt: <?php if(isset($_SESSION['moroccanminttea'])) {echo "{$_SESSION['moroccanminttea']}";} else {echo "0";} ?>, 
            applespiceteacartcnt: <?php if(isset($_SESSION['applespicetea'])) {echo "{$_SESSION['applespicetea']}";} else {echo "0";} ?>, 
            pomegranategreenteacartcnt: <?php if(isset($_SESSION['pomegranategreentea'])) {echo "{$_SESSION['pomegranategreentea']}";}else {echo "0";} ?>,
            orangeblackteacartcnt: <?php if(isset($_SESSION['orangeblacktea'])) {echo "{$_SESSION['orangeblacktea']}";} else {echo "0";} ?>}

        ];
        

        function sendDataToServer(data) {

            // Convert the JavaScript array to a JSON string
            const jsonData = JSON.stringify(data);

            fetch('process_data.php', {
                method: 'POST',
                body: jsonData,
                headers: {
                    'Content-Type': 'application/json; charset=utf-8',
                },
            })
            .then(response => {
                if (response.ok) {
                // Request was successful, handle the response if needed
                    return response.text();
                } else {
                // Handle errors
                throw new Error('Network response was not ok');
                }
            })
            .then(responseData => {
                // Handle the response from the server (if any)
                console.log('Server response:', responseData);
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }


        function send() { 
            
            if(cartcnt[0].user != 'xxx') {
                sendDataToServer(cartcnt);
                window.location.replace("http://localhost/php_program/newproject/cart.php#");
            }  
            else{
                // redirect to login page
                window.location.replace("http://localhost/php_program/newproject/join.php#");
                console.error("login first!");
            }
            
        }


        function updatecart(index) {
            
            switch(index) {
                
                case 0: 
                    document.getElementById("naam0").innerHTML = `${cartcnt[0].englishbreakfastteacartcnt}`;
                break;

                case 1: 
                    document.getElementById("naam1").innerHTML = `${cartcnt[0].frenchvanillateacartcnt}`;
                break;

                case 2: 
                    document.getElementById("naam2").innerHTML = `${cartcnt[0].moroccanmintteacartcnt}`;
                break;

                case 3: 
                    document.getElementById("naam3").innerHTML = `${cartcnt[0].applespiceteacartcnt}`;
                break;

                case 4: 
                    document.getElementById("naam4").innerHTML = `${cartcnt[0].pomegranategreenteacartcnt}`;
                break;

                case 5: 
                    document.getElementById("naam5").innerHTML = `${cartcnt[0].orangeblackteacartcnt}`;
                break;

            }
                
        }


        function addtocart(index) {
            
            switch(index) {
                case 0: 
                    cartcnt[0].englishbreakfastteacartcnt ++;
                break;

                case 1: 
                    cartcnt[0].frenchvanillateacartcnt ++;
                break;

                case 2: 
                    cartcnt[0].moroccanmintteacartcnt ++;
                break;  

                case 3: 
                    cartcnt[0].applespiceteacartcnt ++;
                break;

                case 4: 
                    cartcnt[0].pomegranategreenteacartcnt ++;
                break;

                case 5: 
                    cartcnt[0].orangeblackteacartcnt ++;
                break;  
            }
            
            updatecart(index);
        }

        function deletefromcart(index) {

                    
            switch(index) {
                
                case 0: 
                if(cartcnt[0].englishbreakfastteacartcnt > 0)  {
                    cartcnt[0].englishbreakfastteacartcnt --;
                }
                break;

                case 1:
                if(cartcnt[0].frenchvanillateacartcnt > 0) {
                    cartcnt[0].frenchvanillateacartcnt--;
                }
                break;

                case 2: 
                    if(cartcnt[0].moroccanmintteacartcnt > 0) {
                        cartcnt[0].moroccanmintteacartcnt--;
                    }
                break;

                case 3: 
                if(cartcnt[0].applespiceteacartcnt > 0)  {
                    cartcnt[0].applespiceteacartcnt --;
                }
                break;

                case 4:
                if(cartcnt[0].pomegranategreenteacartcnt > 0)  {
                    cartcnt[0].pomegranategreenteacartcnt--;
                }
                break;

                case 5: 
                    if(cartcnt[0].orangeblackteacartcnt > 0) {
                        cartcnt[0].orangeblackteacartcnt--;
                    }
                break;
                    
            }

            updatecart(index);

        }

        

    </script>



</body>

</html>
