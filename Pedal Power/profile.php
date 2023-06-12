<?php

 @include 'incl/dbconn.php';

session_start();

    if(!isset($_SESSION['email'])){
       header('location:login.php');
    }

    elseif($_SESSION['user_type'] =='admin') {
       header('location:admin_login.php');
    }

    $email=$_SESSION['email'];

    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);

    $info=mysqli_fetch_assoc($result);

     if(isset($_POST['update'])){

                $name=$_POST['name'];
                $last=$_POST['last'];
                $member_type=$_POST['member_type'];
                $chip_number=$_POST['chip_number'];
                $password=$_POST['password'];

    $sql2="UPDATE users SET first_name='$name',last_name='$last',member_type='$member_type',
          chip_number='$chip_number',password='$password' WHERE email='$email' ";

          $result2=mysqli_query($conn,$sql2);

          if($result2){
              header('location:profile.php');

          }

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

              <li><a href="member.php">Home</a></li>
             <li><a href="profile.php">Profile</a></li>
             <li><a href="#">Member Card</a></li>
             <li><a href="#">Events Participated in</a></li>
             <li><a href="#">Results</a></li>
             <li><a href="upcomingevents.php">Upcoming Events</a></li>
           </ul>
        </aside>


 <div class="content1">

  <div class="div">
      <div class="update">
          <h1 >Update Profile </h1>
  </div>
     <form class="form" action="#"  method="post">

       <div>
         <label >First Name</label>
         <input type="text" name="name" value="<?php echo "{$info['first_name']}" ?>">
       </div>

       <div>
         <label >Last Name</label>
         <input type="text" name="last" value="<?php echo "{$info['last_name']}" ?>" >
       </div>


       <div class="">
          <label >Member Type</label>
        <select  name="member_type" value="<?php echo "{$info['member_type']}" ?>">
            <option value="Elites"> Elites </option>
             <option value="Sub_veteran"> SubVeteran </option>
             <option value="Veteran"> Veteran </option>
             <option value="Master"> Master </option>
             <option value="Junior_Scholar"> Junior Scholar </option>
             <option value="Senior_Scholar"> Senior Scholar </option>
             <option value="Ladies"> Ladies </option>
         </select>
       </div>

       <div class="">
          <label >Chip Number</label>
          <input type="text" name="chip_number" value="<?php echo "{$info['chip_number']}" ?>"  required>
       </div>

       <div>
         <label >Password</label>
         <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" >
       </div>

       <div >
         <input type="submit" name="update" class="update-btn" value="Update">
       </div>

     </form>
    </div>



       </div>

    </body>
    </html>
