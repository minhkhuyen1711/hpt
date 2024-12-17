<?php
session_start();
include("../includes/db.php");
    if(isset($_SESSION['email'])){
        if($_POST['id']){   

           
            $sql = "SELECT * FROM  `products` where `product_id`='".$_POST['product_id']."'";
            $run_pro = $con->query($sql);
            $product = $run_pro->fetch_assoc();
            
            $get_cart = "SELECT * FROM `cart` where `cart_id`='".$_POST['id']."'";
            $run_cart = $con->query($get_cart);
            $row_cart = $run_cart->fetch_assoc();
            
            $qty = $row_cart['quantity'];
            $qty++;

            if($product['product_soluong'] < $qty){
                echo "san pham hien khong du hang";
            }else{

            $qty_up = "UPDATE `cart` set `quantity`='".$qty."' where `cart_id` = '".$_POST['id']."'";
            if($con->query($qty_up)){
                
            }
        }
        }else{
            echo "error";
        }
            
    }
?>