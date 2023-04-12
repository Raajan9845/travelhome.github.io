<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(isset($_GET['seen']))
    {
      $frm_data = filteration($_GET);

      /*if($frm_data['seen']=='all'){
        $q = "UPDATE `booking` SET `seen`=? ";
        $values = [1];
        if(update($q,$values,'i')){
          alert('success','Mark all as read');
        }
        else{
          alert('error','Operation Failed');
        }
      }*/
        $q = "UPDATE `booking` SET `seen`=? WHERE `id`=?";
        $values = [1,$frm_data['seen']];
        if(update($q,$values,'ii')){
          alert('success','Mark as read');
        }
      else{
          alert('error','Operation Failed');
        }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel- Booking</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
              <h3 class="mb-4">Booking</h3>

                <div class="card border-0 shadow-sm mb-4">
                  <div class="card-body">
                    <div class="text-end mb-4">
                    </div>
                    <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                      <table class="table table-hover border">
                        <thead class="sticky-top">
                          <tr class="bg-dark text-light">
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Location</th>
                            <th scope="col">Guests</th>
                            <th scope="col">Arrivals</th>
                            <th scope="col">Leavings</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                             $q = "SELECT * FROM `booking` ORDER BY `id` DESC";
                             $data = mysqli_query($con,$q);
                             $i=1;

                             while($row = mysqli_fetch_assoc($data))
                             {
                                $seen='';
                                if($row['seen'] =1){
                                    $seen ="<a href='?seen=$row[id]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a>";
                                }
                                //$seen.="<a href='?del=$row[id]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                               echo<<<query
                                  <tr>
                                    <td>$i</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[phone]</td>
                                    <td>$row[address]</td>
                                    <td>$row[location]</td>
                                    <td>$row[guests]</td>
                                    <td>$row[arrivals]</td>
                                    <td>$row[leavings]</td>
                                    <td>$seen</td>
                                  </tr>
                               query;
                               $i++;
                             }
                           ?> 
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>

            </div>
        </div>
    </div>
    




    <?php require('inc/scripts.php'); ?>
</body>
</html> 