<div class="container-fluid bg-white mt-5">
   <div class="row">
      <div class="col-lg-4 p-4">
         <h3 class="h-font fw-bold fs-3 mb-2">FRESH HOMESTAY</h3>
         <p>
         Founded in 2013 by travel industry veterans Same and Noy <br>(Lao Partners & A Star Home stay Group), with a vision of taking an offline industry online and making homestays and private room rental a popular accommodation choice.
         </p>
      </div>
      <div class="col-lg-4 p-4">
         <h5 class="mb-3">Links</h5>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
      </div>
      <div class="col-lg-4 p-4">
         <h5 class="mb-3">Follow us</h5>
         <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-twitter me-1"></i>Twitter
         </a><br>
         <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-facebook me-1"></i>Facebook
         </a><br>
         <a href="#" class="d-inline-block text-dark text-decoration-none ">
            <i class="bi bi-instagram me-1"></i>Instagram
         </a>
      </div>
   </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by SNK-Solution</h6>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script>
   let register_form = document.getElementById('register-form');
   register_form.addEventListener('submit',(e)=>{
      e.preventDefault();
      let data = new FormData();
      data.append('name',register_form.elements['name'].value);
      data.append('email',register_form.elements['email'].value);
      data.append('phonenum',register_form.elements['phonenum'].value);
      data.append('address',register_form.elements['address'].value);
      data.append('pincode',register_form.elements['pincode'].value);
      data.append('dob',register_form.elements['dob'].value);
      data.append('pass',register_form.elements['pass'].value);
      data.append('cpass',register_form.elements['cpass'].value);
      data.append('profile',register_form.elements['profile'].files[0]);
      data.append('register','');

      var myModal = document.getElementById('registerModal');
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();

      let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            

            xhr.onload = function() {
               if(this.responseText == 'pass_mismatch'){
                  alert('error',"Password Missmatch");
               }else if(this.responseText == 'email_already'){
                  alert('error',"Email is already registered!");
               }
               else if(this.responseText == 'phone_already'){
                  alert('error',"Phone is already registered!");
               }
               else if(this.responseText == 'inv_img'){
                  alert('error',"Only JPG,WEBP & PNG image are allowed!");
               }
               else if(this.responseText == 'upd_failed'){
                  alert('error',"Image upload failed!");
               }
               else if(this.responseText == 'ins_failed'){
                  alert('error',"Registation failed! Server Down!");
               }else{
                  alert('success',"Registation successful.");
                  register_form.reset();
               }
      }
      xhr.send(data);
   });
   
</script>