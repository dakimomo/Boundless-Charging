<?php

 @include 'incl/dbconn.php';

session_start();


    if(!isset($_SESSION['email'])){
       header('location:login.php');
    }

    elseif($_SESSION['user_type'] =='admin') {
       header('location:admin_login.php');
    }

     $sql = "SELECT * FROM users";

     $result=mysqli_query($conn,$sql);



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

        <div class="content2">

          <form class="searchform" action="" method="post">

            <input type="text" name="search" placeholder="Search">
            <button class="searchbtn" type="submit" name="search">Search</button>
          </form>

          <div class="upcoming">
              <h1 >PPA Members </h1>
        </div>

        <table border="2px">
            <tr>
               <th class="table_th"> Email</th>
               <th class="table_th">First Name</th>
               <th class="table_th">Last Name</th>
               <th class="table_th">Member Type</th>
               <th class="table_th">Chip Number</th>
            </tr>

            <?php
                while($info=$result-> fetch_assoc()){



             ?>

            <tr>
              <td class="table_td">
                    <?php echo "{$info['email']}"; ?>
              </td>

              <td class="table_td">
                  <?php echo "{$info['first_name']}"; ?>
              </td>
              <td class="table_td">
                  <?php echo "{$info['last_name']}"; ?>
              </td>

              <td class="table_td">
                 <?php echo "{$info['member_type']}"; ?>
               </td>

              <td class="table_td">
                  <?php echo "{$info['chip_number']}"; ?>
              </td>
            </tr>

            <?php
                }
             ?>
        </table>

       </div>


    </body>
    </html>
