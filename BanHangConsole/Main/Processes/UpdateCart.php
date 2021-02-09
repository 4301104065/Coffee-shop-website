<?php
    if(isset($_GET['id']) && isset($_GET['quantity'])){
        $quantity=$_GET['quantity'];
        $id=$_GET['id'];
        $arrid=explode(',', $id);
        $i=0;
        $tong=0;
        $arrquantity=explode(',', $quantity);
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        foreach ($arrid as $id) {
                            $sql = "SELECT * FROM product WHERE ID=$id";
                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result); 
                            if($row['Quantity']>=$arrquantity[$i]){
                                    if($arrquantity[$i]>$_SESSION['cart'][$id]['quantity']){
                                        $subquantity=$arrquantity[$i]-$_SESSION['cart'][$id]['quantity'];
                                        $_SESSION['cart'][$id]['remainquantity']-=$subquantity;
                                    }
                                    else if($arrquantity[$i]<$_SESSION['cart'][$id]['quantity']){
                                        $subquantity=$_SESSION['cart'][$id]['quantity']-$arrquantity[$i];
                                        $_SESSION['cart'][$id]['remainquantity']+=$subquantity;
                                    }
                                    $_SESSION['cart'][$id]['quantity']=$arrquantity[$i];
                            }
                            else{
                                echo "<script>
                                        $(window).ready(function(){
                                            $('#NoProduct').modal('show');
                                        });
                                    </script>";
                            }
                            $i++; 
                        }

        }
    }
    if(isset($_SESSION['cart'])){                        
                    $sql="SELECT * FROM product WHERE ID IN ("; 
                                          
                     foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 

                    }

                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $tongsoluong=0; 
                    $query = DataProvider::ExecuteQuery($sql);
                        while($row=mysqli_fetch_array($query)){ 
                                $tongsoluong+=$_SESSION['cart'][$row['ID']]['quantity'];
                                $_SESSION['totalquantity']=$tongsoluong;
                    }
    }
?>