<?php


require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedImages();


?>



<?php include 'admin/inc/header.php';?>
                        

                
          
        <div class="over-view-gallery">
                 <div class="container">
                     <div class="row">
                        <div class="col-md-2">
                           <div class="quote">
                             <h2>I love my Family</h2>
                             </div>
                        </div>
                          
                             <div class="col-md-4 ">
                          <div class="picture">
                                <div class="gallery-pic">
                                 <img src="assets/pic/g8.jpg" alt="">
                                 
                                 <img src="assets/pic/g1.jpg" alt="">
                        
                                 <img src="assets/pic/g2.jpg" alt="">
                                
                                 <img src="assets/pic/g4.jpg" alt="">
                             </div>
                              </div> 
                         </div>
                         <div class="col-md-4">
                           <div class="picture">
                                <div class="gallery-pic">
                            <img src="assets/pic/g5.jpg" alt="">
                              <img src="assets/pic/g6.jpg" alt="">
                                    <img src="assets/pic/g3.jpg" alt="">
                               
                              <img src="assets/pic/g9.jpg" alt="">
                               </div>
                             </div>
                             
                         </div>
                    <div class="col-md-2">
                       <div class="quote">
                        <h2>I love my friends</h2>
                        </div>
                    </div>     
                     </div>
                 </div>  
               </div> 
               
         <?php include 'admin/inc/footer.php';?>