<?php

  //frontend upload process need this data

  define('SITE_URL','http://127.0.0.1/Travel website/');
  define('ABOUT_IMG_PATH',SITE_URL.'images/about');
  define('PACKAGE_IMG_PATH',SITE_URL.'images/packages/');

  //backend upload process need this data

  define('UPLOAD_IMG_PATH',$_SERVER['DOCUMENT_ROOT'].'/Travel website/images/');
  define('ABOUT_FOLDER','about/');
  define('PACKAGE_FOLDER','packages/');


  function adminLogin()
  {
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
      echo"<script>
        window.location.href='index.php';
      </script>";
    }
    //session_regenerate_id(true);
  }

  function redirect($url)
  {
    echo"<script>
      window.location.href='$url';
    </script>";
    exit;
  }

  function alert($type,$msg)
  {
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
      <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    alert;
  }

  function uploadImage($images,$folder)
  {
    $valid_mime = ['image/jpeg','image/png','image/webp'];
    $img_mime = $images['type'];

    if(!in_array($img_mime,$valid_mime)){
      return 'inv_img'; //invalid image mime or format
    }
    else if(($images['size']/(1024*1024))>2){
      return 'inv_size'; //invalid size greate than 2mb
    }
    else{
      $ext = pathinfo($images['name'],PATHINFO_EXTENSION);
      $rname = 'IMG_'.random_int(11111,99999).".$ext";

      $img_path = UPLOAD_IMG_PATH.$folder.$rname;
      if(move_uploaded_file($images['tmp_name'],$img_path)){
        return $rname;
      }
      else{
        return 'upd_failed';
      }
    }
  }

  function deleteImage($images, $folder)
  {
    if(unlink(UPLOAD_IMG_PATH.$folder.$images)){
      return true;
    }
    else{
      return false;
    }
  }


?>
