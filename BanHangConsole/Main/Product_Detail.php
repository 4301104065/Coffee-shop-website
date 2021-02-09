

<!--PHP LOGIN-->
<?php
    include_once("Processes/Login.php");
?>


<!--PHP Addcart-->
<?php
    include("Processes/Addcart.php")
 ?>

<!--Header-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<?php
    include("View/Header.php");
?>
</nav>
    <?php
        if(isset($_SESSION['cart'][$_GET['id']])){
            $qty =$_SESSION['cart'][$_GET['id']]['remainquantity'];
        }
        else{
            $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE ID=$_GET[id]");
            while($product = mysqli_fetch_array($result)){
                $qty = $product['Quantity'];
            }
        }
        $result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE ID=$_GET[id]");
        while($product = mysqli_fetch_array($result)){
    ?>
<!--Breadcrumb-->
<nav aria-label="breadcrumb" class="bg-dark">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=OwO">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $product['Name']?></li>
    </ol>
</nav><br /><br />

<!--Product Deatail s-->
<div class="container" style="min-height:60vh">
    <div class="card">
        <div class="row">
            <div class="col-sm-5 border-right">
                <img src="Pics/<?php echo $product['Pic']?>" style="width:100%">
            </div>
            <div class="col-sm-7">
                <form method="post" action="index.php?page=Product_Detail&id=<?php echo($_GET['id']); ?>">
                <article class="card-body p-5">
                    <h3 class="card-title mb-3"><?php echo $product['Name']?></h3>
                    <p class="price-detail-wrap">
                        <span class="price h3 text-warning">
                            <span style="color:forestgreen">$<?php echo $product['Price']?></span>
                        </span>
                    </p> <!--price-detail-wrap -->
                    <dl>
                        <dt>Developer</dt>
                        <dd>
                            <p>
                                <?php echo $product['Quantity']?>
                            </p>
                        </dd>
                    </dl>
                    <dl>
                        <dt>Description</dt>
                        <dd>
                            <p>
                                <?php echo $product['Description']?>
                            </p>
                        </dd>
                    </dl>
                    <?php
                }
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="">
                                <dt>Quantity: </dt>
                                <dd>
                                    <div class="quantity"><input type="number" name="numberquantity"step="1" max="<?php echo $qty ?>" min="0" value="0" title="Qty" class="qty"></div>
                                </dd>
                            </dl>
                        </div> 
                    </div>
                    <hr>
                    <?php
                        if ($qty == 0) echo "<div href='' class='btn btn-lg btn-danger text-uppercase pointer-cursor'>Out of stock</div>";
                        else {
                            if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
                                ?>
                                <!--CODE WRITE THERE-->
                            
                                <button class="btn btn-lg btn-outline-primary text-uppercase"type="submit" name="btnAdd"> 
                                <i class="fa fa-shopping-cart">Add to cart</i>
                                </button>
                                

                                


                                <?php
                            }

                            else{
                                ?>
                                <a href="" class="btn btn-lg btn-outline-primary text-uppercase" data-toggle="modal" data-target="#NotificationModal"> 
                                    <i class="fa fa-shopping-cart"></i>  Add to cart
                                </a>
                                <!--Notification-->
                                <div class="modal fade" id="NotificationModal">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header text-center bg-danger">
                                                <h6 class="modal-title w-100 font-weight-bold">Add Failed</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                                <div class="modal-body mx-3">You must Login.</div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </article>
                </form>
            </div>
        </div>
    </div>
</div><br /><br /><br />

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