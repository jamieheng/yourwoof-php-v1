<?php

include 'config.php';
session_start();

$conn = OpenCon();

if (isset($_POST['submit'])) {
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $passwords = md5($_POST['passwords']);
   $cpassword = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   // Validate password strength
   $password = $_POST['passwords'];
   $uppercase = preg_match('@[A-Z]@', $password);
   $lowercase = preg_match('@[a-z]@', $password);
   $number = preg_match('@[0-9]@', $password);
   $specialChars = preg_match('@[^\w]@', $password);

   $select = "SELECT * FROM register WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $error[] = 'User already exists!';
   } else {
      if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
         $error[] = 'Password should be at least 8 characters in length and should include at least one uppercase letter, one lowercase letter, one number, and one special character.';
      } else {
         if ($cpassword != $passwords) {
            $error[] = 'Passwords do not match!';
         } else {
            $insert = "INSERT INTO register VALUES (0, '$firstname', '$lastname', '$username', '$email', '$passwords', '$cpassword', '$user_type')";
            mysqli_query($conn, $insert);

            $_SESSION["email"] = $email;
            $_SESSION["username"] = $username;

            $result = mysqli_query($conn, $select);
            $row = mysqli_fetch_array($result);

            if ($row['user_type'] == 'admin') {
               $_SESSION['username'] = $row['username'];
               header('location: admin_panel/index.php');
               exit();
            } elseif ($row['user_type'] == 'user') {
               $_SESSION['username'] = $row['username'];
               header('location: mainpage/index.php');
               exit();
            }
         }
      }
   }

   mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>YourWoof - Register Form</title>
   <link rel="icon" type="image/icon" sizes="16x16" href="./images/yourwoof16x16.png">
   <link rel="apple-icon" type="image/icon" href="./images/yourwoof180x180-apple.png">
   <link rel="icon" type="image/icon" href="./images/yourwoof512x512.png">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/stylesheet.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>

<body>

   <div class="form-container">

      <form method="post">
         <h3>Register Now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }
         ?>

         <input type="text" name="firstname" required placeholder="Enter your first name">
         <input type="text" name="lastname" required placeholder="Enter your last name">
         <input type="text" name="username" required placeholder="Enter your username">
         <input type="email" name="email" required placeholder="Enter your email">

         <div class="wrapper">
            <div class="pass-field">
               <input type="password" name="passwords" required placeholder="Create your password">
               <i class="fa-solid fa-eye"></i>
            </div>
            <div class="content" required>
               <ul class="requirement-list">
                  <li>
                     <i class="fa-solid fa-circle"></i>
                     <span>At least 8 characters length</span>
                  </li>
                  <li>
                     <i class="fa-solid fa-circle"></i>
                     <span>At least 1 number (0...9)</span>
                  </li>
                  <li>
                     <i class="fa-solid fa-circle"></i>
                     <span>At least 1 lowercase letter (a...z)</span>
                  </li>
                  <li>
                     <i class="fa-solid fa-circle"></i>
                     <span>At least 1 special symbol (!...$)</span>
                  </li>
                  <li>
                     <i class="fa-solid fa-circle"></i>
                     <span>At least 1 uppercase letter (A...Z)</span>
                  </li>
               </ul>
            </div>
         </div>
         <input type="password" name="cpassword" required placeholder="Confirm your password">
         <select name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
         </select>

         <input type="submit" name="submit" value="Register Now" class="form-btn">
         <p>Already have an account? <a href="login.php">Login Now</a></p>
      </form>

   </div>




   <!-- javascript -->
   <script type='text/javascript'>
      const passwordInput = document.querySelector(".pass-field input");
      const eyeIcon = document.querySelector(".pass-field i");
      const requirementList = document.querySelectorAll(".requirement-list li");

      // An array of password requirements with corresponding 
      // regular expressions and index of the requirement list item
      const requirements = [{
            regex: /.{8,}/,
            index: 0
         }, // Minimum of 8 characters
         {
            regex: /[0-9]/,
            index: 1
         }, // At least one number
         {
            regex: /[a-z]/,
            index: 2
         }, // At least one lowercase letter
         {
            regex: /[^A-Za-z0-9]/,
            index: 3
         }, // At least one special character
         {
            regex: /[A-Z]/,
            index: 4
         }, // At least one uppercase letter
      ]

      passwordInput.addEventListener("keyup", (e) => {
         requirements.forEach(item => {
            // Check if the password matches the requirement regex
            const isValid = item.regex.test(e.target.value);
            const requirementItem = requirementList[item.index];

            // Updating class and icon of requirement item if requirement matched or not
            if (isValid) {
               requirementItem.classList.add("valid");
               requirementItem.firstElementChild.className = "fa-solid fa-check";

            } else {
               requirementItem.classList.remove("valid");
               requirementItem.firstElementChild.className = "fa-solid fa-circle";
            }
         });
      });

      eyeIcon.addEventListener("click", () => {
         // Toggle the password input type between "password" and "text"
         passwordInput.type = passwordInput.type === "password" ? "text" : "password";

         // Update the eye icon class based on the password input type
         eyeIcon.className = `fa-solid fa-eye${passwordInput.type === "password" ? "-slash" : ""}`;
      });
   </script>
</body>

</html>