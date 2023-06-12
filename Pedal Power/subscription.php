<?php

 @include 'incl/dbconn.php';

 session_start();

 if(isset($_POST['submit'])){


   $type = $_POST['type'];
   $joined =  $_POST['joined'];
   $last = $_POST['last'];
   $main = $_POST['main'];
   $status = $_POST['status'];

   $select = " SELECT * FROM 'subscription' WHERE member_id = '$member_id'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

    $insert = "INSERT INTO subscription(type,joined,main,status,)
               VALUES('$subscription_type','$date_joined','$main_member',
             '$subscription_status')";
             mysqli_query($conn, $insert);
             header('location:member.php');
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

       <h3>Subscription</h3>

         <div class="account-info">
         <h2> SUBSCRIPTION INFO</h2>



        <input type="text" name="type"  placeholder="Enter your Subscription Type" required>
        <input type="date" name="joined"  placeholder="Enter the Date Joined" required>
        <input type="text" name="main"  placeholder="Enter the Main Member" required>
        <select  name= "status">
          <option value="Not Paid"> Not Paid </option>
          <option value="paid"> Paid </option>

        </select>


        </div>

          </body>
        </html>
