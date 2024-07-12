<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="codecss.css" />
    <title>floralbakehouse</title>


    <style>

        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }


        .mid{
            padding: 50px 50px;
            margin-left: 35%;
            margin-top: 50px;
            margin-bottom: 120px;
            
        }


    </style>    


    <script>
        
        const urlParams = new URLSearchParams(window.location.search);
        const loginSuccess = urlParams.get('login_success');
        
        if (loginSuccess === 'true') {
            <?php $_SESSION['logined'] = true ?>
        }

    </script>


    <script>
        
        function redirect() {
            window.location.replace("http://localhost/php_program/newproject/addtocart.php");
        }

    </script> 


</head>

<body>      


    <link rel="preconnect" href="https://fonts.googleapis.com">


    <div class="container">

        <header id="home" class="header-initial">

            <nav id="navbar">
                <div class="logo"><em><span style="font-family: Georgia, 'Times New Roman', Times, serif;">Floral Bakehouse</span></em></div>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="http://localhost/php_program/newproject/addtocart.php">Menu</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="http://localhost/php_program/newproject/cart.php">Cart</a></li>
                    <li><a href="http://localhost/php_program/newproject/logout.php">Logout</a></li>
                    <li>
                        <?php 
                            if($_SESSION['logined'] == true && isset($_SESSION['USER'])) {
                                echo $_SESSION['USER'];
                            }
                            else{
                                echo '<a href="http://localhost/php_program/newproject/join.php">Login</a>';
                            }  
                        ?>
                    </li>
                </ul>
            </nav>
            
           

            <div class="overlay">
                <section id="home">
                    <h1 class="h-primary">Welcome to Floral Bakehouse</h1>
                    <br>
                    <p>Welcome to the Floral Bakehouse, where every delightful creation is crafted with love and blossoms with flavor.
                         Explore our exquisite confections and let nature's beauty and deliciousness enchant your senses!
                    </p>
                    <button class="btn" onclick="redirect()">Order Now</button>
                </section>
            </div>
            
        </header>

        <br>
        <div id="about">
            <h1 class="title">About us</h1>
            <div class="about_row">

                <div class="about_column">
                    <p>At Floral Bakehouse, we seamlessly merge the art of baking with the alluring 
                        beauty of nature. Our story is one of dedication and a profound love for the
                        culinary craft. Inspired by the elegance of flowers, we infuse each creation 
                        with a touch of botanical wonder. Our talented bakers and confectioners meticulously
                        craft treats that are not just delicious but also visually captivating. Every cupcake
                        , cake, or pastry that emerges from our ovens is a masterpiece designed to evoke joy and
                        satisfaction. We insist on using only the freshest, highest-quality natural ingredients,
                        ensuring that every bite is a testament to our unwavering commitment to quality. Floral
                        Bakehouse is more than a bakery; it's a place where delectable flavors meet delightful
                        aesthetics. Our promise is to keep innovating and creating, allowing you to savor the 
                        enchantment of our floral-inspired treats. Join us on a journey through a world of flavors
                        that celebrate the beauty of nature, and thank you for making Floral Bakehouse your culinary 
                        destination.
                    </p>

                    <button id="btn1">learn more</button>

                </div>


                <div class="about_column">
                    <img src="https://img.freepik.com/free-photo/chef-making-ok-sign-white-background_1368-2804.jpg?w=2000" alt="">
                </div>

            </div>
        </div>


    </div>

    <hr>
    
    <div class="mid">   
        
        <h3>How was your experience ?</h3>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>

    </div>    



    </div>


    <script>
        const stars = document.querySelectorAll('.rating input');
      
        stars.forEach((star, index) => {
          star.addEventListener('change', () => {
            for (let i = 0; i <= index; i++) {
              stars[i].checked = true;
            }
          });
        });
    </script>
      
        
   

</body>

</html>