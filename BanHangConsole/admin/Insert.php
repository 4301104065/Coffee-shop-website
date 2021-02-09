<?php
include("DataProvider.php");
$otterly = "";
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM product";
    $query = DataProvider::ExecuteQuery($sql);
    $numID = mysqli_num_rows($query);
    $type = $_REQUEST['type'];
    $name =$_REQUEST['name'];
    $quantity = $_REQUEST['quantity'];
    $price = $_REQUEST['price'];
    $pic = $_FILES['picture']['name'];
    $status = $_REQUEST['status'];
    $developers = $_REQUEST['developers'];
    $description = $_REQUEST['description'];
    $idA=$_GET['id'];
    $sql1="SELECT * FROM product WHERE Name='$name'";
    $res=DataProvider::ExecuteQuery($sql1);
    if($res){
      $check = mysqli_num_rows($res);
      if($check!=0){
        $otterly="Product name already exists";
      }
      else{
        move_uploaded_file($_FILES['picture']['tmp_name'], '../Main/Pics/'.$_FILES['picture']['name']);

        $result=DataProvider::ExecuteQuery("INSERT into product (Type, Name, Quantity, Price, Pic, Status, Developers, Description) values ('$type', '$name', '$quantity', '$price', '$pic', '$status', '$developers', '$description')");
        if ($result){
            ?>
            <script>
               window.location.href="products.php?id=<?php echo $idA?>"; 
            </script>
            <?php
        }
        else $otterly = "Insert failed.";
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Insert Product</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          
            <!-- Nested Row within Card Body -->
            
              <div class="col-lg-8 ml-auto mr-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Insert New Product</h1>
                  </div>
                  <form class="user" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      Type:
                      <select class="form-control" name="type" id="exampleInputPassword" value="1">
                        <option>PS4</option>
                        <option>Nintendo</option>
                        <option>Accessories</option>
                        <option>Game</option>
                      </select>
                    </div>
                    <div class="form-group">
                      Name: <input type="text" class="form-control" name="name" placeholder="Enter Product Name..." required>
                    </div>
                    <div class="form-group">
                      Quantity: <input type="number" class="form-control" name="quantity" placeholder="Enter a number...">
                    </div>
                    <div class="form-group">
                      Price: <input type="text" class="form-control" name="price" placeholder="Enter Price..." required>
                    </div>
                    <div class="form-group">
                      Status: <input type="text" class="form-control" name="status" placeholder="Enter Current Status...">
                    </div>
                    <div class="form-group">
                      Developers: <input type="text" class="form-control" name="developers" placeholder="Enter Developer's Name...">
                    </div>
                    <div class="form-group">
                      Description: <textarea style="height:100px" class="form-control" name="description" placeholder="Enter Product's Description..."></textarea>
                    </div>
                    <div>
                      Picture: <input type="file" name="picture" />
                    </div>
                    <br/>
                    <input name="submit" type="submit" class="form-control btn-primary" value="Submit" /><br>
                    <h3 style="color:red" class="text-center"><?php echo $otterly; ?></h3>
                    <div class="text-center"><a href="products.php?id=<?php echo $_GET['id']?>">Cancel</a></div>
                  </form>
                  
                </div>
              </div>
            
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
