<?php

@include 'incl/dbconn.php';

session_start();

if(!isset($_SESSION['email'])){
   header('location:admin_login.php');
}

elseif($_SESSION['user_type'] =='member') {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/home.css">
  </head>
  <header class="header">

    <div class="logo">
      <img src="images/logo.png" alt="">
    </div>

  <div class="d-heading">
      <a href="#">  Admin Dashboard</a>
  </div>

  <div class="welcome">
   <h1>Welcome <span><?php echo $_SESSION['email'] ?></span></h1>
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


   <div class="content">

     <div class="headings">

    <h1>Welcome to Pedal Power Associations Admin site</h1>


     </div>



   </div>

</body>
</html>
