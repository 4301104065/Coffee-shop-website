<!--PHP LOGIN-->
<?php
    include_once("Processes/Login.php");
?>
<!--PHP Addcart-->
<?php
    include("Processes/Addcart.php")
 ?>

<!-- Header -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
<?php
    include("View/Header.php");
?>
</nav>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="Pics/wallpaper.png" width="1100" height="500">
        <div class="carousel-caption">
            <h3>PS4</h3>
            <p>Doesn't even exist</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="Pics/wallpaper2.jpg" width="1100" height="500">
        <div class="carousel-caption">
            <h3>Xbox</h3>
            <p>Fake</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="Pics/wallpaper3.jpg" width="1100" height="500">
        <div class="carousel-caption">
            <h3>Nintendo Switch</h3>
            <p>Free & Fake</p>
        </div>
    </div>
</div><br />

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
</a>
</div>

<!-- Divider -->
<div class="text-center size" id="Feats"><h1>- Featured -</h1></div> <br /> <br />

<div class="container">

    <div class="row">
    <?php include_once("Processes/Featured.php");?>    
    </div>
</div><br /> <br />

<!-- Divider -->
<div class="text-center size" id="PS4"><h1>- PS4 Consoles -</h1></div> <br /> <br />

<div class="container">

    <div class="row">
        <?php 
            $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE Type='PS4'");
            include("Processes/GetProducts.php");
        ?>    
    </div>
</div><br /> <br />

<!-- Divider -->
<div class="text-center size" id="Nintendo"><h1>- Nintendo Consoles -</h1></div> <br /> <br />

<div class="container">

    <div class="row">
        <?php 
            $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE Type='Nintendo'");
            include("Processes/GetProducts.php");
        ?>  
    </div>
</div><br /> <br />

<!-- Divider -->
<div class="text-center size" id="Accs"><h1>- Accessories -</h1></div> <br /> <br />

<div class="container">

    <div class="row">
    <?php 
            $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE Type='Accessories'");
            include("Processes/GetProducts.php");
    ?>   
    </div>
</div><br /> <br />

<!-- Divider -->
<div class="text-center size" id="Games"><h1>- Games -</h1></div> <br /> <br />

<div class="container">

    <div class="row">
    <?php 
            $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE Type='Game'");
            include("Processes/GetProducts.php");
    ?>   
    </div>
</div><br /> <br />


<!--Footer-->
<footer class="card-footer text-center bg-dark text-white">
        <h4 class="font-weight-bold">FOLLOW US FOR MORE EXCLUSIVE CONTENTS AND INFORMATION</h4><br />
        <div class="container">
            <a href="#"><img src="Pics/tumblr_logo.png" style="max-width:45px" /></a>
            <a href="#"><img src="Pics/twitter_logo.png" style="max-width:45px" /></a>
            <a href="#"><img src="Pics/facebook_logo.png" style="max-width:45px" /></a>
        </div>
        <br />
        <h6>&copy; ÒwÓ Powered by Bootstrap 4</h6>
</footer>


<!----Modal----->
<?php
    include("View/Modals.php");
?>

<!--PHP Register-->
<?php
    include_once("Processes/Register.php")
?>

