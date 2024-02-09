<?php 
echo "im so sad";
    include_once "../config/dbconnect.php";

    if(isset($_POST['Submit'])) 
    { 
        
        $email = $_POST['email']; 
        $fullname = $_POST['fullname'];
        $phone_number= $_POST['phone_number']; 
        $home_address = $_POST['home_address']; 
  
 
         $insert = mysqli_query($conn,"INSERT INTO pet_order
         (email,fullname,phone_number,home_address)
          VALUES ('$email','$fullname','$phone_number','$home_address')");

         if(!$insert) 
         { 
            echo "couldnt insert";
            
         } 
         else 
         { 
             echo "Records added successfully."; 
         } 
       echo "Wtf";
      
    } else echo "fuk";
 
?>