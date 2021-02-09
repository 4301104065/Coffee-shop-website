<?php
    if(isset($_POST["btnLogin"])){
        if(!empty($_REQUEST['txtLoginUser']) && !empty($_REQUEST['txtLoginPass'])){
            $user = $_REQUEST['txtLoginUser'];
            $pass = $_REQUEST['txtLoginPass'];

            $sql = "SELECT * FROM customer WHERE Name='$user' AND Password='$pass'";
            $result = DataProvider::ExecuteQuery($sql);
            
            if($result){
                $check = mysqli_num_rows($result);
                if($check == 1){
                    $_SESSION['user'] = $user;
                    while($row = mysqli_fetch_array($result))
                    {
                        $_SESSION['Money']=$row['Moneh'];
                        $_SESSION['IDuser']=$row['ID'];
                        $_SESSION['Type']=$row['Type'];
                    }
                }
                else{
                    echo "<script>
                            $(window).ready(function(){
                                $('#LoginFailedModal').modal('show');
                            });
                        </script>";
                }
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
                    $('#LoginFillUpModal').modal('show');
                });
                </script>";
        }
    }
?>