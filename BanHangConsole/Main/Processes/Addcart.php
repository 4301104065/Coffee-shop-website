<!-- Addcart -->
<?php 
        if(isset($_GET['login']) && $_GET['login']=="out"){
            echo "<script>
                        $(window).ready(function(){
                                $('#FailAddition').modal('show');
                        });
                </script>";
        }
        if(isset($_GET['action']) && $_GET['action']=="add"){ 
            $id=intval($_GET['id']); 
            if(empty($_SESSION['cart']) || !isset($_SESSION['cart'])){ 
                $_SESSION['totalquantity']=0;
            }
            if(isset($_SESSION['cart'][$id])){
                $sql = "SELECT * FROM product WHERE ID={$id}";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
                if($_SESSION['cart'][$id]['remainquantity']>=1){
                    $_SESSION['cart'][$id]['quantity']++;
                    $_SESSION['cart'][$id]['remainquantity']--;
                    $_SESSION['totalquantity']++;
                    echo "<script>
                            $(window).ready(function(){
                                $('#AddcartSuccess').modal('show');
                            });
                        </script>"; 
                }
                else{
                     echo "<script>
                             $(window).ready(function(){
                                $('#NoProduct').modal('show');
                            });
                        </script>";
                }  
            }
            else{
                    $sql_s="SELECT * FROM product 
                        WHERE ID={$id}"; 
                   $query_s = DataProvider::ExecuteQuery($sql_s);
                    if(mysqli_num_rows($query_s)!=0){ 
                        $row_s=mysqli_fetch_array($query_s);
                        $remainquantity=$row_s['Quantity']; 
                        if($row_s['Quantity']>=1){
                            $remainquantity--;  
                            $_SESSION['cart'][$row_s['ID']]=array( 
                                    "quantity" => 1,
                                    "remainquantity"=>$remainquantity,
                                    "price" => $row_s['Price'] 
                            ); 
                             $_SESSION['totalquantity']++;
                              echo "<script>
                                        $(window).ready(function(){
                                            $('#AddcartSuccess').modal('show');
                                        });
                                    </script>"; 
                        }
                        else{
                                echo "<script>
                                        $(window).ready(function(){
                                            $('#NoProduct').modal('show');
                                        });
                                    </script>";
                        }  
                          
                    }
                    else{ 
                          
                        echo "<script>
                                    $(window).ready(function(){
                                        $('#InvalidProduct').modal('show');
                                    });
                                </script>";
                          
                        } 
                  
                }      
            
        }
        if(isset($_POST["btnAdd"])){ 
                if(isset($_REQUEST['numberquantity']) && !empty($_REQUEST['numberquantity'])){
                        $add=$_REQUEST['numberquantity'];    
                        $id=intval($_GET['id']); 
                         if(empty($_SESSION['cart']) || !isset($_SESSION['cart'])){ 
                                $_SESSION['totalquantity']=0;
                         }
                        if(isset($_SESSION['cart'][$id])){ 
                            $sql = "SELECT * FROM product WHERE ID={$id}";
                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result); 
                            if($_SESSION['cart'][$id]['remainquantity']>=$add){ 
                                $_SESSION['cart'][$id]['quantity']+=$add;
                                $_SESSION['cart'][$id]['remainquantity']-=$add;
                                $_SESSION['totalquantity']+=$add;
                                echo "<script>
                                            $(window).ready(function(){
                                                $('#AddcartSuccess').modal('show');
                                            });
                                    </script>";
                            }
                            else{
                                echo "<script>
                                        $(window).ready(function(){
                                            $('#NoProduct').modal('show');
                                        });
                                    </script>";
                            }         
                              
                        }
                        else{ 
                                $sql_s="SELECT * FROM product 
                                    WHERE ID={$id}"; 
                               $query_s = DataProvider::ExecuteQuery($sql_s);
                                if(mysqli_num_rows($query_s)!=0){ 
                                    $row_s=mysqli_fetch_array($query_s); 
                                    $remainquantity=$row_s['Quantity'];
                                    if($row_s['Quantity']>=$add){
                                        $remainquantity-=$add;   
                                        $_SESSION['cart'][$row_s['ID']]=array( 
                                                "quantity" => $add,
                                                "remainquantity"=> $remainquantity,
                                                "price" => $row_s['Price'] 
                                            );
                                        $_SESSION['totalquantity']+=$add; 
                                          echo "<script>
                                                    $(window).ready(function(){
                                                        $('#AddcartSuccess').modal('show');
                                                    });
                                                </script>";
                                    }
                                    else{
                                        echo "<script>
                                                $(window).ready(function(){
                                                    $('#NoProduct').modal('show');
                                                });
                                            </script>";
                                    }        
                                }
                                else{ 
                                      
                                    echo "<script>
                                                $(window).ready(function(){
                                                    $('#InvalidProduct').modal('show');
                                                });
                                            </script>";
                                      
                                }      
                                      
                            }
                              
                }
        }              

?> 
