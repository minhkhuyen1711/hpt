

      <style>
.notification{
  width: 1260;
  height: 400px;
  margin-top: 100px;
}

.notification_image{
  text-align: center;
  margin-top: 50px;
}

.notification_image img{
  width: 100px;
  height: 100px;
}

.notification_noti{
  margin-top: 10px;
  text-align: center;
}

.notification_noti p{
  font-size: 20px;
  color: red;
  font-weight: 500;
}

.notification_button{
  margin-top: 20px;
  text-align: center;
}

.notification_button button{
  padding: 8px 40px 8px 40px;
  background: tomato;
  border: 2px solid transparent;
  border-radius: 7px;
  color: #fff;
}

.notification_button button:hover{
  background: green;
}

</style>
<!--import file header.php bên inludes vào :3-->
<?php
include('includes/header.php');
?>    
      <div class="content_wrapper">



<div class="notification">
    <div class="notification_image">
        <img src="images/iconx.png">
    </div>
    <div class="notification_noti">
        <br>
        <p>Chức năng này sẽ sớm được cập nhật. Xin cảm ơn !!!</p>
    </div>
    <div class="notification_button">
        <button onclick="window.location.href='index.php'">Tiếp tục mua sắm</button>
    </div>
</div>


      </div><!--/.content_wrapper -->
     <?php
     include('includes/footer.php');
     ?>
