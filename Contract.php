<?php include 'admin/inc/header.php';?>
               
                     <div class="content">
         <div class="container">
             <div class="row">

                     <div class="col-md-3">
                         <div class="row">
                             <div class="col-md-12">


                                 <?php include 'admin/inc/sub-sidebar.php';?>
                             </div>

                         </div>

                     </div>
             <div class="col-md-6">
            <div class="main-menu">
            <h2>Contact with me</h2>
                <?php include 'admin/inc/main-content.php';?>
                         <div class="fb">
                             <a href="https://www.facebook.com/abm.khorshedalamrifat" target="_blank"><img src="assets/pic/fb_icon_325x325.png" alt=""></a>
                         </div>  
                             
                             </div>
                         </div>

                 <div class="col-md-3">
                     <div class="row">
                         <div class="col-md-12">


                             <?php include 'admin/inc/sub-sidebar.php';?>
                         </div>

                     </div>

                 </div>
                     </div>
                 </div>
             </div>   
             
          
              
               <div class="send-message">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="message-text">
                                   <h2>Send me a text !!!</h2>
                               </div>
                           </div>
                           <div class="col-md-8 col-md-offset-2">
                              <div class="send-table">
                         <form class="">
                         <div class="form-group">
                         <label>First Name</label>
                         <input type="text" name="first_name" class="form-control">
                         </div>
                         <div class="form-group">
                         <label for="last_name">Last Name</label>
                         <input id="last_name" type="text" name="last_name" class="form-control">
                         </div>
                         
                         <div class="form-group">
                         <label>phone</label>
                         <input type="number" name="phone" class="form-control">
                        
                         <div class="form-group">
                         <label>Gender</label>
                         <div class="radio">
                             <label> <input type="radio" name="gender">Male</label>
                               <label> <input type="radio" name="gender">Female</label>
                         </div>
                         </div>
                         
                         
                          <div class="form-group">
                         <label>Message</label>
                         <textarea class="form-control" name="address" rows="10" style="resize:vertical "></textarea>
                         </div>
                         <div class="form-group">
                         <label>Location</label>
                         <select class="form-control" name="district_name">
                         <option>---select--</option>
                         <option>Dhaka</option>
                         <option>Chittagong</option>
                         <option>Shylet</option>
                         <option>Rajshahi</option>
                         <option>Barisal</option>
                         <option>Khulna</option>
                         <option>Mymensingh</option>
                         <option>Rangpur</option>
                         </select>
                         </div>
                           
                         <div class="form-group">
                             <input type="button" name="btn" class="btn btn-success btn-block" value="Submit">
                         </div>
                     </form>
                     
                              </div> 
                           </div>
                       </div>
                   </div>
               </div>
                 
               
    <?php include 'admin/inc/footer.php';?>