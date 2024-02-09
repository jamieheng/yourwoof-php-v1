<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
<nav  class="navbar navbar-expand-lg navbar-light px-5" style = "background-color: #BF94E4; display: flex; width: 110%;">
    
    <a class="navbar-brand ml-5" href="./index.php" align="center" style="margin-left: auto;">
        
            
            <img src="./assets/images/yourwoof512x512.png" width="80" height="80" alt="Swiss Collection" >
            <h1>Admin Dashboard</h1>

        
       
    </a>
    <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul> -->
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#BF94E4;" aria-hidden="true"></i>
         </a>
          <?php
        } 
        else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#BF94E4;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
