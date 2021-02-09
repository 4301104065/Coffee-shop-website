<?php
include("DataProvider.php");
$otterly = "";
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM product";
    $query = DataProvider::ExecuteQuery($sql);
    $numID = mysqli_num_rows($query);
    $idA=$_GET['id'];
    $name =$_REQUEST['name'];
    $card = $_REQUEST['card'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $idA = $_GET['id'];
    $type = $_REQUEST['type'];

    $sql1="SELECT * FROM customer WHERE Name='$name'";
    $res=DataProvider::ExecuteQuery($sql1);

    $sql = "SELECT * FROM customer WHERE Card = '$card'";
    $query = DataProvider::ExecuteQuery($sql);
    $numCard = mysqli_num_rows($query);

    $sql = "SELECT * FROM customer WHERE Phone = '$phone'";
    $query = DataProvider::ExecuteQuery($sql);
    $numPhone = mysqli_num_rows($query);
            
    $sql = "SELECT * FROM customer WHERE Password = '$password'";
    $query = DataProvider::ExecuteQuery($sql);
    $numPass = mysqli_num_rows($query);
    if($res){
      $check = mysqli_num_rows($res);
      if($check!=0){
        $otterly="UserName name already exists";
      }
      else if(!is_numeric($card) || strlen($card) != 9)
      {
         $otterly=" Enter the wrong format. Card Numbers must be numbers only and have exactly 9 digits.";
      }
      else if($numCard != 0)
      {
          $otterly="This Card Numbers is already exist.";
      }
      else if(!is_numeric($phone) || strlen($phone) != 10){
              $otterly="Enter the wrong format. Phone Numbers must be numbers only and have exactly 10 digits.";
      }
      else  if($numPhone != 0)
      {
          $otterly="This Phone Numbers is already exist.";
      }
      else  if(strlen($password) > 18 || strlen($password) < 4)
      {
          $otterly=" Password must be 4-18 characters long.";
      }
      else{
          $result=DataProvider::ExecuteQuery("INSERT into customer (Name, Card, Moneh, Phone, Password, Type) values ('$name', '$card', 100000, '$phone', '$password', '$type')");
          if ($result){
               ?>
                  <script>
                     window.location.href="accounts.php?id=<?php echo $idA?>"; 
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

  <title>SB Admin - Insert Account</title>

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
                    <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                  </div>
                  <form class="user" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      Name: <input type="text" class="form-control" name="name" placeholder="Enter User Name..." required>
                    </div>
                    <div class="form-group">
                      Card: <input type="text" class="form-control" name="card" placeholder="Enter card number..." required>
                    </div>
                    <div class="form-group">
                      Phone: <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number...">
                    </div>
                    <div class="form-group">
                      Password: <input type="text" class="form-control" name="password" placeholder="Enter Password..." required>
                    </div>
                    <div class="form-group">
                      Type:
                      <select name="type">
                        <option value="A">Admin</option>
                        <option value="M">Moderator</option>
                      <select>
                    </div>
                    <br/>
                    <input name="submit" type="submit" class="form-control btn-primary" value="Submit" /><br>
                    <h3 style="color:red" class="text-center"><?php echo $otterly; ?></h3>
                  </form>
                  <div class="text-center"><a href="accounts.php?id=<?php echo $_GET['id']?>">Cancel</a></div>
                  
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
