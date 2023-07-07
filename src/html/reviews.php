<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>GetYourTrainer.com</title>
	
	<script type="text/javascript" language="javascript" src="js/faq.js"></script>
	
	<!-- nav bar -js -->
	<script type="text/javascript" language="javascript">
	//top nav bar 
        function myFunction() {
        var x = document.getElementById("topnav");
        if (x.className === "topnav") {
        x.className += " responsive";
        } else {
        x.className = "topnav";
               }
        }
	
		

	</script>
	
	
	
	
</head>
	
<body onLoad="showSlides()">
    <div class="topnav" id="topnav">
  <a1 href="#"><img class="logo" src="images/logo2.png" ></a1>
  <a href="#" class="trash"></a><a href="#" class="trash"></a> <!-- empty layer.   .-->
  <a href="index.html" >Home</a>
  <a href="about.html">About</a>
  <a href="faq.php" >Our Trainers</a>
  <a href="blog.html">Blog</a>
  <a href="pricing.html" target="_blank">Pricing</a>
  <a href="#" class="active">Reviews</a>	
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	<i><!--       --></i>
    <i class="fa fa-bars"></i>
	
	
 </a>
 <a>
	<i><a href="#" class="sign" style="float: inherit" ><button>Sign In</button></a></i>
 </a>
			
			
</div>
 <div class="slideshow-container" style="margin-top: 20px;">



<div class="mySlides fade" style="margin-bottom: 0px">
  <img src="images/3.jpg" style="width:100%">
</div>

<div class="mySlides fade" style="margin-bottom: 0px">
  <img src="images/2.jpg" style="width:100%">
</div>

</div>  
		
		<?php 
		
		$con=mysqli_connect("localhost","root","","temp_db");
			
			if(!$con)
			{
				die("Sorry, We are facing a technical issue");
			}else{
           $sql="SELECT * FROM `review_data` LIMIT 1;";
		   $results=mysqli_query($con,$sql);
          

           while($row=mysqli_fetch_assoc($results)){
           ?>

	
<table width="525;" border="0"  id="mytd">
  <tbody >
    <tr >
      <td width="547" >&nbsp;<h1>Name  <?php echo( $row["name"])?></h1> </td> 
      
    </tr>
    <tr>
      <td>&nbsp;<h3>E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(  $row["email"])?></h3></td>
     
    </tr>
    <tr>
      <td>&nbsp;<p>Comment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (  $row["comment"])?></p></td>
      
    </tr>
    
    </tbody>
</table>
          <?php }  mysqli_close($con);} ?>
	
	
		 
		

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
		
		
		<?php 
		
		if(isset($_POST["submit"]))
		{
			
			$name=$_POST["name"];
			$email=$_POST["email"];
			$comment=$_POST["comment"];
			
		
			
			
		
	 
		$con=mysqli_connect("localhost","root","","temp_db");
		if(!$con){
			echo("Sorry, We are facing a technical issue");
			die();
		
		}else{
			$sql="INSERT INTO `review_data`(`name`, `email`, `comment`) VALUES ('".$name."','".$email."','".$comment."');";
			if(mysqli_query($con,$sql))
			{
				
				mysqli_close($con);
			}else{
				
		     echo "Opps something is wrong, Please select the file again";
			
			}
			
		}}
		
		?>
		
		
		
		
      <form  method="post" action="reviews.php">
            <div class="comment">
                <h2>Add Your Comment</h2><br>
                <input type="text" placeholder="Name" class="comment_field" id="name" name="name"><br><br>
                <input type="text" placeholder="Email" class="comment_field" id="email" name="email"><br><br>
                <textarea placeholder="Address" rows="5" cols="20" class="comment_address" id="comment" name="comment"></textarea>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="sizeValidate()">
            </div>
        </form>
    </div>
    </footer>
    
    <div class="copyright">
        <p>Copyright © 2022 GetYouTrainer™ Inc. All Rights Reserved.</p>
    </div>
    
    </body>  
    
</html>