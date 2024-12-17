<?php
session_start();
include("../includes/db.php");
    if(isset($_SESSION['email'])){
        if($_POST['id']){  
                $remove = "DELETE FROM `cart` where `cart_id`='".$_POST['id']."'";
                if($con->query($remove)){
                    echo("remove thanh cong");
                }else{
                    echo("remove that bai");
                }
        
        }else{
            echo "error";
        }
    }
?>