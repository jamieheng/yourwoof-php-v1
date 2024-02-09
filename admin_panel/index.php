<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboad</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body class="main-page" >
   
    
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            include_once "./config/dbconnect.php";
        ?>

    <div id="main-content" class="container allContent-section py-4" style="width:110%;">
       
    <hr style = "border:1px solid; background-color:#BF94E4; border-color:#0000;">
        <div class="row" >
            <div class="col-sm-3" >
                <div class="card" style="background-color:#BF94E4;">
                
                    <i class="fa fa-users  mb-2" style="font-size: 70px; color: #F0F0F0"align="center"></i>
                    <hr style = "border:1px solid; background-color:#232B38; border-color:#0000;">
                    <h4 style="color:#232B38;"align="center">Total Users</h4>
                    <h5 style="color:#232B38;"align="center">
                    <?php
                        $sql="SELECT * from register where user_type = 'user' || user_type = 'admin'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0)
                        {
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color:#BF94E4;">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px; color: #F0F0F0"align="center"></i>
                    <hr style = "border:1px solid; background-color:#232B38; border-color:#0000;">
                    <h4 style="color:#232B38;"align="center">Total Categories</h4>
                    <h5 style="color:#232B38;"align="center">
                    <?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card" style="background-color:#BF94E4;">
                    <i class="fa fa-th mb-2" style="font-size: 70px; color: #F0F0F0" align="center"></i>
                    <hr style = "border:1px solid; background-color:#232B38; border-color:#0000;">
                    <h4 style="color:#232B38;" align="center">Total Pets</h4>
                    <h5 style="color:#232B38; " align="center">
                    <?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color:#BF94E4;">
                    <i class="fa fa-list mb-2" style="font-size: 70px; color: #F0F0F0;" align="center"></i>
                    <hr style = "border:1px solid; background-color:#232B38; border-color:#0000;">
                    <h4 style="color:#232B38;"align="center">Total adopted pets</h4>
                    <h5 style="color:#232B38;"align="center">
                    <?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
        <hr style = "border:1px solid; background-color:#BF94E4; border-color:#0000;">
        
    </div>
       
            

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>