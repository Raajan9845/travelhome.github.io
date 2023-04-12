<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>package</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <?php require('admin/inc/db_config.php'); ?>
   <?php require('admin/inc/essentials.php'); ?>

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
      <a href="contact_us.php">contact us</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
   <h1>packages</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

   <h1 class="heading-title">top destinations</h1>

   <div class="box-container">

      <!-- <div class="card mb-4 border-0 shadow"> -->
         <?php
            $res = select("SELECT * FROM `packages` WHERE `removed`=?",[0],'i');
            $path = PACKAGE_IMG_PATH;

            while($row = mysqli_fetch_assoc($res)){
               echo<<<data
                 

                  <div class="box">
                     <div class="image">
                        <img src='$path$row[image]'>
                     </div>
                     <div class="content">
                        <h3>$row[name]</h3>
                        <p>$row[description]</p>
                        <a href="book.php" class="btn">book now</a>
                     </div>
                  </div>
               data;
            }
         ?>
      </div>
<!-- 
      <div class="card mb-4 border-0 shadow">
                     <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow">
                        <img src="$path$row[image]">
                        <h3>$row[name]</h3>
                        <p>$row[description]</p>
                     </div>
                  </div> -->

      <!-- <div class="box">
         <div class="image">
            <img src="images/package-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/package-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-6.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-7.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-8.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-9.jpg" alt="">
         </div>
         <div class="content">
            <h3>adventure & tour</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, perspiciatis!</p>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div> -->

   </div>

   <div class="load-more"><span class="btn">load more</span></div>

</section>

<!-- packages section ends -->
















<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
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