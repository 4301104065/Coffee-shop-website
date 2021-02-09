<?php
    if(isset($_POST["btnRegister"])){
        if(!empty($_REQUEST['txtUser']) && !empty($_REQUEST['txtCard']) && !empty($_REQUEST['txtPass']) && !empty($_REQUEST['txtRePass'])){

            $sql = "SELECT * FROM customer";
            $query = DataProvider::ExecuteQuery($sql);
            $numID = mysqli_num_rows($query);

            $ID = 1 + $numID;
            $user = $_REQUEST['txtUser'];
            $phone = $_REQUEST['txtPhone'];
            $pass = $_REQUEST['txtPass'];
            $repass = $_REQUEST['txtRePass'];
            $card = $_REQUEST['txtCard']; 
            $moneh = 10000000;

            $sql = "SELECT * FROM customer WHERE Name = '$user'";
            $query = DataProvider::ExecuteQuery($sql);
            $numUser = mysqli_num_rows($query);

            $sql = "SELECT * FROM customer WHERE Card = '$card'";
            $query = DataProvider::ExecuteQuery($sql);
            $numCard = mysqli_num_rows($query);

            $sql = "SELECT * FROM customer WHERE Phone = '$phone'";
            $query = DataProvider::ExecuteQuery($sql);
            $numPhone = mysqli_num_rows($query);
            
            $sql = "SELECT * FROM customer WHERE Password = '$pass'";
            $query = DataProvider::ExecuteQuery($sql);
            $numPass = mysqli_num_rows($query);
            
            if($numUser != 0){
                echo "<script>
                        $(window).ready(function(){
                            $('#UserExistModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if(!is_numeric($card) || strlen($card) != 9){
                echo "<script>
                        $(window).ready(function(){
                            $('#CardFormatModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if($numCard != 0){
                echo "<script>
                        $(window).ready(function(){
                            $('#CardExistModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if($phone != ""){
                if(!is_numeric($phone) || strlen($phone) != 10){
                    echo "<script>
                            $(window).ready(function(){
                                $('#PhoneFormatModal').modal('show');
                            });
                        </script>"; 
                    exit;
                }
                if($numPhone != 0){
                    echo "<script>
                            $(window).ready(function(){
                                $('#PhoneExistModal').modal('show');
                            });
                        </script>"; 
                    exit;
                }
            }
            if(strlen($pass) > 18 || strlen($pass) < 4){
                echo "<script>
                        $(window).ready(function(){
                            $('#PassFormatModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if($user == $pass){
                echo "<script>
                        $(window).ready(function(){
                            $('#UserPassModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if($numPass != 0){
                echo "<script>
                        $(window).ready(function(){
                            $('#PassExistModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            if($pass != $repass){
                echo "<script>
                        $(window).ready(function(){
                            $('#PassRepassModal').modal('show');
                        });
                    </script>"; 
                exit;
            }
            $insert = "INSERT INTO customer(ID, Name, Card, Moneh, Phone, Password, Type) VALUES('$ID','$user','$card','$moneh','$phone', '$pass', 'C')";
            $result = DataProvider::ExecuteQuery($insert);
            if($result){
                echo "<script>
                        $(window).ready(function(){
                            $('#RegisterSuccessModal').modal('show');
                        });             
                    </script>";
            }
            else{
                echo "<script>
                        $(window).ready(function(){
                            $('#ResultErrorModal').modal('show');
                        });
                    </script>";
            }
        }
        else{
            echo "<script>
                    $(window).ready(function(){
                        $('#RegisterFillUpModal').modal('show');
                    });
            </script>";
        }
    }
?>