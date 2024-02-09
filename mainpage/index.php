<?php

session_start();
include('_config_inc.php');
$conn = mysqli_connect("localhost", "root", "", "yourwoofAdmin");
if (isset($_GET["logout"])) {
    session_destroy();
    session_unset();
}
$select_cart = "SELECT * FROM pet_cart";



if (isset($_POST['remove'])) {
    $query = mysqli_query($conn, $select_cart);
                                                            
     if(mysqli_num_rows($query) > 0){
     while($fetch_cart = mysqli_fetch_assoc($query)){
     $remove_id = $fetch_cart['cart_id']; }
    
    
    if (!empty($remove_id)) {
        // Delete the item with the specified cart_id
        mysqli_query($conn, "DELETE FROM `pet_cart` WHERE cart_id = '$remove_id'");
    
        header("location: index.php?pet_removed=1");
        } 
         
     } 
}
if (isset($_GET['pet_adopted']) && $_GET['pet_adopted'] == 1) {
    echo "<script>alert('Pet adopted successfully!');</script>";

}

if (isset($_GET['pet_added_to_cart']) && $_GET['pet_added_to_cart'] == 1) {
    echo "<script>alert('Pet added to cart successfully!');</script>";

}

if (isset($_GET['pet_not_added_to_cart']) && $_GET['pet_not_added_to_cart'] == 1) {
    echo "<script>alert('You can only add one pet to cart at a time.');</script>";
}


if (isset($_GET['pet_removed']) && $_GET['pet_removed'] == 1) {
    echo "<script>alert('Pet removed from cart successfully!');</script>";

}





?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourWoof shelter</title>
    <link rel="icon" type="image/icon" sizes="16x16" href="./images/yourwoof16x16.png">
    <link rel="apple-icon" type="image/icon" href="./images/yourwoof180x180-apple.png">
    <link rel="icon" type="image/icon" href="./images/yourwoof512x512.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <!-- main css -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="./css/stylesheet.css">
   
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

                            <!-- copy -->
                            <a href="#" id="cart-icon" style="color: aliceblue; text-decoration: none; "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
                                    <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Cart 
                                <span style="color: #BF94E4;" id="cart-count"> 
                                    <?php
                                   if (isset($_SESSION['username'])){
                                    $username = $_SESSION['username'];
                                    $select_user = "SELECT * FROM register WHERE username = '$username'";
                                    $query_id = mysqli_query($conn, $select_user);
                                    
                                    if ($query_id && $row = mysqli_fetch_assoc($query_id)) { 
                                                $user_id= mysqli_real_escape_string($conn, $row["id"]);
                                    }
                                   
            
                                    $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM pet_cart WHERE user_id =  '$user_id'");
                                    if ($select_rows && $row = mysqli_fetch_assoc($select_rows)) {
                                        $total_rows = $row['total_rows'];
                                        if($total_rows > 0){
                                            echo $total_rows;
                                        
                                        } else {
                                            echo "0";
                                        }
                                    } else {
                                        echo "<script>alert('Error getting total rows from cart.');</script>";  }
                                    

                                    } else echo "0";
                                
                                    ?>
                                </span>
                            </a>
                            <!-- copy -->

                
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


                <!-- popup -->
                <div id="cart-popup" class="popup">
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

                                                            <div class="cart-nav" style="display: flex; align-items: center; margin-bottom: 2rem;">
                                                                <h3 class="fw-bold mb-0 text-black" style="margin-right: 42rem;">
                                                                    
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="32" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                                    </svg>
                                                                </h3>

                                                                <h3>
                                                                    <a id="close-cart-popup" class="close-btn" style="display:block">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16" width="32" height="32">
                                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                        </svg>

                                                                    </a>
                                                                    
                                                                </h3>
                                                            </div>

                                                            

                                                            
                                                            
                                                            <h6 class="mb-0 text-muted">
                                                                <?php
                                                                if (isset($_SESSION['username'])){
                                                                    if (isset($_SESSION['username'])){
                                                                        $username = $_SESSION['username'];
                                                                        $select_user = "SELECT * FROM register WHERE username = '$username'";
                                                                        $query_id = mysqli_query($conn, $select_user);
                                                                        
                                                                        if ($query_id && $row = mysqli_fetch_assoc($query_id)) { 
                                                                                    $user_id= mysqli_real_escape_string($conn, $row["id"]);
                                                                        }
                                                                       
                                                
                                                                        $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM pet_cart WHERE user_id =  '$user_id'");
                                                                        if ($select_rows && $row = mysqli_fetch_assoc($select_rows)) {
                                                                            $total_rows = $row['total_rows'];
                                                                            if($total_rows > 0){
                                                                                echo $total_rows;
                                                                            
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                        } else {
                                                                            echo "<script>alert('Error getting total rows from cart.');</script>";  }
                                                                        }
                                                                        
                                                                    
                                                                } else echo "0";
                                                                
                                                                ?>
                                                                    pets
                                                            </h6>
                                                        </div>
                                                        <hr class="my-8">

                                                        
                                                    <div class="col-lg-12">
                                                        <div class="p-5">
                                                            
                                                            <?php 
                                                            if (isset($_SESSION['username'])){
                                                            $select_cart_by_user_id = "SELECT * FROM pet_cart where user_id = $user_id";
                                                            $query = mysqli_query($conn, $select_cart_by_user_id);
                                                            
                                                            if(mysqli_num_rows($query) > 0){
                                                                
                                                                while($fetch_cart = mysqli_fetch_assoc($query)){
                                                                    $pet_id = $fetch_cart['pet_id'];
                                                                    $pet_name = $fetch_cart['pet_name'];
                                                                    
                                                                    $pet_image = $fetch_cart['pet_image'];
                                                            ?>
                                                            <div class="pet-row">
                                                                <img src="../admin_panel/uploads/<?php echo $fetch_cart['pet_img']; ?>" alt="Pet Image">
                                                                <div class="pet-info">
                                                                    <h6 class="text-muted">Pet Name</h6>
                                                                    <h6 class="text-black mb-0"><?php echo $pet_name; ?></h6>
                                                                </div>
                                                                <div class="pet-info">
                                                                    <h6 class="text-muted">Breed</h6>
                                                                    <h6 class="text-black mb-0"><?php echo $fetch_cart['breed']; ?></h6>
                                                                </div>
                                                                <div class="pet-info">
                                                                    <h6 class="text-muted">Gender</h6>
                                                                    <h6 class="text-black mb-0"><?php echo $fetch_cart['gender']; ?></h6>
                                                                </div>
                                                                <div class="pet-info">
                                                                    <h6 class="text-muted">Age</h6>
                                                                    <h6 class="text-black mb-0"><?php echo $fetch_cart['age']; ?></h6>
                                                                </div>
                                                                <form action="" method="post"> 
                                                                <div class="pet-remove">
                                                                    <!-- <h6 class="text-muted">Remove</h6> -->
                                                                    <button name="remove" type="submit" class="centered-button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" width="16" height="16" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                                    </svg>

                                                                    </button>
                                                                   

                                                                </div>

                                                                </form>
                                                               
                                                              

                                                            </div>
                                                            <hr class="my-8">

                                                            <?php

                                                                };
                                                            }
                                                            else echo "Cart Empty";
                                                        } else "Please login to view your cart";
                                                            ?>

                                                            <div class="pt-5 ">
                                                                <button type="button" class="centered-button" data-mdb-ripple-color="dark"><a href="./payment.php" style="text-decoration:none" onMouseOver="this.style.color='#BF94E4'" onMouseOut="this.style.color='#FEFEFE'">Checkout</a></button>
                                                            </div>
                                                        

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
                    
                </div>

                <style>
                    /* Styles for the cart popup */
                    .popup {
                        position: fixed;
                        padding-left: 15rem;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        display: none;          
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                        z-index: 1000;
                        align-items: center;
                        justify-content: center;
                        overflow: auto; /* Add overflow property */
                        max-height: 100%; /* Limit maximum height to 80% of viewport height */
                        overflow-y: auto;
                    }

                    .popup .card {
                        width: 90%;
                        padding: 2rem;
                        max-width: 800px;
                        border-radius: 15px;
                        background-color: #ffffff;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        overflow: hidden; /* Prevent content overflow */
                    }

                    .popup h1 {
                        font-size: 24px;
                        margin-bottom: 15px;
                    }

                    .popup h6 {
                        font-size: 12px; /* Adjusted font size */
                        margin-bottom: 8px; /* Adjusted margin */
                    }

                    .popup img {
                        max-width: 60px; /* Adjusted image size */
                        height: auto;
                        border-radius: 6px; /* Adjusted border radius */
                    }

                    .popup .row {
                        margin-bottom: 15px;
                        align-items: center;
                    }

                    .popup .col-md-1 {
                        flex: 1;
                        max-width: 10%;
                        text-align: center;
                    }

                    .popup .col-md-2 {
                        flex: 2;
                        max-width: 20%;
                    }

                    .popup .col-lg-2 {
                        flex: 2;
                        max-width: 20%;
                    }

                    .popup .col-xl-2 {
                        flex: 2;
                        max-width: 20%;
                    }

                    .popup .col-md-1 h6,
                    .popup .col-md-2 h6,
                    .popup .col-lg-2 h6,
                    .popup .col-xl-2 h6 {
                        font-size: 10px; /* Adjusted font size */
                        margin-bottom: 3px; /* Adjusted margin */
                    }

                    .popup .col-md-1 h6 {
                        margin-top: 5px;
                    }

                    .popup .col-md-1 svg {
                        fill: #BF94E4;
                        cursor: pointer;
                    }

                    .popup .close-btn {
                        transition: transform 0.3s ease;
                        transform-origin: center;
                    }

                    .popup .close-btn:hover {
                        color: #BF94E4;
                        transform: rotate(90deg);
                    }
                    .pet-row {
                        display: flex;
                        align-items: center;
                        padding: 10px 0;
                        border-bottom: 1px solid #ddd;
                    }

                    .pet-row img {
                        max-width: 60px; /* Adjusted image size */
                        margin-right: 6px; /* Adjusted margin */
                        border-radius: 6px; /* Adjusted border radius */
                    }

                    .pet-info {
                        flex: 1;
                    }

                    .pet-info h6 {
                        margin: 0;
                        font-size: 14px;
                        color: #333;
                    }

                    .pet-info h6.text-muted {
                        color: #888;
                    }

                    .pet-remove {
                        display: flex;
                        align-items: center;
                    }

                    .pet-remove svg {
                        fill: #FFFFFF;
                        cursor: pointer;
                        ;
                    }

                    .pet-remove svg:hover{
                        fill: #BF94E4;

                    }


                    .centered-button {
                        padding:0.75rem 0.75rem;
                        border-radius:4px;
                        -webkit-border-radius:4px;
                        -moz-border-radius:4px;
                        -ms-border-radius:4px;
                        -o-border-radius:4px;
                        line-height:0.8;
                        font-size:1.2rem;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        -webkit-transition: all 0.3s ease;
                        -moz-transition: all 0.3s ease;
                        -ms-transition: all 0.3s ease;
                        -o-transition: all 0.3s ease;
                        border:1px solid transparent;
                        background:#BF94E4;
                        color:#FFFFFF;
                    }

                    .centered-button:hover{
                        background:#FFFFFF;
                        color:#BF94E4;  
                        border:1px solid #BF94E4;
                    }

                    /* Media queries for responsiveness */
                    @media (max-width: 768px) {
                        .popup .card {
                        width: 95%;
                    }
                    }

                </style>

                <script>
                    // Get references to the link and popup elements
                    const cartIcon = document.getElementById("cart-icon");
                    const cartPopup = document.getElementById("cart-popup");
                    const closePopupBtn = document.getElementById("close-cart-popup");

                    // Add a click event listener to the link
                    cartIcon.addEventListener("click", () => {
                        // Display the popup
                        cartPopup.style.display = "block";
                    });

                    // Add a click event listener to the close button
                    closePopupBtn.addEventListener("click", () => {
                        // Hide the popup
                        cartPopup.style.display = "none";
                    });

                </script>
                <!-- popup -->





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

                            <a href="#" class="active">HOME</a>

                            <a href="#adopt">ADOPT</a>
                            <a href="#rescue">RESCUE</a>
                            <a href="#getinvolved">GET INVOLVED</a>
                            <a href="#">
                                DONATE</a>
                            <a href="#contact">CONTACT US</a>
                        </div>
                    </div>
                </nav>


             
                <header class="hero flex items-center">
                    <div class="container ">
                        <div class="welcome flex items-center">
                            <span>Welcome to</span>
                            <img src="./icons/logo-2.svg" alt="">
                        </div>
                        <h1>By every measure, the welfare of animals <br> in <span>Cambodia</span> is in dire need.</h1>
                        <p>With no animal protection laws, animal abuse is widespread, and dogs and cats are snatched
                            from the street to be sold for meat. We envisage a world where all animals are treated with
                            respect. We need you to make this a reality.</p>
                        <div>
                            <button class="btn btn-primary">Read More</button>
                            <button class="btn btn-secondary">Donate Now</button>
                        </div>

                    </div>
                </header>

             

                <section class="top-products">
                    <div class="container">
                        <h1 class="section-heading"><a name="adopt">Adopt</a></h1>
                        <div class="slider">
                            <button class="slider-btn prev-btn"><img src="./icons/pre.svg" alt=""></button>
                            <button class="slider-btn next-btn"><img src="./icons/next.svg" alt=""></button>
                            <div class="food-slider">

                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "yourwoofAdmin");
                                $select = "SELECT * FROM product ORDER BY product_id DESC LIMIT 0,10";
                                $query = mysqli_query($conn, $select);
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <div class="food-card magic-shadow-sm">
                                        <div class="product-image flex items-center justify-center">
                                            <img src="../admin_panel/uploads/<?php echo $row['product_image']; ?>" alt="">
                                        </div>
                                        <hr>
                                        <div>
                                            <h2 class="text-center"><?php echo $row['product_name']; ?></h2>

                                            <div class="price text-center">
                                                <p>
                                                    <?php echo substr($row['product_desc'], 0, 1000); ?>
                                                </p>
                                            </div>
                                            <div class="flex justify-center">
                                                <button>
                                                    <a style="text-decoration: none; " onMouseOver="this.style.color='#BF94E4'" onMouseOut="this.style.color='#FEFEFE'" href=" item_list.php?product_id=<?php echo $row['product_id'] ?>">Get In Touch</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </section>



                <section class="about-meal">
                    <div class="container">
                        <h1 class="section-heading"><a name="rescue">Rescue Dogs Needed</a></h1>
                        <div class="about-meal-wrap flex">
                            <div class="flex-1">
                                <img src="./images/dogowneer.png" alt="">
                            </div>
                            <div class="flex-1">
                                <h2>Loving Forever Home Needed</h2>

                                <p>
                                    YourWoof has animals in need of good homes. They can be abandoned, strays or
                                    sometimes, animals that have challenging conditions and who really need dedicated
                                    people willing to look after them
                                    <span id="dots">...</span><span id="more">
                                        Also, if you cannot adopt any of the animals we often have available at our
                                        Clinic,
                                        we always need people that are willing to Foster a cat or a dog until such time
                                        as a
                                        permanent home can be found.
                                        If you are interested in being a Foster for us please let us know as we always
                                        need
                                        new volunteers.
                                        We update our website regularly but to see our most up to date list of dogs
                                        available for adoption please visit our shelter or give us a call.</span>
                                </p>
                                <button class="btn btn-primary" onclick="myFunction()" id="myBtn">Read more</button>

                                <script>
                                    function myFunction() {
                                        var dots = document.getElementById("dots");
                                        var moreText = document.getElementById("more");
                                        var btnText = document.getElementById("myBtn");

                                        if (dots.style.display === "none") {
                                            dots.style.display = "inline";
                                            btnText.innerHTML = "Read more";
                                            moreText.style.display = "none";
                                        } else {
                                            dots.style.display = "none";
                                            btnText.innerHTML = "Read less";
                                            moreText.style.display = "inline";
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </section>




                <section class="our-services">
                    <div class="container">
                        <h1 class="section-heading"><a name="getinvolved">Get Involved</a></h1>
                        <div class="card-wrapper flex">
                            <div class="service-card magic-shadow-sm">
                                <img src="./images/sponsor.png" alt="">
                                <h2 class="text-primary">Sponsor an Animal</h2>
                                <p>Don't abanbon your pet! Instead, bring it to our shelter to a find a new loving home
                                    for them .</p>
                                <button class="btn btn-primary">Learn More</button>
                            </div>
                            <div class="service-card magic-shadow-sm">
                                <img src="./images/vol.png" alt="">
                                <h2 class="text-primary">Volunteer</h2>
                                <p>Join our team as an animal carer, travelling veterinarian or help in the office to
                                    spread the word.</p>
                                <button class="btn btn-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                </section>




                <section class="big-deal">
                    <div class="container">
                        <h1 class="section-heading text-pure">Number of Dogs in our shelter</h1>
                        <div class="timer">
                            <!-- <div id="counter-container">
                                <span class="count">6,000</span>
                                <span class="count">600</span>
                                <span class="count">60</span>
                            </div> -->
                            <div id="counter-container">
                                <!-- <span class="counter" data-number="150000">05</span> -->
                                <!-- <span class="count">100</span> -->
                                <span class='numscroller' data-min='1' data-max='3' data-delay='5' data-increment='10'>3</span>
                                <span>Male</span>
                            </div>
                            <div id="counter-container">
                                <!-- <span class="counter" data-number="150000">12</span> -->
                                <!-- <span class="count">10</span> -->
                                <span class='numscroller' data-min='1' data-max='1' data-delay='5' data-increment='10'>1</span>
                                <span>Female</span>
                            </div>
                            <div id="counter-container">
                                <!-- <span class="counter" data-number="150000">03</span> -->
                                <!-- <span class="count">02</span> -->
                                <span class='numscroller' data-min='1' data-max='1' data-delay='5' data-increment='10'>1</span>
                                <span>Under 6 months old</span>
                            </div>
                            <div id="counter-container">
                                <!-- <span class="counter" data-number="150000">02</span> -->
                                <!-- <span class="count">20</span> -->
                                <span class='numscroller' data-min='1' data-max='0' data-delay='5' data-increment='10'>0</span>
                                <span>Injured</span>
                            </div>
                        </div>
                    </div>
                </section>




                <section class="subscribe">
                    <div class="container flex items-center">
                        <div>
                            <img src="./images/sublogo.png" alt="">
                        </div>
                        <div>
                            <h1>Subscribe to your newsletter</h1>
                            <p>Hit subcribe bottom to stay in touch with us.</p>
                            <div class="input-wrap">
                                <input type="email" placeholder="yourwoof@gmail.com">
                                <button>Subscribe</button>
                            </div>
                        </div>
                    </div>
                </section>




                <section class="contact-us flex">
                    <div class="contact-info-wrapper">
                        <h1 class="section-heading"><a name="contact">Contact Us</a></h1>
                        <div class="contact-info">
                            <div>
                                <div>
                                    <img src="./icons/phone-2.svg" alt="">
                                    <div>
                                        <span>Call us:</span>
                                        <span>(+855) 12 345 6789</span>
                                    </div>
                                </div>
                                <div>
                                    <img src="./icons/email.svg" alt="">
                                    <div>
                                        <span>E-mail :</span>
                                        <span>yourwoof@gmail.com</span>
                                    </div>
                                </div>
                                <div>
                                    <img src="./icons/clock-2.svg" alt="">
                                    <div>
                                        <span>Working Hours:</span>
                                        <span>Mon - Sat (8.00am - 5.00pm)</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="embed-responsive embed-responsive-100x400px">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15665.149290361564!2d104.86637877523721!3d11.579059304406625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109519fe4077d69%3A0x20138e822e434660!2sRUPP%20(Royal%20University%20of%20Phnom%20Penh)!5e0!3m2!1sen!2skh!4v1689150856748!5m2!1sen!2skh" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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