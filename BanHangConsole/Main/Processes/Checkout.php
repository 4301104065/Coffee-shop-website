<?php
    if(isset($_POST['btnSubmit'])){
        if(isset($_POST['quantity'])){
                if(!empty($_REQUEST['txtcard']) && isset($_SESSION['IDuser']) && !empty($_SESSION['IDuser'])){
                    $card = $_REQUEST['txtcard'];
                    $IDuser = $_SESSION['IDuser'];
                    $sql = "SELECT * FROM customer WHERE ID='$IDuser'";
                    $result = DataProvider::ExecuteQuery($sql);
                    if(empty($_SESSION['cart'])) unset($_SESSION["cart"]); 
                    while($row = mysqli_fetch_array($result)){
                        if($row['Card']==$card){
                            if(isset($_SESSION['price']) && !empty($_SESSION['price'])){
                                if($row['Moneh']<$_SESSION['price']){
                                    echo "<script>
                                            $(window).ready(function(){
                                                $('#NoMoney').modal('show');
                                            });
                                     </script>";
                                }
                                else{
                                    echo "<script>
                                        $(window).ready(function(){
                                            $('#CheckoutSuccess').modal('show');
                                        });
                                     </script>";
                                    $newmoney=$row['Moneh']-$_SESSION['price'];
                                    $quote="UPDATE customer SET Moneh='$newmoney' WHERE ID='$IDuser'";
                                    $update=DataProvider::ExecuteQuery($quote);
                                    date_default_timezone_set("Asia/Bangkok");
                                    $ngay=date("Y/m/d h:i:s");
                                    foreach($_POST['quantity'] as $key => $val){
                                        $newquantity=$_SESSION['cart'][$key]['remainquantity'];
                                        $sql1 = "UPDATE product SET Quantity=$newquantity where ID=$key";
                                        $result1 = DataProvider::ExecuteQuery($sql1);
                                        $sql2="SELECT * FROM product where ID='$key'";
                                        $result2=DataProvider::ExecuteQuery($sql2);
                                        $dong=mysqli_fetch_array($result2);
                                        $gia=$dong['Price']*$val;
                                        $query="INSERT into bill(id_product,user_id,amount,created_at,Price) values('$key','$IDuser','$val','$ngay','$gia')";
                                        $res=DataProvider::ExecuteQuery($query);
                                    }
                                    foreach($_POST['quantity'] as $key => $val) {
                                        $_SESSION['totalquantity']-=$_SESSION['cart'][$key]['quantity'];  
                                        unset($_SESSION['cart'][$key]);
                                    }
                                    if(empty($_SESSION['cart'])) unset($_SESSION["cart"]); 
                                }
                            }    
                        }
                        else{
                             echo "<script>
                                    $(window).ready(function(){
                                        $('#FailCreditCard').modal('show');
                                    });
                                </script>";
                        }
                    }
                }
                else{
                     echo "<script>
                                    $(window).ready(function(){
                                        $('#CreditCartEmpty').modal('show');
                                    });
                                </script>";
                }
        }
        else{
            echo "<script>
                    $(window).ready(function(){
                        $('#CartEmpty').modal('show');
                    });
                </script>";
        }
    }
?>