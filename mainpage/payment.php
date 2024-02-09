
<!doctype html>


<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "yourwoofAdmin");

$select_cart = "SELECT * FROM pet_cart";
echo $user_id;
    if(isset($_POST['submit'])) 
    { 
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
           
            $select_user = "SELECT * FROM register where username = '$username'";
            $query_id = mysqli_query($conn, $select_user);
            if ($query_id && $row = mysqli_fetch_assoc($query_id)) { 
                $user_id= mysqli_real_escape_string($conn, $row["id"]);
            }

            $query = mysqli_query($conn, $select_cart);
            if(mysqli_num_rows($query) > 0){                                        
            while($fetch_cart = mysqli_fetch_assoc($query)) {
             $pet_id = $fetch_cart['pet_id'];

            }
        }
            
            $email = $_POST['email']; 
            $fullname = $_POST['fullname'];
            $phone_number= $_POST['phone_number']; 
            $home_address = $_POST['home_address']; 
            $delivery_type = $_POST['delivery_type'];
    
            $insert = "INSERT INTO pet_order (order_id, pet_id, user_id, email, fullname, phone_number, home_address, delivery_type) 
            VALUES (0, '$pet_id','$user_id', '$email', '$fullname', '$phone_number', '$home_address','$delivery_type')";
            $query= mysqli_query($conn, $insert);
    
             if(!$insert) 
             { 
                echo "couldnt insert";
                
             } 
             else 
             { 
               
                header("location: index.php?pet_adopted=1");
              
                
                
               
                 
                $query = mysqli_query($conn, $select_cart);
                                                                        
                if(mysqli_num_rows($query) > 0){
                while($fetch_cart = mysqli_fetch_assoc($query)){
                $remove_id = $fetch_cart['cart_id']; }
                
                
                if (!empty($remove_id)) {
                    // Delete the item with the specified cart_id
                    mysqli_query($conn, "DELETE FROM `pet_cart` WHERE cart_id = '$remove_id'");
                        }
                    
                } 
            }
    
                 
             

        } else echo "no username";
       
            $new_status = "Adopted";

            $update_query = "UPDATE product SET pet_status = '$new_status' WHERE product_id = $pet_id";
            $query_result = mysqli_query($conn, $update_query);

            if ($query_result) {
                echo "Information updated successfully.";
            } else {
                echo "Update query error: " . mysqli_error($conn);
            }
   
    } 

 
?>

<html>

<head>
    
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>YourWoof - Payment</title>

    <link rel="icon" type="image/icon" sizes="16x16" href="./images/yourwoof16x16.png">
    <link rel="apple-icon" type="image/icon" href="./images/yourwoof180x180-apple.png">
    <link rel="icon" type="image/icon" href="./images/yourwoof512x512.png">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            padding: 5px;
            background-color: #F0F0F0;
        }

        p {
            margin: 0%;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .box-1 {
            max-width: 450px;
            padding: 10px 40px;
            user-select: none;
        }

        .box-1 div .fs-12 {
            font-size: 8px;
            color: white;
        }

        .box-1 div .fs-14 {
            font-size: 15px;
            color: white;
        }

        .box-1 img.pic {
            width: 20px;
            height: 20px;
            object-fit: cover;
        }

        .box-1 img.mobile-pic {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .box-1 .name {
            font-size: 11px;
            font-weight: 600;
        }

        .dis {
            font-size: 12px;
            font-weight: 500;
        }

        label.box {
            width: 100%;
            font-size: 12px;
            background: #ddd;
            margin-top: 12px;
            padding: 10px 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid transparent;
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third {
            border-color: #BF94E4;
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle {
            border-color: #7a34ca;
            background-color: #fff;
        }

        label.box .course {
            width: 100%;
        }

        label.box .circle {
            height: 12px;
            width: 12px;
            background: #ccc;
            border-radius: 50%;
            margin-right: 15px;
            border: 4px solid transparent;
            display: inline-block;
        }

        input[type="radio"] {
            display: none;
        }

        .box-2 {
            max-width: 450px;
            padding: 10px 40px;
        }


        .box-2 .box-inner-2 input.form-control {
            font-size: 12px;
            font-weight: 600;
        }

        .box-2 .box-inner-2 .inputWithIcon {
            position: relative;
        }

        .box-2 .box-inner-2 .inputWithIcon span {
            position: absolute;
            left: 15px;
            top: 8px;
        }

        .box-2 .box-inner-2 .inputWithcheck {
            position: relative;
        }

        .box-2 .box-inner-2 .inputWithcheck span {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
            font-size: 12px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            right: 15px;
            top: 6px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            outline: none;
            border: 1px solid #7700ff;
        }

        .border:focus-within {
            border: 1px solid #7700ff !important;
        }

        .box-2 .card-atm .form-control {
            border: none;
            box-shadow: none;
        }

        .form-select {
            border-radius: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }

        .address .form-control.zip {
            border-radius: 0;
            border-bottom-left-radius: 10px;

        }

        .address .form-control.state {
            border-radius: 0;
            border-bottom-right-radius: 10px;

        }

        .box-2 .box-inner-2 .btn.btn-outline-primary {
            width: 120px;
            padding: 10px;
            font-size: 11px;
            padding: 0% !important;
            display: flex;
            align-items: center;
            border: none;
            border-radius: 0;
            background-color: whitesmoke;
            color: black;
            font-weight: 600;
        }

        .box-2 .box-inner-2 .btn.btn-primary {
            background-color: #BF94E4;
            border: 1px solid #BF94E4 !important;
            color: whitesmoke;
            font-size: 14px;
            display: flex;
            align-items: center;
            font-weight: 600;
            justify-content: center;

            padding: 10px;
        }

        .box-2 .box-inner-2 .btn.btn-primary:hover {
            background-color: #FEFEFE;
            color: #BF94E4;
            border: 1px solid #BF94E4 !important;
        }

        .box-2 .box-inner-2 .btn.btn-primary .fas {
            font-size: 13px !important;
            color: whitesmoke;
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .carousel-inner {
            width: 100%;
            height: 250px;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
        }

        .carousel-control-prev {
            transform: translateX(-50%);
            opacity: 1;
        }

        .carousel-control-prev:hover .fas.fa-arrow-left {
            transform: translateX(-5px);
        }

        .carousel-control-next {
            transform: translateX(50%);
            opacity: 1;
        }

        .carousel-control-next:hover .fas.fa-arrow-right {
            transform: translateX(5px);
        }

        .fas.fa-arrow-left,
        .fas.fa-arrow-right {
            font-size: 0.8rem;
            transition: all .2s ease;
        }

        .icon {
            width: 30px;
            height: 30px;
            background-color: #f8f9fa;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform-origin: center;
            opacity: 1;
        }

        .fas,
        .fab {
            color: #6d6c6d;
        }

        ::placeholder {
            font-size: 12px;
        }

        @media (max-width:768px) {
            .container {
                max-width: 700px;
                margin: 10px auto;
            }

            .box-1,
            .box-2 {
                max-width: 600px;
                padding: 20px 90px;
                margin: 20px auto;
            }

        }

        @media (max-width:426px) {

            .box-1,
            .box-2 {
                max-width: 400px;
                padding: 20px 10px;
            }

            ::placeholder {
                font-size: 9px;
            }
        }
    </style>
</head>


<body className='snippet-body' style="margin-top: 2rem">
    <div class="container d-lg-flex">
        
        <div class="box-1 bg-light user" >
            




            <div class="box-inner-1 pb-3 mb-3">
               
                

                <div class="box-inner-1 pb-3 mb-3" style="padding:20px;">
                <div class="d-flex justify-content-between mb-3 userdetails">
                    <p class="fw-bold">  
                        <a href="./index.php" id="cart-icon" style="color: #BF94E4; text-decoration: none; align-items: center; display: flex; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16" style="margin-right: 1rem;">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg> Back 
                               
                        </a>
                    </p>


                </div>
                    <div class="cart-container">
                        <div class="cart-slideshow">
                            <?php
                             if (isset($_SESSION['username'])){
                                $username = $_SESSION['username'];
           
                                $select_user = "SELECT * FROM register where username = '$username'";
                                $query_id = mysqli_query($conn, $select_user);
                                if ($query_id && $row = mysqli_fetch_assoc($query_id)) { 
                                    $user_id= mysqli_real_escape_string($conn, $row["id"]);
                                }
                    
                                $select_cart_by_user_id = "SELECT * FROM pet_cart where user_id = $user_id";
                                $query = mysqli_query($conn, $select_cart_by_user_id);
                           
                              if (mysqli_num_rows($query) > 0) {
                                while ($fetch_cart = mysqli_fetch_assoc($query)) {
                                    $pet_name = $fetch_cart['pet_name'];
                                    $pet_images = explode(",", $fetch_cart['pet_img']); // Assuming pet_img is a comma-separated list

                                    if (count($pet_images) > 0) {
                            ?>
                            <div class="cart-item">
                                <div id="carousel-<?php echo $pet_id; ?>" class="carousel slide carousel-fade img-details" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        foreach ($pet_images as $index => $image) {
                                            $active_class = ($index === 0) ? 'active' : '';
                                        ?>
                                        <div class="carousel-item <?php echo $active_class; ?>">
                                            <img src="../admin_panel/uploads/<?php echo $image; ?>" class="d-block w-100 cart-image" alt="<?php echo $pet_name; ?>">
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="cart-name">
                                    <h4><?php echo $pet_name; ?></h4>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            }
                        }
                            ?>
                        </div>
                       
                    </div>
                </div>

                    <style>
                        .cart-container {
                            position: relative;
                            overflow: hidden;
                        }

                        .cart-slideshow {
                            display: flex;
                            transition: transform 0.5s ease-in-out;
                        }

                        .cart-item {
                            min-width: 100%;
                            margin-right: 20px;
                            /* border: 1px solid #ccc; */
                            padding: 10px;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }

                        .cart-image {
                            max-width: 300px; /* Adjust the width as needed */
                        }

                        .cart-name {
                            font-size: 14px; /* Adjust the font size as needed */
                            text-align: center;
                            margin-top: 10px;
                        }

                        .btn-container {
                            display: flex;
                            justify-content: space-between;
                        
                            
                            align-items: center;
                        }

                        .btn {
                            
                            /* Your existing styles for the button */
                            background-color: transparent;
                        }

                        .btn i {
                            font-size: 24px;
                        }
                    </style>

                  


            </div>

        </div>



        <div class="box-2">
            <div class="box-inner-2" style="padding: 20px;">
                <div>
                    <p class="fw-bold">Adoption Details</p>
                    <p class="dis mb-3">Complete the adoption process by providing your info down below</p>
                </div>
                <form method="post">
                    
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2">Email</p>
                        <input class="form-control" type="text"  name="email" id="email" required>
                    </div>
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2" >Fullname</p>
                        <input class="form-control" type="text" name="fullname" id="fullname" required>
                    </div>
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2" >Home Address</p>
                        <input class="form-control" type="text" name="home_address" id="home_address" required>
                    </div>
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2" >Phone Number</p>
                        <input class="form-control" type="text" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2" >Delivery method</p>
                        <select name="delivery_type">
                            <option value="pick_up">Pick Up</option>
                             <option value="delivery">Delivery</option>
                    </select>

                    <!-- select style -->
                    <style>
                        /* Custom styling for the select element */
                        select {
                            padding: 5px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            background-color: #f7f7f7;
                            color: #333;
                            appearance: none; /* Remove default arrow icon */
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            margin-bottom: 1rem;
                        }

                        /* Style for select when focused */
                        select:focus {
                            outline: none;
                            border-color: #BF94E4;
                            /* box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); */
                        }
                    </style>
                    
                    
                   
                        <div>
                            <button class="btn btn-primary mt-2" name="submit" id="submit" value="submit" type="submit" style="width: 20rem;">Finish</button>
                        </div>
                       

       
                </form>
            </div>
        </div>
    </div>
    
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
    
    <script type='text/javascript'></script>

</body>

</html>