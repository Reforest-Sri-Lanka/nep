   <!-- The Modal for Create -->
   <div class="modal" id="userCreate">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">Create User</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form action="" method="">
                       <h6>Personal Details</h6>
                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Full Name</span>
                           </div>
                           <input type="text" class="form-control">
                       </div>

                       <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="Your Email">
                           <div class="input-group-append">
                               <span class="input-group-text">@example.com</span>
                           </div>
                       </div>
                       <select name="Role" class="custom-select">
                           <option selected>Select Role</option>
                           <option value="admin">Administrator</option>
                           <option value="head">Head of Org.</option>
                           <option value="manager">Manager</option>
                           <option value="staff">Staff</option>
                           <option value="citizen">Citizen</option>
                       </select>
                       <hr>
                       <h6>Additional Details</h6>
                       <select name="Organization" class="custom-select mb-3">
                           <option selected>Select Organization</option>
                           <option value="MoE">Ministry of Environment</option>
                           <option value="MoW">Ministry of Wildlife</option>
                           <option value="RDA">Road Development Agency</option>
                       </select>
                       <select name="Designation" class="custom-select">
                           <option selected>Select Designation</option>
                           <option value="manager">Manager</option>
                           <option value="dept.manager">Depity Manager</option>
                           <option value="assit.manager">Assistant Manager</option>
                       </select>
                       <hr>
                       <div class="form-check">
                           <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" value=""><strong>This information has been verified.</strong>
                           </label>
                       </div>


               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
           </div>
       </div>
   </div>

   <!-- Modal for Edit -->
   <div class="modal" id="userEdit">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">Edit User</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form action="" method="">
                       <h6>Personal Details</h6>
                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Full Name</span>
                           </div>
                           <input type="text" class="form-control" placeholder="current user's name">
                       </div>

                       <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="current user's email">
                           <div class="input-group-append">
                               <span class="input-group-text">@example.com</span>
                           </div>
                       </div>
                       <select name="Role" class="custom-select mb-3">
                           <option selected>Current Role</option>
                           <option value="admin">Administrator</option>
                           <option value="head">Head of Org.</option>
                           <option value="manager">Manager</option>
                           <option value="staff">Staff</option>
                           <option value="citizen">Citizen</option>
                       </select>
                       <select name="Organization" class="custom-select mb-3">
                           <option selected>Current Organization</option>
                           <option value="MoE">Ministry of Environment</option>
                           <option value="MoW">Ministry of Wildlife</option>
                           <option value="RDA">Road Development Agency</option>
                       </select>
                       <select name="Designation" class="custom-select">
                           <option selected>Current Designation</option>
                           <option value="manager">Manager</option>
                           <option value="dept.manager">Depity Manager</option>
                           <option value="assit.manager">Assistant Manager</option>
                       </select>
                       <hr>
                       <div class="form-check">
                           <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" value=""><strong>This information has been verified.</strong>
                           </label>
                       </div>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Edit</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
           </div>
       </div>
   </div>

   <!-- The Modal for privilege-->
   <div class="modal" id="privilege">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">Edit Privilege</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form action="" method="">
                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">User ID:</span>
                           </div>
                           <input type="text" class="form-control" placeholder="(shows user id. can't be edited)" readonly>
                       </div>

                       <select name="Role" class="custom-select mb-3" disabled>
                           <option selected>(will show current role. cannot be edited)</option>
                           <option value="admin">Administrator</option>
                           <option value="head">Head of Org.</option>
                           <option value="manager">Manager</option>
                           <option value="staff">Staff</option>
                           <option value="citizen">Citizen</option>
                       </select>
                       <label class="ml-1" for="modules">Module List:</label>
                       <div class="ml-3">
                           <fieldset>
                               <input type="checkbox" name="modules[]" value="general"><label class="ml-2">General Module</label> <br>
                               <input type="checkbox" name="modules[]" value="user"><label class="ml-2">User Module</label> <br>
                               <input type="checkbox" name="modules[]" value="admin"><label class="ml-2">Administrator Module</label> <br>
                               <input type="checkbox" name="modules[]" value="security"><label class="ml-2">Security Module</label> <br>
                               <input type="checkbox" name="modules[]" value="env"><label class="ml-2">Environmental Module</label> <br>
                           </fieldset>
                       </div>


               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Save</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
           </div>
       </div>
   </div>


   <!-- Modal for More details -->
   <div class="modal" id="moreInfo">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">All Data</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form action="/action_page.php">
                       <div class="form-group">
                           <label class="ml-1">Name:</label>
                           <label>username</label>                           
                       </div>
                       <div class="form-group">
                           <label class="ml-1">Email:</label>
                           <label>useremail</label>   
                       </div>
                       <div class="form-group">
                           <label class="ml-1">Role:</label>
                           <label>userrole</label>   
                       </div>
                       <div class="form-group">
                           <label class="ml-1">Organization:</label>
                           <label>userorg</label>   
                       </div>
                       <div class="form-group">
                           <label class="ml-1">Designation:</label>
                           <label>userdesig</label>   
                       </div>
                       <label class="ml-1" for="modules">Module List:</label>
                       <div class="ml-3">
                           <fieldset disabled>
                               <input type="checkbox" name="modules[]" value="general"><label class="ml-2">General Module</label> <br>
                               <input type="checkbox" name="modules[]" value="user"><label class="ml-2">User Module</label> <br>
                               <input type="checkbox" name="modules[]" value="admin"><label class="ml-2">Administrator Module</label> <br>
                               <input type="checkbox" name="modules[]" value="security"><label class="ml-2">Security Module</label> <br>
                               <input type="checkbox" name="modules[]" value="env"><label class="ml-2">Environmental Module</label> <br>
                           </fieldset>
                       </div>
                   </form>

               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
           </div>
       </div>
   </div>