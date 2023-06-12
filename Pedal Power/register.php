<?php

 @include 'incl/dbconn.php';  //connects the php page to the database

 if(isset($_POST['submit'])){        //when the submit button is hit


   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);  //creating php variables that store the html form data
   $last = mysqli_real_escape_string($conn, $_POST['last']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $member_type = $_POST['member_type'];
   $chip_number = $_POST['chip_number'];

    $select = " SELECT * FROM 'users' WHERE email = '$email' && password = '$pass'";  //selects from the users table

    $result = mysqli_query($conn, $select);   //once found

    if(mysqli_num_rows($result) > 0){      //checks if the email exists in the database

       $error[] = 'User already exists, login!';    //provides an error message if email exists

    }else{

       if($pass != $cpass){                       //checks if confirmed password and enterd password match
          $error[] = 'Password does not match!';
       }else{

     $insert = "INSERT INTO users(email,password,first_name,last_name,
              member_type,chip_number,user_type) VALUES('$email','$pass','$name',
             '$last','$member_type','$chip_number','$user_type')";
             mysqli_query($conn, $insert);
             header('location:login.php');
       }
    }
 };
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Form</title>
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>


  <div class="form-container">


   <form class="" action=""  method="post">
    <div class="logo"><img src="images/logo.png" alt=""></div>

    <h3>CREATE AN ACCOUNT</h3>

      <div class="account-info">
      <h2> ACCOUNT INFO</h2>

     <?php
       if(isset($error)){
         foreach ($error as $error) {
           echo '<span class="error-msg">'.$error.'</span>';
         };
       };
      ?>

     <input type="email" name="email"  placeholder="Enter your Email" required>
     <input type="password" name="password"  placeholder="Enter your Password" required>
     <input type="password" name="cpassword"  placeholder="Confirm your Password" required>

     </div>


    <div class="personal-info">
        <h2> PERSONAL INFO</h2>

    <input type="text" name="name"  placeholder="Enter your First Name" required>
    <input type="text" name="last"  placeholder="Enter your Last Name" required>

  <select  name="member_type">
      <option value="Elites"> Elites </option>
      <option value="Sub_veteran"> SubVeteran </option>
      <option value="Veteran"> Veteran </option>
      <option value="Master"> Master </option>
      <option value="Junior_Scholar"> Junior Scholar </option>
      <option value="Senior_Scholar"> Senior Scholar </option>
      <option value="Ladies"> Ladies </option>
  </select>

    <input type="text" name="chip_number"  placeholder="Enter your RaceTec chip number" required>

     <select  name= "user_type">
       <option value="member"> member </option>
       <option value="admin"> admin </option>

     </select>

     <input type="submit" name="submit" value="Register" class="form-btn">
     <p>Already have an account?  <a href="login.php">Log In</a></p>

    </form>

  </div>



    <a class="back" href="index.php"> Back </a>

  </body>
</html>
