<?php
	while($product = mysqli_fetch_array($result))
	{
?>
    <!--Start-->
    <div class="col-sm-4 mb-xl-5">
                <div class="card rounded scale">
                    <div class="hovereffect">
                        <img class="img-responsive" src="Pics/<?php echo $product['Pic']?>" style="width:100%">
                        <?php if ($product['Status']=='New'){ ?>
                         <div class="overlay bg-success" style="top:0;height:5%">
                            <a class="info" style="cursor:default">NEW</a>
                        </div>
                        <?php } ?>
                        <div class="overlay">
                            <a class="info" href="index.php?page=Product_Detail&id=<?php echo $product['ID']; ?>">READ MORE</a>
                        </div>
                    </div>
                    <div style="background-color:#f2f2f2" class="p-1">
                        <h5 class="text-center"><b><?php echo $product['Name']?></b></h5><br>
                        <div class="clearfix">
                                <a class="btn btn-outline-primary text-uppercase float-right mb-2 mr-2 rounded-pill" href="
                                    <?php 
                                        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                                            echo("index.php?page=OwO&action=add&id=$product[ID]");
                                        }
                                        else{
                                            echo("index.php?page=OwO&login=out");
                                         }
                                    ?>"
                                >ADD TO CART</a>
                            <h6 style="color:forestgreen" class="float-left shop-item-price ml-3 mt-2"><i class="fa fa-dollar"></i><?php echo $product['Price']?></h6>
                        </div>
                    </div>
                </div>
            </div>
    <!--End-->

<?php       
    }
?>
