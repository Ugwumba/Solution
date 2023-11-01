<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Profile /</span> Password
   </h4>
   <div class="row">
      <div class="col-lg-6 mb-4 order-0">

         <!-- Ajax Sourced Server-side -->
         <div class="card">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body text-nowrap">
               <form id="change-password" class="mb-3">
                  <input type="hidden" name="action" value="10">
                  <input type="hidden" name="guid" value="<?php echo $_SESSION['id']; ?>">
                  <div class="mb-3 form-password-toggle">
                     <div class="d-flex justify-content-between">
                        <label class="form-label">Old Password</label>
                     </div>
                     <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="oldpassword" placeholder="*******" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                     </div>
                  </div>
                  <div class="mb-3 form-password-toggle">
                     <div class="d-flex justify-content-between">
                        <label class="form-label">New Password</label>
                     </div>
                     <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="newpassword" placeholder="*******" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                     </div>
                  </div>
                  <div class="mb-3 form-password-toggle">
                     <div class="d-flex justify-content-between">
                        <label class="form-label">Confirm New Password</label>
                     </div>
                     <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="cnewpassword" placeholder="*******" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                     </div>
                  </div>
                  <div class="mb-3">
                     <button class="btn btn-primary d-grid w-100" type="submit">Change Password</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>
</div>