<?php


session_start();

if(!isset($_SESSION['email'])){
   header('location:login.php');
}

elseif($_SESSION['user_type'] =='admin') {
   header('location:admin_login.php');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <title>Member Page</title>
   <link rel="stylesheet" href="css/home.css">
</head>

<body>

  <header class="header">

    <div class="logo">
      <img src="images/logo.png" alt="">
    </div>

  <div class="d-heading">
      <a href="#">  Member Dashboard</a>
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

         <li><a href="profile.php">Profile</a></li>
         <li><a href="#">Member Card</a></li>
         <li><a href="#">Events Participated in</a></li>
         <li><a href="#">Results</a></li>
         <li><a href="upcomingevents.php">Upcoming Events</a></li>
       </ul>

    </aside>


   <div class="content">

     <div class="headings">

    <h1>Welcome to Pedal Power Associations Member site</h1>

    <h3>If you are a new member create a subscription </h3>
     </div>



   </div>

</body>
</html>
