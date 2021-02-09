<?php
if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
?>
<!--PHP LOGIN-->
<?php
    include_once("Processes/Login.php");
?>
<!--PHP LOGOUT-->
<?php
    if(isset($_POST['btnLogout'])){
       if(!isset($_POST['btnSubmit'])){
            if(isset($_SESSION['cart']))
                echo "<script>
                        $(window).ready(function(){
                            $('#PleaseCheckout').modal('show');
                        });
                    </script>";
            else{
                unset($_SESSION['user']);
                header("Location: index.php?page=OwO");
            }        
            
        }
    }
?>

<!--PHP Removecart-->
<?php
    include("Processes/Removecart.php")
?>

<!--PHP Checkout-->
<?php
    include("Processes/Checkout.php");
?>
<?php
    include("Processes/UpdateCart.php");
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
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav><br /><br />

<!-- Divider -->
<div class="text-center size" id="PS4"><h1>- YOUR CART -</h1></div> <br /> <br />

<!--Cart-->
<div class="container mb-5 col-10" style="min-height:60vh">

    <div class="card">

        <div class="card-header bg-primary text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
             CART
        </div>
            <!-- PRODUCT -->
           
        <div class="card-body">   
            <form method="post" action="index.php?page=Cart" name="fcart" >      
            <?php 
                          
            if(isset($_SESSION['cart'])){                        
                    $sql="SELECT * FROM product WHERE ID IN ("; 
                                          
                     foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 

                    }

                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $tongsoluong=0; 
                    $query = DataProvider::ExecuteQuery($sql);
                     $totalprice=0;
                        while($row=mysqli_fetch_array($query)){ 
                                 $subtotal=$_SESSION['cart'][$row['ID']]['quantity']*$row['Price']; 
                                $totalprice+=$subtotal;
                                $tongsoluong+=$_SESSION['cart'][$row['ID']]['quantity'];
                                $_SESSION['totalquantity']=$tongsoluong;
                               
                ?>               
                                <div class="row cart-items">
                                    <div class="col-12 col-sm-12 col-md-2 text-center">
                                        <img class="img-responsive" src="Pics/<?php echo $row['Pic'] ?>" alt="prewiew" width="120" height="80">
                                    </div>
                                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                        <h4 class="product-name" ><strong class="cart-name"><?php echo $row['Name']; ?></strong></h4>
                                    </div>
                                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row cart-row">
                                        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                            <h6>$<strong class="cart-price"><?php echo $row['Price'] ?></strong><strong><span class="text-muted">x</span></strong></h6>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">
                                            <div class="quantity">
                                                <input type="number" name="quantity[<?php echo $row['ID'] ?>]" value="<?php echo $_SESSION['cart'][$row['ID']]['quantity'] ?>" step="1" max="<?php echo $row['Quantity'];?>" min="1"title="Qty" class="qty cart-quantity-input">
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-2 col-md-2 text-right">
                                            <a href="index.php?page=Cart&action=remove&id=<?php echo $row['ID'] ?>">
                                                <button type="button" name="btnClose" class="btn btn-outline-danger btn-xs">
                                                   <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php 
                                                  
                        }
                            ?>
            <?php                      
            }
            else{ 
            ?>      
                <div style="text-align: center;font-size: 25px">Your Cart is empty. Please add some products.</div>
                <img class="img-responsive mx-auto d-block" src="Pics/matbuon.jpg" style="width:10%;">
                <?php 
                $totalprice=0;      
            }           
            ?> 
        </div>  
                <!-- END PRODUCT -->
            <div class="card-footer">
                <div class="float-right" style="margin: 10px">
                    <a href="" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Checkout</a>
                    <!--Modal verification form-->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center bg-primary">
                                    <h4 class="modal-title w-100 font-weight-bold">Verification</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <h4>Enter your FAKE Credit Card number</h4><br />
                                            <input type="text" name="txtcard" id="defaultForm-email" class="form-control validate" placeholder="Insert Credit Card number">
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button name="btnSubmit" type="submit" class="btn btn-outline-primary rounded-pill">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-left" style="margin: 5px">
                   Total price: <b class="cart-total-price">&dollar;<?php echo "$totalprice";?></b>
                </div>
                <?php $_SESSION['price']=$totalprice; ?>
            </div>

    </div>

</div>
</form>
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

<!--Notification-->
<div class="modal fade" id="NotificationModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h6 class="modal-title w-100 font-weight-bold">Notification</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">You must Login.</div>
        </div>
    </div>
</div>
</body>

<?php
}
else{
    header("Location: index.php?page=OwO");
    exit;
}
?>

