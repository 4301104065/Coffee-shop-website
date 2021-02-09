<!--PHP LOGIN-->
<?php
    include_once("Processes/Login.php");
?>




<!--Header-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<?php
    include("View/Header.php");
?>
</nav>

<!--Breadcrumb-->
<nav aria-label="breadcrumb" class="bg-dark">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=OwO">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Story</li>
        </ol>
    </nav><br /><br />

<!--Introduction-->
<div class="container text-center">
    <div><img src="Pics/Brand logo.png" style="max-width:300px" /></div>
        <h1>MEME Review</h1><br />
        <div class="container col-6 text-left">
            <p style="font-size:18px">This is ÒwÓ, powered by Bootstrap 4, inspired by w3school.com and cloakbrand.com</p>
            <p style="font-size:18px">
                We offer a wide variety of console products on the market and update our stock everyday (no we don't), though our
                products are completely non-existent and cost real money. If yout want to support us, please give us your credit card number.
                This will be considered to be legal and safe, nothing is suspicious at all.
            </p>
            <p style="font-size:18px">The creators of ÒwÓ:</p>
        </div><br />

        <div class="card border-warning p-0 col-sm-4 ml-auto mr-auto mb-5">
            <div class="card-header bg-warning text-white font-weight-bold">Nguyễn Lưu Kim Khôi</div>
            <img src="Pics/kermit.jpg" style="width:100%" />
            <div class="card-body" style="background-color:#f2f2f2">
                <h5>- Lost faith in humanity</h5>
                <h5>- Dead inside.</h5>
            </div>
        </div>

        <div class="card border-danger p-0 col-sm-4 ml-auto mr-auto mb-5">
            <div class="card-header bg-danger text-white font-weight-bold">Nguyễn Trung Hiếu</div>
            <img src="Pics/SadCat.jpg" style="width:100%" />
            <div class="card-body" style="background-color:#f2f2f2">
                <h5>- Sad all the time.</h5>
                <h5>D:</h5>
            </div>
        </div>

        <div class="card border-primary p-0 col-sm-4 ml-auto mr-auto mb-5">
            <div class="card-header bg-primary text-white font-weight-bold">Mai Huy</div>
            <img src="Pics/Gaston.jpg" style="width:100%" />
            <div class="card-body" style="background-color:#f2f2f2">
                <h5>- We gho dIdneey lenD</h5>
                <h5>- Seems fine to me</h5>
            </div>
        </div>

        <div class="card border-dark p-0 col-sm-4 ml-auto mr-auto mb-5">
            <div class="card-header bg-dark text-white font-weight-bold">Trần Thiên Phúc</div>
            <img src="Pics/Ahhhhhh.jpg" style="width:100%" />
            <div class="card-body" style="background-color:#f2f2f2">
                <h5>- NGAAAAAAAAAAAH!</h5>
                <h5>- BWAAAAAAAAAAAAAAA!</h5>
            </div>
        </div>

        <div class="card border-danger p-0 col-sm-4 ml-auto mr-auto mb-5">
            <div class="card-header bg-danger text-white font-weight-bold">Huỳnh Tuấn Khoa</div>
            <img src="Pics/dieinstantlyyy.jpg" style="width:100%" />
            <div class="card-body" style="background-color:#f2f2f2">
                <h5>- Like this image to instantly DIE</h5>
                <h5>- Existence is pain!</h5>
            </div>
        </div>
</div>

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


