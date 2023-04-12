
let add_package_form = document.getElementById('add_package_form');
let package_image_inp = document.getElementById('package_image_inp');
let package_name_inp = document.getElementById('package_name_inp');
let package_description_inp = document.getElementById('package_description_inp');


package_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_packages();
});

function add_packages()
{
  let data = new FormData();
  data.append('name',package_name_inp.value);
  data.append('image',package_image_inp.files[0]);
  data.append('description',package_detail_inp.value);
  data.append('add_packages','');

  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/package.php",true);

  xhr.onload = function(){
    var myModal = document.getElementById('package-s');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if(this.responseText == 'inv_img'){
      alert('error','Only JPG and PNG images are allowed!');  
    }
    else if(this.responseText == 'inv_size'){
      alert('error','Image should be less than 2MB!');
    }
    else if(this.responseText == 'upd_failed'){
      alert('error','Image uploaded failed!!')
    }
    else{
      alert('success','New package added!');
      package_picture_inp.value='';
      get_packages(); 
    }
  }

  xhr.send(data);
}

function get_packages()
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/package.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    document.getElementById('package-data').innerHTML = this.responseText;
  }

  xhr.send('get_packages');
}

function rem_packages(val)
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/settings_crud.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    if(this.responseText==1){
      alert('success','package deleted');
      get_packages();
    }
    else{
      alert('error','Server-down!');
    }
  }

  xhr.send('rem_packages='+val);
}


window.onload = function () {
    get_packages();
};

