<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_db` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_db` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GetYourTrainer.com</title>

  
   <link rel="stylesheet" href="styles/Header & Footer.css">
   <link rel="stylesheet" href="styles/profile.css">
   <link rel="stylesheet" href="styles/all.min.css">

</head>

<header>
        <img class="logo" src="/src/images/logo2.png" alt="logo">
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
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>



<footer>
    <div class="container">
        <div class="aboutus">
            <h2>About Us</h2><br>
            <p>GetYourTrainer™ is an online personal training company with a primary focus on strength training.<br><br>
                GetYourTrainer™  offers a no-nonsense, results-driven approach to working out. GetYourTrainer™ programming and nutrition advice has helped thousands of clients across the world not only transform their bodies, but also see how the benefits of getting stronger can have an impact on every area of their lives.</p>
            <img src="/src/images/social.png" alt="socialmedia" class="social">
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