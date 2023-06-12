
<?php

 @include 'incl/dbconn.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $last = mysqli_real_escape_string($conn, $_POST['last']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $member_type = $_POST['member_type'];
   $chip_number = $_POST['chip_number'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";  //selects from the database

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){                        //checks if the email exists in the database

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['email'] = $row['email'];
         $_SESSION['user_type'] = $row['admin'];
         header('location:admin.php');

      }elseif($row['user_type'] == 'member'){

         $_SESSION['email'] = $row['email'];
         $_SESSION['user_type'] = $row['member'];
         header('location:member.php');


      }

   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Member Login Form</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <div class="form-container">

   <form class="" action=""  method="post">
    <div class="logo"><img src="images/logo.png" alt=""></div>

    <div class="back">
     <a href="index.php">Back</a>
    </div>

     <h3>ADMIN LOGIN</h3>
     <?php
       if(isset($error)){
         foreach ($error as $error) {
           echo '<span class="error-msg">'.$error.'</span>';
         };
       };
      ?>


     <input type="email" name="email"  placeholder="Enter your Email" required>
     <input type="password" name="password"  placeholder="Enter your Password" required>


     <input type="submit" name="submit" value="Login" class="form-btn">
     <p>Not a Member?  <a href="register.php">Create an account</a></p>
    </form>

  </div>
  </body>
</html>
