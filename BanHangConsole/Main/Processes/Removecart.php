<!-- Removecart -->
<?php 
    if(isset($_GET['action']) && $_GET['action']=="remove"){ 
        echo "<script>
                    $(window).ready(function(){
                        $('#RemovecartSuccess').modal('show');
                    });
            </script>";  
        $id=intval($_GET['id']);
        if(isset($_SESSION['totalquantity'])){
            if(isset($_SESSION['cart'][$id]) && !empty($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['remainquantity']-= $_SESSION['cart'][$id]['quantity']; 
                $_SESSION['totalquantity']-=$_SESSION['cart'][$id]['quantity'];
            }
        } 
        unset($_SESSION['cart'][$id]);
        if(empty($_SESSION['cart'])){ 
            unset($_SESSION["cart"]);
        }
    } 
  
?> 
