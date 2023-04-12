<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Packages</title>
  <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
   
  <?php require('inc/header.php'); ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4" >PACKAGES</h3> 

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="text-end mb-4">
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-package">
                <i class="bi bi-plus-square mb-2"></i>Add
              </button>
            </div>

            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
              <table class="table table-hover border text-center">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="package-data">
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div> 



  <!-- Add package modal  -->

  <div class="modal fade" id="add-package" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="add_package_form" autocomplete="off">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Package</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" min="1" name="name" class="form-control shadow-none" required>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
              </div>
            </div>            
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
          </div>
        </div>
      </form>    
    </div>
  </div>


  <!-- Edit package modal  -->

  <div class="modal fade" id="edit-package" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="edit_package_form" autocomplete="off">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Package</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" min="1" name="name" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea type="text" min="1" name="description" class="form-control shadow-none" required>
              </div>
              <input type="hidden" name="" id="package_id">
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
          </div>
          <!-- <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">Submit</button>
          </div> -->
        </div>
      </form>    
    </div>
  </div>


  <!-- Manage package images modal -->

  <div class="modal fade" id="package-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Name</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="image-alert"></div>
          <div class="border-bottom border-3 pb-3 mb-3">  
            <form id="add_image_form">
              <label class="form-label fw-bold">Add Image</label>
              <input type="file" name="image" accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none mb-2" required>
              <button class="btn custom-bg text-white shadow-none">ADD</button>
              <input type="hidden" name="package_id">
            </form>
          </div>
          <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
            <table class="table table-hover border text-center">
              <thead>
                <tr class="bg-dark text-light sticky-top">
                  <th scope="col" width="60%">Images</th>
                  <th scope="col">Thumb</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody id="package-image-data">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




  <?php require('inc/scripts.php'); ?> 
  
  <script>

    let add_package_form = document.getElementById('add_package_form');


    add_package_form.addEventListener('submit',function(e){
      e.preventDefault();
      add_package();
    });

    function add_package()
    {
      let data = new FormData();
      data.append('add_package','');
      data.append('image',add_package_form.elements['image'].files[0]);
      data.append('name',add_package_form.elements['name'].value);
      data.append('desc',add_package_form.elements['desc'].value);
     
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);

      xhr.onload = function()
      {
        var myModal = document.getElementById('add-package');
        var modal = bootstrap.Modal.getInstance(myModal); 
        modal.hide();

        if(this.responseText==1)
        {
          alert('success', 'New package added!');
          add_package_form.reset();
          get_all_package();
        }
        else{
          alert('error', 'Server Down!');
        }
      }

      xhr.send(data);
    }

    function get_all_package()
    {
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function()
      {
        document.getElementById('package-data').innerHTML = this.responseText;
      }

      xhr.send('get_all_package');
    }

    let edit_package_form = document.getElementById('edit_package_form');

    function edit_details(id)
    {
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function()
      {
        let data = JSON.parse(this.responseText);

        edit_package_form.elements['image'].files[0] = data.packagedata.image;
        edit_package_form.elements['name'].value = data.packagedata.name;
        edit_package_form.elements['description'].value = data.packagedata.description;
        edit_package_form.elements['package_id'].value = data.packagedata.id;

      }

      xhr.send('get_package='+id);
    }

    edit_package_form.addEventListener('submit',function(e){
      e.preventDefault();
      submit_edit_package();
    });

    function submit_edit_package()
    {
      let data = new FormData();
      data.append('edit_package','');
      data.append('package_id',edit_package_form.elements['package_id'].value);
      data.append('image',edit_package_form.elements['image'].files[0]);
      data.append('name',edit_package_form.elements['name'].value);
      data.append('desc',edit_package_form.elements['description'].value);
      
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);

      xhr.onload = function()
      {
        var myModal = document.getElementById('edit-package');
        var modal = bootstrap.Modal.getInstance(myModal); 
        modal.hide();

        if(this.responseText == 1)
        {
          alert('success', 'Package Edited!');
          edit_package_form.reset();
          get_all_package();
        }
        else{
          alert('success','package edited ');
        }
      }

      xhr.send(data);
    }

    // function toggle_status(id,val)
    // {
    //   let xhr = new XMLHttpRequest();
    //   xhr.open("POST","ajax/package.php",true);
    //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    //   xhr.onload = function()
    //   {
    //     if(this.responseText==1){
    //       alert('success','Status toggled!');
    //       get_all_packages();
    //     }
    //     else{
    //       alert('success','Server Down!');
    //     }
    //   }

    //   xhr.send('toggle_status='+id+'&value='+val);
    // }


    let add_image_form = document.getElementById('add_image_form')

    add_image_form.addEventListener('submit',function(e){
      e.preventDefault();
      add_image();
    });

    function add_image()
    {
      let data = new FormData();
      data.append('image',add_image_form.elements['image'].files[0]); 
      data.append('package_id',add_image_form.elements['package_id'].value); 
      data.append('add_image','');

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);

      xhr.onload = function()
      {
        if(this.responseText == 'inv_img')
        {
          alert('error','Only JPG, WEBP and PNG images are allowed!','image-alert');
        }
        else if(this.responseText == 'inv_size')
        {
          alert('error','Image should be less than 2MB!','image-alert');
        }
        else if(this.responseText == 'upd_failed')
        {
          alert('error','Image upload failed, Server Down!','image-alert');
        }
        else{
          alert('success', 'New Image added!','image-alert');
          package_images(add_image_form.elements['package_id'].value,document.querySelector("#package-images .modal-title").innerText);
          add_image_form.reset();          
        }
      }

      xhr.send(data);
    }

    function package_images(id,rname)
    {
      document.querySelector("#package-images .modal-title").innerText = rname;
      add_image_form.elements['package_id'].value = id;
      add_image_form.elements['image'].files[0] = '';

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function()
      {
        document.getElementById('package-image-data').innerHTML = this.responseText;
      }

      xhr.send('get_package_image='+id);
    }

    function rem_image(img_id,package_id)
    {
      let data = new FormData();
      data.append('image_id',img_id); 
      data.append('package_id',package_id); 
      data.append('rem_image','');

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);

      xhr.onload = function()
      {
        if(this.responseText == 1)
        {
          alert('success', 'Image Removed!','image-alert');
          package_images(package_id,document.querySelector("#package-images .modal-title").innerText);
        }
        else{
          alert('error','Image removal failed!','image-alert');
        }
      }
      xhr.send(data);
    }

    function thumb_image(img_id,package_id)
    {
      let data = new FormData();
      data.append('image_id',img_id); 
      data.append('package_id',package_id); 
      data.append('thumb_image','');

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/package.php",true);

      xhr.onload = function()
      {
        if(this.responseText == 1)
        {
          alert('success', 'Image Thumbnail changed!','image-alert');
          package_images(package_id,document.querySelector("#package-images .modal-title").innerText);
        }
        else{
          alert('error','thumbnail removal failed!','image-alert');
        }
      }
      xhr.send(data);
    }

    function remove_package(package_id)
    {
      if(confirm("Are you sure want to delete this package?"))
      {
        let data = new FormData();
        data.append('package_id',package_id);
        data.append('remove_package','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/package.php",true);

        xhr.onload = function()
        {
          if(this.responseText == 1)
          {
            alert('success', 'Package Removed!');
            get_all_package();
          }
          else{
            alert('success','Package removed!');
          }
        }
        xhr.send(data);
      }
    }


    window.onload = function () {
      get_all_package();
    }
  </script>

</body>
</html>