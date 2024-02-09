<?php 
    include_once "../config/dbconnect.php"; 
 
    $product_id= $_POST['product_id']; 
    $p_name= $_POST['p_name']; 
    
    $p_desc= $_POST['p_desc']; 
    $category= $_POST['category']; 

    $age= $_POST['p_age'];
    $breed = $_POST['p_breed'];
    $status = $_POST['p_status'];
    $gender = $_POST['p_gender'];
 
    if( isset($_FILES['newImage']) ){ 
         
       // $location="./uploads/"; 
        $img = $_FILES['newImage']['name']; 
        $tmp = $_FILES['newImage']['tmp_name']; 
        $dir = './uploads/'; 
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); 
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp'); 
        $image = $img; 
        $final_image= $image; 
 
        if (in_array($ext, $valid_extensions))  
        { 
             $path = $image; 
            move_uploaded_file($tmp, $dir.$image); 
            // echo "uploads/". $row['newImage']; 
        } 
    }else{ 
        $final_image=$_POST['existingImage']; 
    } 
    $updateItem = mysqli_query($conn,"UPDATE product SET  
        product_name='$p_name', 
        age= '$age', 
        product_desc='$p_desc',  
        category_id= '$category', 
        product_image='$final_image',
        breed= '$breed',
        pet_status= '$status',
        gender= '$gender'
        WHERE product_id=$product_id"); 
 
 
    if($updateItem) 
    { 
        echo "true"; 
        // echo "uploads/". $row["product_image"]; 
    } else echo "false";
    // else 
    // { 
    //     echo mysqli_error($conn); 
    // } 
?>