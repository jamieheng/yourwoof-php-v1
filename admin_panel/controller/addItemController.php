<?php 
session_start();
   // include_once "../config/dbconnect.php"; 
    $conn = mysqli_connect("localhost", "root", "", "yourwoofAdmin");
    
   
    if(isset($_POST['upload'])) 
    { 
      
        
        $ProductName = $_POST['p_name']; 
        $age = $_POST['p_age'];
        $desc= $_POST['p_desc']; 
        $category = $_POST['category']; 
        $breed = $_POST['p_breed'];
        $status = $_POST['p_status'];
        $gender = $_POST['p_gender'];
        
             
        $name = $_FILES['file']['name']; 
        $temp = $_FILES['file']['tmp_name']; 
     
        //$location="./uploads/"; 
        // $image=$location.$name; 
        $image= $name; 
 
        //$target_dir="../uploads/"; 
        $finalImage=$target_dir.$name; 
 
        move_uploaded_file($temp,$finalImage); 
        
        
 
         $insert = mysqli_query($conn, "INSERT INTO product 
         (product_id, product_name,product_image,product_desc,category_id,age,breed,pet_status,gender)
          VALUES (0,'$ProductName','$image','$desc','$category','$age','$breed','$status','$gender')");
    
 

         if(!$insert) 
         { 
            echo "Error in query: " . $insert;
            echo "Error message: " . mysqli_error($conn); 
         } 
         else 
         { 
            echo "<script>alert('Pet added successfully.');</script>"; ?>
            <a href="../index.php">Back to home</a>
       <?php  } 
      
    } else echo "Not yet submitted";
         
?>