<?php 
	session_start();
	include("DataProvider.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("OwO", "Cart","Product_Detail","About"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="OwO"; 
              
        } 
          
    }else{ 
          
        $_page="OwO"; 
          
    }
   
?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>OwO What's this??</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/additions.css" />
     <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Js/cart.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar">
        <?php require($_page.".php"); ?>
</body>
</html>