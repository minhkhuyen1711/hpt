
<?php
include('includes/header.php');
?>

    <script>
        $(document).ready(function(){
            $("p.total_item").text("<?php if(isset($_SESSION['total_item'])){echo $_SESSION['total_item']; }else{echo "0" ;} ?>");
     
        })
    </script>
    <div class="content_wrapper_myaccount">
        <?php
        
        // echo $_SESSION['total_item'];
            if(isset($_SESSION['email'])){
        ?>
     
        <div class="user_sidebar">
            <?php
            $run_image = mysqli_query($con,"select * from users where email='$_SESSION[email]'");

            // $row_image = mysqli_fetch_array($run_image);
            $row_image=$run_image->fetch_assoc();
            if($row_image['image'] !=''){

            ?>

            <div class="user_image">
                <img src="upload-files/<?php echo $row_image['image'];?>">
            </div>

            <?php 
            }else{?>

            <div class="user_image">
                <img src="/images/<?php echo $row_image['image'];?>">
            </div>
            
            <?php }?>
            <ul>
                <li><a href="my_oder.php">Quản lý đơn hàng</a></li>
                <li><a href="my_account.php?action=edit_account">Chỉnh sửa thông tin</a></li>
                <!-- <li><a href="my_account.php?action=edit_profile">Chỉnh sửa trang cá nhân</a></li> -->
                <!-- <li><a href="my_account.php?action=user_profile_picture">Chỉnh sửa hình ảnh</a></li> -->
                <li><a href="my_account.php?action=change_password">Thay đổi mật khẩu</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="asd">
        <div class="user_content">

            <?php
            
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            }else{
                $action = '';
            }

            switch($action){

                case  "edit_account";
                include('users/edit_account.php');
                break;

                case  "change_password";
                include('users/change_password.php');
                break;
 
            }


            ?>
            
           
        </div>
        
    </div>

    <?php }else{?>
        <center><h5 id="not_login">Bạn chưa đăng nhập, hãy click vào ô bên dưới đăng nhập </h5></center>
        <center><div class="login"><button type="submit"class="custom-btn btn-15"><a href="login.php">ĐĂNG NHẬP</a></button></div></center>
    <?php }?>
      
      </div><!--/.content_wrapper -->
          <div class="content_wrapper">
     <?php
     include('includes/footer.php');
     ?>
