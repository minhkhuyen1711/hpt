<?php
    session_start();
    include("../includes/db.php");
    echo $_SESSION['email'], $_POST['id'];
    if(isset($_SESSION['email'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $get_product = "SELECT * FROM `products` where `product_id`='".$id."'";
            $result = $con->query($get_product);
            $row_pro = $result->fetch_assoc(); 
            // echo $row_pro[0][""]; 
            if($row_pro['product_soluong']==0){
                echo "khong con hang";
            }else{

            //kiemtra session
            $get_user_id = "SELECT * FROM `users` where `email`='".$_SESSION['email']."'";
            $run = $con->query($get_user_id);
            $row_user = $run->fetch_assoc();
            
            //kiem tra va tang sp do len 1
            $get_cart_id = "SELECT * FROM `cart`";
            $run_cart = $con->query($get_cart_id);
            $check_pro = true; 
            $qty = 0;
            if($run_cart->num_rows>0){
                while($row = $run_cart->fetch_assoc()){
                    if($row['product_id']==$row_pro['product_id']&&$row['user_id']==$row_user['id']){
                        $qty = $row['quantity']++;
                        $check_pro=false;
                    }
                }
            }
            
            if($check_pro){
                $add_to_cart = "INSERT INTO `cart`(`product_id`,`product_title`,`quality`,`user_id`) values('".(int)$row_pro['product_id']."','".$row_pro['product_title']."','1','".$row_user['id']."') ";
               //neu sp nay chua mua thi se them vao cart
                // $product_image = $_FILES['product_image']['name'];
                // $product_image_tmp = $_FILES['product_image']['tmp_name'];

                // move_uploaded_file($product_image_tmp, "product_images/$product_image");
               echo $add_to_cart;
                if($con->query($add_to_cart)){
                    echo("insert successful");
                }else{
                    echo("failed");
                }
            }else{ //nguoc lai thi se lay so luong o tren +1 roi update vao sql
                $qty=(int)($qty);
                $qty++;
                $update_cart = "UPDATE `cart` set `quality`='".$qty."' WHERE `product_id`='".$row_pro['product_id']."'and `user_id`='".$row_user['id']."'";
                if($con->query($update_cart)){
                   
                }
            }

            }
        }
    }
?>