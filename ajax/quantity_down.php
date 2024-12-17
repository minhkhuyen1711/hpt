<?php
session_start();
include("../includes/db.php");
    if(isset($_SESSION['email'])){
        if($_POST['id']){
            $get_cart = "SELECT * FROM `cart` where `cart_id`='".$_POST['id']."'";
            $run_cart = $con->query($get_cart);
            $row_cart = $run_cart->fetch_assoc();
            
            $qty = $row_cart['quantity'];
            $qty--;
            if($qty>0){
                $qty_up = "UPDATE `cart` set `quantity`='".$qty."' where `cart_id` = '".$_POST['id']."'";
                if($con->query($qty_up)){
                    echo("up oke");
                }
                else{
                    echo("asdasd");
                }
            }
            else{
                $remove = "DELETE FROM `cart` where `cart_id`='".$_POST['id']."'";
                if($con->query($remove)){
                    echo("remove thanh cong");
                }else{
                    echo("remove that bai");
                }
            }
        }else{
            echo "error";
        }
            
    }
?>