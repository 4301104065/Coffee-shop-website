<a class="navbar-brand bg-danger rounded-circle" href="index.php?page=OwO">ÒwÓ</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link cool-link" href="index.php?page=OwO"><b>Home</b></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                <b>Shop</b>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?page=OwO#Feats">Featured</a>
                <a class="dropdown-item" href="index.php?page=OwO#PS4">PS4 Consoles</a>
                <a class="dropdown-item" href="index.php?page=OwO#Nintendo">Nintendo</a>
                <a class="dropdown-item" href="index.php?page=OwO#Accs">Accessories</a>
                <a class="dropdown-item" href="index.php?page=OwO#Games">Games</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link cool-link" href="index.php?page=About"><b>About</b></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php
            if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
        ?>
<!--USER AND LOGOUT-->
		<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
		        <b><?php echo $_SESSION['user']; ?></b>
		    </a>
		    <div class="dropdown-menu">
			<?php if ($_SESSION['Type'] == 'A' || $_SESSION['Type'] == 'M'){ ?> <a class="dropdown-item" href="../admin/index.php?id=<?php echo $_SESSION['IDuser'];?>">Unlimited Power</a> <?php } ?>
				<form method="post" name='fcart' action="index.php?page=Cart&Login=out">
				    <input class="dropdown-item" type="submit" name="btnLogout" value="Logout">
				</form>
		    </div>
		</li>
<!--MY CART-->
		<li class="nav-item">
		    <a class="nav-link cool-link" href="index.php?page=Cart" id="cart">
		        <i class="fa fa-shopping-cart"></i> <b>Cart</b> <span class="badge badge-danger rounded-circle total-quantity" id="badge"><?php 
		        if(isset($_SESSION['totalquantity'])&&!empty($_SESSION['totalquantity']))
		         	echo $_SESSION['totalquantity'];
		     ?></span>
		    </a>
		</li>					    
		<?php
			}
			else{
		?>
<!--Login-->			             	
		<li class="nav-item">
			    <a class="nav-link cool-link" href="" data-toggle="modal" data-target="#loginModal">
			        <i class="fa fa-sign-in"></i> <b>Login</b> <span class="badge badge-danger rounded-circle"></span>
			    </a>
			    <div class="modal fade" id="loginModal">
			        <div class="modal-dialog">
			            <div class="modal-content">

			                <div class="modal-header text-center bg-primary">
			                    <h4 class="modal-title w-100 font-weight-bold">Login</h4>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>
			                <div class="modal-body mx-3">
			                    <form method="post" action="" name="fcart">

			                        <div class="input-group form-group">
			                            <div class="input-group-prepend">
			                                <span class="input-group-text"><i class="fa fa-user"></i></span>
			                            </div>
			                            <input name="txtLoginUser" type="text" class="form-control" placeholder="Username *">

			                        </div>
			                        <div class="input-group form-group">
			                            <div class="input-group-prepend">
			                                <span class="input-group-text"><i class="fa fa-key"></i></span>
			                            </div>
			                            <input name="txtLoginPass" type="password" class="form-control" placeholder="Password *">
			                        </div>
			                        <div class="form-group text-center">
			                           <input name="btnLogin"type="submit" value="Login" class="btn btn-outline-primary rounded-pill">
			                        </div>

			                    </form>
			                </div>
			                <div class="modal-footer d-flex justify-content-center">
			                    <div>
			                        Don't have an account? <a href="" data-toggle="modal" data-dismiss="modal" data-target="#registerModal">Sign Up</a>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
		</li>
<!--Register-->
		<li class="nav-item">
			<a class="nav-link cool-link" href="" data-toggle="modal" data-target="#registerModal">
			    <i class="fa fa-user-plus"></i> <b>Register</b> <span class="badge badge-danger rounded-circle"></span>
			</a>
			<div class="modal fade" id="registerModal">
			    <div class="modal-dialog">
			        <div class="modal-content">

			            <div class="modal-header text-center bg-primary">
			                <h4 class="modal-title w-100 font-weight-bold">Register</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">
			                <form method="post" action="" name="fRegister" id="fRegister">

			                    <div class="input-group form-group">
			                        <div class="input-group-prepend">
			                            <span class="input-group-text"><i class="fa fa-user"></i></span>
			                        </div>
			                    	<input name="txtUser" type="text" class="form-control" placeholder="Username *">

			                    </div>
			                    <div class="input-group form-group">
			                        <div class="input-group-prepend">
			                            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
			                        </div>
			                        <input name="txtCard" type="text" class="form-control" placeholder="Card *">
			                    </div>
			                    <div class="input-group form-group">
			                        <div class="input-group-prepend">
			                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
			                        </div>
			                        <input name="txtPhone" type="text" class="form-control" placeholder="Phone Number ">
			                    </div>
			                    <div class="input-group form-group">
			                        <div class="input-group-prepend">
			                            <span class="input-group-text"><i class="fa fa-key"></i></span>
			                        </div>
			                        <input name="txtPass" type="password" class="form-control" placeholder="Password *">
			                    </div>
			                    <div class="input-group form-group">
			                        <div class="input-group-prepend">
			                            <span class="input-group-text"><i class="fa fa-key"></i></span>
			                        </div>
			                        <input name="txtRePass" type="password" class="form-control" placeholder="Repeat Password *">
			                    </div>
			                    <div class="form-group text-center">
			                        <input name="btnRegister" type="submit" value="Register" class="btn btn-outline-primary rounded-pill">
			                    </div>

			                </form>
			            </div>
			            <div class="modal-footer d-flex justify-content-center">
			                <div>
			                    Have an account? <a href="" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Login</a>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
	</li>
	<?php
		}
	?>
		            
	</ul>
</div>