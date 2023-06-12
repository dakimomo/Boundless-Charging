<?php

 @include 'incl/dbconn.php';  //connects the php page to the database

 if(isset($_POST['submit'])){        //when the submit button is hit


   $event_date= $_POST['event_date'];
   $event_type= mysqli_real_escape_string($conn, $_POST['event_type']);  //creating php variables that store the html form data
   $event_name= mysqli_real_escape_string($conn, $_POST['event_name']);
   $region=$_POST['region'];
   $entries_close=$_POST['entries_close'];


   $insert = "INSERT INTO upcoming_events (event_date,event_type,event_name,region,
     entries_close) VALUES('$event_date','$event_type','$event_name',
           '$region','$entries_close')";
           mysqli_query($conn, $insert);
           header('location:events_admin.php');

//inserts the form data into the database


};


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
    <meta charset="UTF-8">
    <title>Member Page</title>
    <link rel="stylesheet" href="css/home2.css">
 </head>

 <body>

   <header class="header">

     <div class="logo">
       <img src="images/logo.png" alt="">
     </div>

   <div class="d-heading">
       <a href="#">  Admin Dashboard</a>
   </div>

   <div class="welcome">

   </div>

   <div class="logout">
     <a href="logout.php">Logout</a>
   </div>

 </header>

     <aside class="side">

        <ul>

           <li><a href="admin.php">Home</a></li>
          <li><a href="ppmembers.php">PPA Members</a></li>
          <li><a href="events_admin.php">Upcoming Events</a></li>

        </ul>
     </aside>




   <div class="form-container">

    <form class="" action=""  method="post">
     <div class="logo"><img src="images/logo.png" alt=""></div>

     <div class="back">
      <a href="events_admin.php">Back</a>
     </div>

      <h3>Add New Event</h3>

      <label class="label1">Event Date</label>
      <input type="date" name="event_date"  placeholder="Date" required>

      <input type="text" name="event_type"  placeholder="Event Type" required>
      <input type="text" name="event_name"  placeholder="Event Name" required>
      <input type="text" name="region"  placeholder="Region" required>

      <label class="label2">Event Closing Date</label>
      <input type="date" name="entries_close"  placeholder="Entry Closing Date" required>


      <input type="submit" name="submit" value="Add" class="form-btn">

     </form>

   </div>
   </body>
 </html>
