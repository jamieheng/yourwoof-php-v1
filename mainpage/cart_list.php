<?php

session_start();
include('_config_inc.php');

// $conn = mysqli_connect("localhost", "root", "", "yourwoofAdmin");
//  $select_cart = "SELECT * FROM pet_cart";
//  if(isset($_GET['delete'])){
//     $query = mysqli_query($conn, $select_cart);                     
//     if(mysqli_num_rows($query) > 0){
     
//        while($fetch_cart = mysqli_fetch_assoc($query)){
//          $cart_id = $fetch_cart['cart_id'];
//        }
//         $remove_id = $cart_id;
//         mysqli_query($conn, "DELETE FROM `pet_cart` WHERE cart_id = '$remove_id'");
//     }
//  }


if (isset($_GET["logout"])) {
    session_destroy();
    session_unset();
}



?>
<!DOCTYPE html>
<html lang="en">

<style>
    @font-face {
        font-family: "Raleway-regular";
        src: url(./fonts/Raleway-Regular.ttf)
    }

    @font-face {
        font-family: "Raleway-medium";
        src: url(./fonts/Raleway-Medium.ttf)
    }

    @font-face {
        font-family: "Raleway-bold";
        src: url(./fonts/Raleway-Bold.ttf)
    }

    @font-face {
        font-family: "Raleway-extrabold";
        src: url(./fonts/Raleway-ExtraBold.ttf)
    }

    @font-face {
        font-family: "Raleway-semibold";
        src: url(./fonts/Raleway-SemiBold.ttf)
    }

    @font-face {
        font-family: "Raleway-black";
        src: url(./fonts/Raleway-Black.ttf)
    }

    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    section {
        font-family: "Raleway-regular";

        width: 100%;
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .bg-grey {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;

        }

        .card .p-5 {
            font-size: 10px;
        }


    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .card .p-5 {
            font-size: 10px;
        }
    }

    @media (max-width: 600px) {
        .card .p-5 {
            font-size: 10px;
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourWoof - Cart</title>
    <link rel="icon" type="image/icon" sizes="16x16" href="./images/yourwoof16x16.png">
    <link rel="apple-icon" type="image/icon" href="./images/yourwoof180x180-apple.png">
    <link rel="icon" type="image/icon" href="./images/yourwoof512x512.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <!-- main css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script> 



</head>

<body>


    <div class="main-wrapper">

        <div class="nav-background">
            <div class="mobile-logo">
                <img src="./icons/logo.svg" alt="">
            </div>
            <div class="mobile-nav">

                <div class="nav-top">
                    <ul>
                        <li>
                            <a href="#">HOME</a>
                        </li>

                        <li>
                            <a href="#adopt">ADOPT</a>
                        </li>
                        <li>
                            <a href="#rescue">RESCUE</a>
                        </li>
                        <li>
                            <a href="#getinvolved">GET INVOLVED</a>
                        </li>

                        <li>
                            <a href="#donate">CART</a>
                        </li>
                        <li>
                            <a href="#contact">CONTACT US</a>
                        </li>
                        <li>
                            <a href="#">LOG IN</a>
                        </li>
                        <li>
                            <a href="#">REGISTER</a>
                        </li>

                    </ul>
                </div>
                <div class="contact flex items-center">
                    <img src="./icons/phone.svg" alt="">
                    <div>
                        <h5>Call us: (+855) 12 345 6789</h5>
                        <h6>E-mail : yourwoof@gmail.com</h6>
                    </div>
                </div>
                <div class="time flex items-center">
                    <img src="./icons/clock.svg" alt="">
                    <div>
                        <h5>Working Hours:</h5>
                        <h6>Mon - Sat (8.00am - 5.00pm)</h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-content-wrapper">
            <div class="nav-trigger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart">
                    <line x1="12" y1="20" x2="12" y2="10" />
                    <line x1="18" y1="20" x2="18" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="16" />
                </svg>
            </div>

            <div class="site-content">
                <header class="topbar">
                    <div class="container flex justify-between items-center">


                        <div class="icons">
                            <a href="#"><img src="./icons/facebook.svg" alt=""></a>
                            <a href="#"><img src="./icons/twitter.svg" alt=""></a>
                            <a href="#"><img src="./icons/google.svg" alt=""></a>
                            <a href="#"><img src="./icons/instagram.svg" alt=""></a>
                            <a href="#"><img src="./icons/search.svg" alt=""></a>
                        </div>


                        <div class="auth flex items-center">

                            <a href="./cart_list.php" style="color: aliceblue; text-decoration: none; "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
                                    <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Cart <span style="color: #BF94E4;"> 
                                <?php
                                if (isset($_SESSION['username'])){
                                    $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM pet_cart");
                                    if ($select_rows && $row = mysqli_fetch_assoc($select_rows)) {
                                        $total_rows = $row['total_rows'];
                                        // echo "Total rows in cart: " . $total_rows;
                                        if($total_rows > 0){
                                            echo $total_rows;
                                        } else {
                                            echo "0";
                                        }
                                    } else {
                                        echo "<script>alert('Error getting total rows from cart.');</script>";  }
                                    

                                } else echo "0";
                                
                               
                                ?>
                            <span class="divider">|</span>


                            <?php
                            if (isset($_SESSION['username'])) {
                            ?>
                                <div>


                                    <a href="#">
                                        <?php echo ($_SESSION['username']); ?>
                                    </a>
                                    <span class="divider">|</span>
                                    <a href="/woof/login.php?logout" class="btn-logout">
                                        <img src="./icons/edit.svg" alt="_blank">
                                        <span>Logout</span>
                                    </a>
                                </div>
                            <?php
                            } else {
                            ?>

                                <div>
                                    <img src="./icons/user-icon.svg" alt="">
                                    <a href="/woof/login.php">Log in</a>

                                </div>
                                <span class="divider">|</span>

                                <div>
                                    <img src="./icons/edit.svg" alt="_blank">
                                    <a href="/woof/register.php">Register Now</a>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>

                </header>




                <nav>
                    <div class="top">
                        <div class="container flex justify-between">
                            <div class="contact flex items-center">
                                <img src="./icons/phone.svg" alt="">
                                <div>
                                    <h5>Call US: (+84) 123 456 789</h5>
                                    <h6>E-mail : yourwoof@gmail.com</h6>
                                </div>
                            </div>
                            <div class="branding">
                                <img src="./icons/logo.svg" alt="">
                            </div>
                            <div class="time flex items-center">
                                <img src="./icons/clock.svg" alt="">
                                <div>
                                    <h5>Working Hours:</h5>
                                    <h6>Mon - Sat (8.00am - 5.00pm)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar magic-shadow">
                        <div class="container flex justify-center">

                            <a href="./index.php" class="active">HOME</a>

            
                        </div>
                    </div>
                </nav>


                <!-- welcome -->
                

                <section class="h-100 h-custom">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-lg-12">
                                                <div class="p-5">
                                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                                        <h1 class="fw-bold mb-0 text-black"> Cart <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                            </svg>
                                                        </h1>

                                                        <h6 class="mb-0 text-muted">
                                                            <?php
                                                        if (isset($_SESSION['username'])){
                                                            $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM pet_cart");
                                                            if ($select_rows && $row = mysqli_fetch_assoc($select_rows)) {
                                                                $total_rows = $row['total_rows'];
                                                            
                                                                if($total_rows > 0){
                                                                    echo $total_rows;
                                                                } else {
                                                                    echo "0";
                                                                }
                                                            }
                                                            
                                                        } else echo "0";
                                                        
                                                        ?>
                                                            pets
                                                        </h6>
                                                    </div>



                                                    <hr class="my-8">

                                                    <?php 
                                                
                                                $query = mysqli_query($conn, $select_cart);
                                                
                                                if(mysqli_num_rows($query) > 0){
                                                    
                                                    while($fetch_cart = mysqli_fetch_assoc($query)){
                                                        $pet_id = $fetch_cart['pet_id'];
                                                        $pet_name = $fetch_cart['pet_name'];
                                                        
                                                        $pet_image = $fetch_cart['pet_image'];

                                                ?>
                        
                        

                                                    <div class="row mb-5 d-flex justify-content-between align-items-center" id="text">
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img src="../admin_panel/uploads/<?php echo $fetch_cart['pet_img']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                                            <h6 class="text-muted">Pet Name</h6>
                                                            <h6 class="text-black mb-0"><?php echo $fetch_cart['pet_name']; ?></h6>
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <h6 class="text-muted">Breed</h6>
                                                            <h6 class="text-black mb-0"><?php echo $fetch_cart['breed']; ?></h6>
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                                            <h6 class="text-muted">Gender</h6>
                                                            <h6 class="text-black mb-0"><?php echo $fetch_cart['gender']; ?></h6>
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                                            <h6 class="text-muted">Age</h6>
                                                            <h6 class="text-black mb-0"><?php echo $fetch_cart['age']; ?></h6>
                                                        </div>
                                                       
                                                    </div>

                                                    <hr class="my-8">

                                                    <?php
                        
                                                        };
                                                    }
                                                    else echo "Cart Empty";
                                                    ?>

                                                    <div class="pt-5 ">
                                                    
                                                        <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark"><a href="./payment.php" style="text-decoration:none" onMouseOver="this.style.color='#BF94E4'" onMouseOut="this.style.color='#FEFEFE'">Checkout</a></button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <footer>
                    <div class="container">
                        <div class="box">
                            <h3>About us</h3>
                            <p>Yourwoof was created by Veiy Sokheng and In Sothiry, sophomores(GEN8) of IT Engineering Department, RUPP
                                est. 2023 for their project practicum.
                            </p>
                            <button class="btn btn-primary">Read More</button>
                        </div>
                        <div class="box">
                            <h3>Quick Links</h3>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#adopt">Adopt</a>
                                </li>
                                <li>
                                    <a href="#getinvolved">Get Involved</a>
                                </li>

                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                                <li>
                                    <a href="#">Contact us</a>
                                </li>

                            </ul>
                        </div>
                        <div class="box">
                            <h3>Follow Us</h3>
                            <div>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/codersgyan">
                                            <img src="./icons/facebook.svg" alt="">
                                            <span>Facebook</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/CoderGyan">
                                            <img src="./icons/twitter.svg" alt="">
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./icons/google.svg" alt="">
                                            <span>Google +</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/codersgyan/">
                                            <img src="./icons/instagram.svg" alt="">
                                            <span>Instagram</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </footer>
                <footer class="copyright">
                    <div>
                        Copyright © 2023 .All rights reserved by <a href="https://www.instagram.com/fromm_hengie/">Veiy Sokheng </a>
                        & <a href="https://www.instagram.com/insothiry/">In Sothiry </a>
                    </div>
                </footer>
            </div>
        </div>
    </div>



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 
    <script src="js/app.js"></script>
    <script src="js/numberCounterScroll.js"></script>
</body>

</html>


























