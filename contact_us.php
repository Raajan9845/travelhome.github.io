<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <!--<a href="home.php" class="logo">travel.</a>-->
   <a href="#" class="logo"> <img class="header-img is logo-img" alt="Travel Home" src="images/logo.png" title="Travel Home" width="150" height="80">> </a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
      <a href="conatct_us.php">contact us</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
   <h1>Contact us</h1>
</div>

<!-- about section starts  -->

<section class="about">

   <!--<div class="image">
      <img src="images/about-img.jpg" alt="">
   </div> -->

   <div class="container">
    <div class="content">
      <div class="left-side">
      <div class="col-lg-6 md-6 mb-5 px-4">

<div class="bg-white rounded shadow p-4">
    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.924577444506!2d85.33106357161044!3d27.69470332426478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew%20Baneshwor%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1679048500540!5m2!1sen!2snp" loading="lazy"></iframe>

  

  <h5 class="mt-4">Follow Us</h5>
    <a href="#" class="d-inline-block text-dark fs-5 me-2">
    <i class="bi bi-facebook me-1"></i> 
    </a>
    <a href="#" class="d-inline-block text-dark fs-5 me-2">
    <i class="bi bi-instagram me-1"></i> 
    </a>
    <a href="#" class="d-inline-block text-dark fs-5">
    <i class="bi bi-twitter me-1"></i> 
    </a>
</div>
</div>
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">pulchowk</div>
          <div class="text-two">kathmandu</div>
        </div>
        <div class="phone details">
        <i class="fas fa-phone"></i>
          <div class="topic">Phone</div>
          <div class="text-one">9874561230</div>
          <div class="text-two">98123654078</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">ssoftweb@gmail.com</div>
          <div class="text-two">ikhanas@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
     
        <form method="post">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="name" required>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" name="email" required>
        </div>
        <div class="input-box message-box">
        <input type="text" placeholder="Enter your Message" name="message"required> 
          
        </div>
       <!--<div class="button">
       <button class="btn" type="submit" name="submit"> send Now</button>
        </div>-->
        <!--<input type="send" value="send" class="btn" name="send"> --> 

        <button class="btn" type="submit" name="submit"> send Now</button>

      </form>
    </div>
    </div>
  </div>

</section> 

<!-- about section ends -->

<?php
   
   $con = mysqli_connect("localhost","root","","travelhome");
   
   if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      $q = " insert into user_queries(name, email, message) values('$name','$email','$message') ";

      $res = mysqli_query($con,$q);
      if($res==1){
         alert('success','mail sent');
      }
      else{
      echo 'something went wrong please try again!';
      }
   }
  ?>

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
         <a href="conatct_us.php"> <i class="fas fa-angle-right"></i> Contact</a>
      </div>

      <!--<div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div> -->

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 984-0600603 </a>
         <a href="#"> <i class="fas fa-phone"></i> 98123654078 </a>
         <a href="#"> <i class="fas fa-envelope"></i>Travelhome2020@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> New Baneswor, Kathmandu, Nepal </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>ssoftweb </span> | all rights reserved! </div>

</section>

<!-- footer section ends -->










<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>