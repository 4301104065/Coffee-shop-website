<?php
	$result = DataProvider::ExecuteQuery("SELECT * FROM product WHERE Status='Sale'");
	while($product = mysqli_fetch_array($result))
	{
		$data = <<<EOD
    <!--Một hàng hóa-->
    <div class="col-sm-4 mb-xl-5">
                <div class="card rounded scale">
                    <div class="bg-danger text-center text-white">BLACK FRIDAY DEAL</div>
                    <div class="hovereffect">
                        <img class="img-responsive" src="Pics/{$product['Pic']}" style="width:100%">
                        <div class="overlay">
                            
                            <a class="info" href="index.php?page=Product_Detail&id=$product[ID]">READ MORE</a>
                        </div>
                    </div>
                    <div style="background-color:#f2f2f2">
                        <h5 class="text-center">It's free real estate!</h5><br>

                    </div>
                </div>
            </div>
    <!--End Một hàng hóa-->
EOD;
		echo $data;
    }
?>