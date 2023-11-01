<div style="position:absolute !important; 
            top:50% !important;
            left:50% !important;
            transform:translate(-50%, -50% )!important;
           " class="container">
   <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
         <!-- Register -->
         <div class="card" style="max-width: 100%;">
            <div class="card-body">

               <!-- /Logo -->
               <h4 class="mb-2">Sign up</h4><br>
               <div id="registration-error-message"></div>
               <form id="register" class="mb-3" method="POST">
                  <input type="hidden" name="action" value="1">
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="text" class="form-control" name="email" placeholder="Enter your email" autofocus>
                  </div>
                  <div class="mb-3 form-password-toggle">
                     <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                     </div>
                     <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer">
                           <i class="fas fa-eye-slash"></i> <!-- For hide -->
                           <i class="fas fa-eye"></i> <!-- For show -->
                        </span>
                     </div>
                  </div>
                  <div class="mb-3">
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me">
                        <label class="form-check-label" for="remember-me">
                           Remember Me
                        </label>
                     </div>
                  </div>
                  <div class="mb-3">
                     <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
                  </div>
                  <div style="text-align: right;" class="side_txt">
                     <p><a style="text-decoration: none;" href="../admin/login.php">Already have an account</a></p>
                  </div>
               </form>

            </div>
         </div>
         <!-- /Register -->
      </div>
   </div>
</div>
<script>
   // Wait for the document to be ready
   $(document).ready(function() {
      // Select the eye icons
      var showPasswordIcon = $(".fa-eye");
      var hidePasswordIcon = $(".fa-eye-slash");

      // Select the password input field
      var passwordInput = $("input[name='password']");

      // Initially, the password should be hidden, so hide the "show" icon
      showPasswordIcon.hide();

      // Add click event handlers to the icons
      showPasswordIcon.click(function() {
         // Show the password and hide the "show" icon
         passwordInput.attr("type", "text");
         showPasswordIcon.hide();
         hidePasswordIcon.show();
      });

      hidePasswordIcon.click(function() {
         // Hide the password and hide the "hide" icon
         passwordInput.attr("type", "password");
         hidePasswordIcon.hide();
         showPasswordIcon.show();
      });
   });
</script>