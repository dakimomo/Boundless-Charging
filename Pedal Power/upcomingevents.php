<?php

 @include 'incl/dbconn.php';

session_start();


    if(!isset($_SESSION['email'])){
       header('location:login.php');
    }

    elseif($_SESSION['user_type'] =='admin') {
       header('location:admin_login.php');
    }

     $sql = "SELECT * FROM upcoming_events";

     $result=mysqli_query($conn,$sql);



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

              <li><a href="member.php">Home</a></li>
             <li><a href="profile.php">Profile</a></li>
             <li><a href="#">Member Card</a></li>
             <li><a href="#">Events Participated in</a></li>
             <li><a href="#">Results</a></li>
             <li><a href="upcomingevents.php">Upcoming Events</a></li>
           </ul>
        </aside>

        <div class="content2">
          <div class="upcoming">
              <h1 >Upcoming Events </h1>
        </div>

        <table border="2px">
            <tr>
               <th class="table_th"> Date</th>
               <th class="table_th">Event Type</th>
               <th class="table_th">Event Name</th>
               <th class="table_th">Region</th>
               <th class="table_th">Entries Closing Date</th>
            </tr>

            <?php
                while($info=$result-> fetch_assoc()){

             ?>

            <tr>
              <td class="table_td">
                    <?php echo "{$info['event_date']}"; ?>
              </td>

              <td class="table_td">
                  <?php echo "{$info['event_type']}"; ?>
              </td>
              <td class="table_td">
                  <?php echo "{$info['event_name']}"; ?>
              </td>

              <td class="table_td">
                 <?php echo "{$info['region']}"; ?>
               </td>

              <td class="table_td">
                  <?php echo "{$info['entries_close']}"; ?>
              </td>
            </tr>

            <?php
                }
             ?>
        </table>

       </div>


    </body>
    </html>
