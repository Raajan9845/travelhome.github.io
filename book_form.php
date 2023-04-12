<?php

   $con = mysqli_connect('localhost','root','','Travelhome');

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leavings = $_POST['leavings'];

      $q = "INSERT INTO `booking` (`name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leavings`) VALUES('$name','$email','$phone','$address','$location','$guests','$arrivals','$leavings')";
      
      mysqli_query($con, $q);

      header('location:book.php');
   }else{
      echo'something went wrong please try again!';
   }

?>