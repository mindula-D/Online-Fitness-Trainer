<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

  
   <link rel="stylesheet" href="styles/Header & Footer.css">
   <link rel="stylesheet" href="styles/profile.css">
   <link rel="stylesheet" href="styles/all.min.css">

</head>



<header>
        <img class="logo" src="./images/logo2.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="trainers.html">Our Trainers</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="reviews.html">Reviews</a></li>
                <li><a class="current" href="profile.html">user profile</a></li>
            </ul>
        </nav>
        <div class="search">
            <input type="search" class="srch" placeholder="Search here..">
            <a href="#"><button class="srch_btn"><i class="fa fa-search" aria-hidden="true"></i></button></a>
        </div>
        <a href="#" class="sign"><button>Sign In</button></a>

    </header>





<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_db` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
   </div>

</div>

</body>


<footer>
    <div class="container">
        <div class="aboutus">
            <h2>About Us</h2><br>
            <p>GetYourTrainer™ is an online personal training company with a primary focus on strength training.<br><br>
                GetYourTrainer™  offers a no-nonsense, results-driven approach to working out. GetYourTrainer™ programming and nutrition advice has helped thousands of clients across the world not only transform their bodies, but also see how the benefits of getting stronger can have an impact on every area of their lives.</p>
            <img src="./images/social.png" alt="socialmedia" class="social">
        </div>
        <div class="contactus">
            <h2>Contact Us</h2><br>
            <ul class="info">
                <li>
                    <span><i class="fa fa-address-card" aria-hidden="true"></i></span>
                    <span>No.29/15,Visakha Private Road,Colombo-04.</span>
                </li>
                <li>
                    <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                    <p><a href="+94112300663">+94 112 300 633</a><br><a href="+94769015555">+94 796 015 555</a></p>
                </li>
                <li>
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <p><a href="mail">getyourtrainer@gmail.com</a></p>
                </li>
            </ul>
        </div>
        <form action="">
            <div class="comment">
                <h2>Add Your Comment</h2><br>
                <input type="text" placeholder="Name" class="comment_field"><br><br>
                <input type="text" placeholder="Email" class="comment_field"><br><br>
                <textarea placeholder="Address" rows="5" cols="20" class="comment_address"></textarea>
                <a href="#"><button class="cmt_submit">Submit</button></a>
            </div>
        </form>
    </div>
    </footer>
    
    <div class="copyright">
        <p>Copyright © 2022 GetYouTrainer™ Inc. All Rights Reserved.</p>
    </div>
    
    
    
</html>
</html>