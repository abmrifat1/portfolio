<?php


require_once './vendor/autoload.php';
use App\classes\Home;
$queryResult=Home::getAllPublishedImages();


?>





<div class="over-view">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="quote">
                    <h2>I love my web life</h2>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="picture">
                    <img src="assets/pic/future.jpg" alt="">
                </div>

            </div>
            <div class="col-md-3">
                <div class="quote">
                    <h2>Practice makes a man perfect</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="home-pic">
    <div class="space30"></div>
    <div class="home-heading">
        <h2>My Protfolio</h2>
        <p>ABM Khorshed Alam Rifat</p>
    </div>
    <div class="space30"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="catagory">
                    <ul>

                        <li><a href="">All</a></li>
                        <li><a href="">Apps</a></li>
                        <li><a href="">Mockups</a></li>
                        <li><a href="">Wordpress</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="catagory-pic" style="display: block">



                    <?php while ($row=mysqli_fetch_assoc($queryResult)) { ?>


                        <div class="col-md-4">
                            <img src="admin/<?php echo $row['category_image'];?>" alt="">
                        </div>

                    <?php } ?>


                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="here-me">
                    <ul><li><a href="">HERE ME !!!</a></li></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="space100"></div>
</div>

<div class="footer bg-2">
    <div class="space30"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-2">
                <div class="catagory">
                    <ul>
                        <h4>Search</h4>
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="About.php">About</a></li>
                        <li><a href="Protofolio.php">Protfolio</a></li>
                        <li><a href="Gallery.php">Gallery</a></li>
                        <li><a href="Contract.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="fotter-icon">
                    <ul>
                        <li><a href="https://www.facebook.com/abm.khorshedalamrifat" target="_blank"><img src="assets/pic/fb_icon_325x325.png" alt=""></a></li>
                        <li><a href="https://mail.google.com/mail/u/0/?tab=mm#inbox" target="_blank"><img src="assets/pic/Gmail.png" alt=""></a></li>
                        <li><a href="https://www.youtube.com/channel/UC0XRcFDCBUX-Gv4hlEYhzuQ" target="_blank"><img src="assets/pic/youtube1a.jpg" alt=""></a></li>
                        <li><a href="https://abmrifat.sarahah.com/" target="_blank"><img src="assets/pic/sarah.PNG" alt=""></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <p>&copy; Khorshed Alam-2017</p>
</div>

</div>
</body>
</html>