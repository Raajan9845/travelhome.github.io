<?php 
  
  require('../inc/db_config.php');
  require('../inc/essentials.php');
  adminLogin();

  if(isset($_POST['add_package']))
  {
    
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'],PACKAGE_FOLDER);

    if($img_r == 'inv_img'){
      echo $img_r;
    }
    else if($img_r == 'inv_size'){
      echo $img_r;
    }
    else if($img_r == 'upd_failed'){
      echo $img_r;
    }
    
    else{
      $q1 = "INSERT INTO `packages`(`image`, `name`, `description`) VALUES (?,?,?)";
      $values =[$img_r,$frm_data['name'],$frm_data['desc']];
  
      $res = insert($q1,$values,'sss');
      echo $res;
    }

  }

  if(isset($_POST['get_all_package']))
  {
    $res = select("SELECT * FROM `packages` WHERE `removed`=?",[0],'i');
    $i = 1;

    $data = "";

    while($row = mysqli_fetch_assoc($res))
    {
      // if($row['status']==1){
      //   $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
      // }
      // else{
      //   $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
      // }

      $data.="
        <tr class='align-middle'>
          <td>$i</td>
          <td>$row[image]</td>
          <td>$row[name]</td>
          <td>$row[description]</td>
          
          <td>
            <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-package'>
              <i class='bi bi-pencil-square'></i>
            </button>
            <button type='button' onclick=\"package_images($row[id],'$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#package-images'>
              <i class='bi bi-images'></i>
            </button>
            <button type='button' onclick='remove_package($row[id])' class='btn btn-danger shadow-none btn-sm'>
              <i class='bi bi-trash'></i>
            </button>
          </td>
        </tr>
      ";
      $i++;
    }
    echo $data;
  }

  if(isset($_POST['get_package']))
  {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `packages` WHERE `id`=?",[$frm_data['get_package']],'i');

    $packagedata = mysqli_fetch_assoc($res1);

    $data = ["packagedata" => $packagedata];

    $data = json_encode($data);

    echo $data;

  }

  if(isset($_POST['edit_package']))
  {

    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'],PACKAGE_FOLDER);

    if($img_r == 'inv_img'){
      echo $img_r;
    }
    else if($img_r == 'inv_size'){
      echo $img_r;
    }
    else if($img_r == 'upd_failed'){
      echo $img_r;
    }
    
    else{
      $q = "UPDATE `packages` SET `image`=?,`name`=?,`description`=? WHERE `id`=?";
      $values = [$img_r,$frm_data['name'],$frm_data['desc'],$frm_data['package_id']];
      
      if(update($q,$values,'sssi')){
        alert('success',"Package edited");
      }
      else{
        alert('error',"Server down");

      }
    }
    

  }

 

  if(isset($_POST['add_image']))
  {
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'],PACKAGE_FOLDER);

    if($img_r == 'inv_img'){
      echo $img_r;
    }
    else if($img_r == 'inv_size'){
      echo $img_r;
    }
    else if($img_r == 'upd_failed'){
      echo $img_r;
    }
    else{
      $q = "INSERT INTO `package_image`(`package_id`, `image`) VALUES (?,?)";
      $values = [$frm_data['package_id'],$img_r];
      $res = insert($q,$values,'is');
      echo $res;
    }
  }

  if(isset($_POST['get_package_image']))
  {
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `package_image` WHERE `package_id`=?",[$frm_data['get_package_image']],'i');

    $path = PACKAGE_IMG_PATH;

    while($row = mysqli_fetch_assoc($res))
    {
      if($row['thumb']==1){
       $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>";
      }
      else{
        $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[package_id])' class='btn btn-secondary shadow-none'>
          <i class='bi bi-check-lg'></i>
        </button>";
      }

      echo<<<data
        <tr class='align-middle'>
          <td><img src='$path$row[image]' class='img-fluid'></td>
          <td>$thumb_btn</td>
          <td>
            <button onclick='rem_image($row[sr_no],$row[package_id])' class='btn btn-danger shadow-none'>
              <i class='bi bi-trash'></i>
            </button>
          </td>
        </tr>
      data;
    }

    
  }

  if(isset($_POST['rem_image']))
  {
    $frm_data = filteration($_POST);
    $values = [$frm_data['image_id'],$frm_data['package_id']];

    $pre_q = "SELECT * FROM `package_image` WHERE `sr_no`=? AND `package_id`=?";
    $res = select($pre_q,$values,'ii');
    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['image'],PACKAGE_FOLDER)){
      $q = "DELETE FROM `package_image` WHERE `sr_no`=? AND `package_id`=?";
      $res = del($q,$values,'ii');
      echo $res;
    }
    else{
      echo 0;
    }
  }

  if(isset($_POST['thumb_image']))
  {
    $frm_data = filteration($_POST);
   
    $pre_q = "UPDATE `package_image` SET `thumb`=? WHERE `package_id`=?";
    $pre_v = [0,$frm_data['package_id']];
    $pre_res = update($pre_q,$pre_v,'ii');

    $q = "UPDATE `package_image` SET `thumb`=? WHERE `sr_no`=? AND`package_id`=?";
    $v = [1,$frm_data['image_id'],$frm_data['package_id']];
    $res = update($q,$v,'iii');

    echo $res;
  }

  if(isset($_POST['remove_package']))
  {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `package_image` WHERE `package_id`=?",[$frm_data['package_id']],'i');

    while($row = mysqli_fetch_assoc($res1)){
      deleteImage($row['image'],PACKAGE_FOLDER);
    }

    // $q1 = ("DELETE FROM `package_image` WHERE `package_id`=?");
    // $v1 = [$frm_data['package_id']];
    // $res2 = del($q1,$v1,'i');

    $res2 = del("DELETE FROM `package_image` WHERE `package_id`=?",[$frm_data['package_id']],'i');


    

    // $res2 = delete("DELETE FROM `package_image` WHERE `package_id`=?",[$frm_data['package_id']],'i');


    $q = "UPDATE `packages` SET `removed`=? WHERE `id`=?";
    $v = [1,$frm_data['package_id']];
    $res5 = update($q,$v,'ii');

    // $res5 = update("UPDATE `packages` SET `image`=?,`name`=?,`description`=? WHERE `id`=?",[1,$frm_data['package_id']].'sssi');

    if($res2 || $res5)
    {
      alert('success',"Package deleted");
    }
    else{
      alert('error',"server down");
    }

  }

  

?>