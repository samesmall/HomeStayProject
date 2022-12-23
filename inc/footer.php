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

<script> 
    function alert(type,msg,position='body'){
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class = "me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        if (position == 'body'){
            document.body.append(element);
            element.classList.add('custom-alert');
        }else{
            document.getElementById(position).appendChild(element);
        }
   
        setTimeout(remAlert, 3000);
    }
    function setActive()
    {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');
        for(i=0;i<a_tags.length; i++){
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name) >= 0){
                a_tags[i].classList.add('active');
            }
        }
    }
    function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
    }

   let register_form = document.getElementById('register-form');
   register_form.addEventListener('submit',(e)=>{
      e.preventDefault();
      let data = new FormData();
      data.append('name',register_form.elements['name'].value);
      data.append('email',register_form.elements['email'].value);
      data.append('phonenum',register_form.elements['phonenum'].value);
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
               console.log(this.responseText)
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

   let forgot_form = document.getElementById('forgot-form');
   forgot_form.addEventListener('submit',(e)=>{
      e.preventDefault();
      let data = new FormData();
      data.append('email',forgot_form.elements['email'].value);
      data.append('forgot_pass','');

      var myModal = document.getElementById('forgotModal');
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();

      let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            

            xhr.onload = function() {
               console.log(this.responseText);
               if(this.responseText == 'inv_email_mob'){
                  alert('error',"Invalid Email or Mobile Number!");
               }
               else if(this.responseText == 'not_verified'){
                  alert('error',"Email is not verified!");
               }
               else if(this.responseText == 'inactive'){
                  alert('error',"Account Suspended! Please contact Admin.");
               }
               else 
               if(this.responseText == 'invalid_pass'){
                  alert('error',"Incorrect Password!");
               }else{
               let fileurl = window.location.href.split('/').pop().split('?').shift();
               if(fileurl == 'room_details.php'){
                  window.location = window.location.href;
               }
               else{
               window.location = window.location.pathname;
               }
            }
      }
      xhr.send(data);
   });

   function checkLoginToBook(status,room_id){
      if(status){
         window.location.href='confirm_booking.php?id='+room_id;
      }
      else{
         alert('error','Please login to book room!');
      }
   }
   setActive();
   
</script>