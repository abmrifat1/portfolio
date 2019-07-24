<?php


require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedMainSidebar();


?>



<?php include 'admin/inc/header.php';?>
                   
           <div class="my-details">
               <div class="container">
                   <div class="row">
                <div class="col-md-6">
                  <div class="space100"></div>  
                  <div class="space100"></div>  
                 <table class="name">
                    
  <tr>
    <th style="background-color:#FFF;">Nmae</th>
    <th style="background-color:#4C9DEF;">Khorshed Alam</th>
    
  </tr>
                <tr>
    <th>Nick-name</th>
    <th style="background-color:#F7649B;">Rifat</th>
    
  </tr>
              
                <tr>
    <th style="background-color:#FFF;">Email</th>
    <th style="background-color:#4C9DEF;">Rifatabm1@gmail.com</th>
    
  </tr>
                <tr>
    <th style="background-color:#FFF;">Desination</th>
    <th style="background-color:#F7649B;">Web Designer</th>
    
  </tr>
                <tr>
    <th style="background-color:#FFF;">Phone-number</th>
    <th style="background-color:#4C9DEF;">01772515721</th>
    
  </tr>
                 </table>
                       </div>
                       <div class="col-md-6">
                         <div class="space30"></div>
                          <div class="mypic">
                           <img src="assets/pic/mee.jpg" alt="">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
                
                  
          <div class="content">
         <div class="container">
             <div class="row">
               <div class="col-md-3">
                 <div class="row">
                     <div class="col-md-12">


                         <?php include 'admin/inc/main-sidebar.php';?>
                     </div>

                 </div>

               </div>



             <div class="col-md-6">
            <div class="main-menu">
                <h2 align="center">My 10 dream</h2>


                <?php include 'admin/inc/home-dream.php';?>

                             </div>
                         </div>
                 <div class="col-md-3">
                     <div class="row">
                         <div class="col-md-12">

                             <?php include 'admin/inc/main-sidebar.php';?>
                         </div>

                     </div>

                 </div>

                     </div>
                 </div>
             </div>   




<?php include 'admin/inc/footer.php';?>