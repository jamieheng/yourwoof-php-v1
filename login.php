 <?php
   session_start();

   @include 'config.php';
   $conn = OpenCon();


   if (isset($_POST['submit'])) {

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $passwords = md5($_POST['passwords']);


      $select = " SELECT * FROM register WHERE email = '$email' && passwords = '$passwords' ";

      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {

         $row = mysqli_fetch_array($result);

         if ($row['user_type'] == 'admin') {

            $_SESSION['username'] = $row['username'];
            header('location: admin_panel/index.php');
         } else if ($row['user_type'] == 'user') {

            $_SESSION['username'] = $row['username'];
            header('location: mainpage/index.php');
         }
      } else {
         $error[] = 'Incorrect email or password!';
      }
   };

   if (isset($_GET['logout'])) {
      session_destroy();
      session_unset();
   }
   ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourWoof - Login form</title>
    <link rel="icon" type="image/icon" sizes="16x16" href="./images/yourwoof16x16.png">
    <link rel="apple-icon" type="image/icon" href="./images/yourwoof180x180-apple.png">
    <link rel="icon" type="image/icon" href="./images/yourwoof512x512.png">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/stylesheet.css">

 </head>

 <body>
    <style>

    </style>

    <div class="form-container">

       <form action="login.php" method="post">
          <h3>login now</h3>
          <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>
          <input type="email" name="email" required placeholder="Enter your email">
          <input type="password" name="passwords" required placeholder="Enter your password">
          <input type="submit" name="submit" value="login now" class="form-btn">
          <p>Don't have an account? <a href="register.php">Register Now</a></p>
       </form>

    </div>

 </body>

 </html>