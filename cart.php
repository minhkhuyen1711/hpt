<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Shopping</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <!-- <script src="/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
  // alert("as");
    
</script>
  </head>
  <style type="text/css">
    .bd1 {
    /*background: #ddd;*/
    /*min-height: 100vh;*/
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
    margin-top:20px;
}

.title1 {
    margin-bottom: 5vh
}

.card1 {
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent
}

@media(max-width:767px) {
    .card1 {
        margin: 3vh auto
    }
}

.cart1 {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
}

@media(max-width:767px) {
    .cart1 {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem
    }
}

.summary1 {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65)
}

@media(max-width:767px) {
    .summary1 {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem
    }
}

.col{
  padding: 0 !important;
}

.summary1 .col-2 {
    padding: 0
}

.summary1 .col-10 {
    padding: 0
}

.row {
    margin: 0
}

.title1 b {
    font-size: 1.5rem
}

.main1 {
    margin: 0;
    padding: 2vh 0;
    width: 100%
}

.col-2,
.col {
    padding: 0 1vh
}

.bd1 a {
    padding: 0 1vh
}

.close1 {
    margin-left: auto;
    font-size: 0.7rem
}

.bd1 img {
    width: 3.5rem
}

.back-to-shop1 {
    margin-top: 4.5rem
}

.bd1 h5 {
    margin-top: 4vh
}

.bd1 hr {
    margin-top: 1.25rem
}

.bd1 form {
    padding: 2vh 0
}

.bd1 select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

.bd1 input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

.bd1 input:focus::-webkit-input-placeholder {
    color: transparent
}

.btn {
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

.bd1 a {
    color: black
}

.bd1 a:hover {
    color: black;
    text-decoration: none
}

#code1 {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}
  </style>
  <?php
include('includes/header.php');
?>
<?php
  if(isset($_SESSION['email'])){
      $get_user_id = "SELECT * FROM `users` where `email`='".$_SESSION['email']."';";
      $run_user = $con->query($get_user_id);
      $row_user = $run_user->fetch_assoc();
    //   echo $run_user['user_id'];
      echo($row_user['id']);
      $get_pro = "SELECT * FROM `cart` where `user_id` = '".$row_user['id']."' order by `cart_id` DESC";
      $run_pro = $con->query($get_pro);
      
      $product = [];
      if($run_pro->num_rows>0){
        while($row_pro = $run_pro->fetch_assoc()){
            $product[]=$row_pro;
        }
      }
      $soSanPham =  count($product);
      
      echo("<script> var html = '';var html2='';</script>");
      $total = 0;
      foreach($product as $value){
        $sql = "SELECT * FROM `products` where `product_id` = '".$value['product_id']."'";
        $run_pro = $con->query($sql);
        $row_pro = $run_pro->fetch_assoc();
        
        $sql1 = "SELECT * FROM `categories` where `cat_id` = '".$row_pro['cat_id']."'";
        $run_cat = $con->query($sql1);
        $row_cat = $run_cat->fetch_assoc();
        
        $total_price = ((int)($row_pro['product_price'])*(int)($value['quality']));
        $total+=((int)($row_pro['product_price'])*(int)($value['quality']));

          ?>
          <script>
              
                    
                    html2 += '<div class="row main1 align-items-center item1" id = "<?php echo $value['cart_id']; ?>">'+
                                '<div class="col-2" style="margin-left: 10px;"><img class="img-fluid" src="admin_area/product_images/<?php echo $row_pro['product_image'] ?>"></div>'+
                             '<div class="col">'+
                                '<div class="row text-muted"><?php echo $row_cat['cat_title']; ?></div>'+
                                '<div class="row"><?php echo $value['product_title'] ?></div>'+
                              '</div>'+
                             '<div class="col">'+
                                  ' <a href="#" class="quality_down">-</a>'+
                                      '<a href="#" class="border quality_sing"><?php echo $value['quality'] ?></a>'+
                                  '<a href="#"  class="quality_up">+</a>'+
                              '</div>'+

                            '<input type="hidden" class="price_sing" value="<?php  echo $row_pro['product_price'];  ?>">'+

                            '<input type="hidden" class="product_id" value="<?php  echo $value['product_id'];  ?>">'+
                             '<div class="col">'+
                                        '<span class="price_total"><?php echo $total_price; ?></span>đ'+ 
                                        '<span class="close">&#10005;</span></div>'+
                            
                             '</div>';

          </script>
          <?php
      }
      ?>
        <script type="text/javascript">
          $(document).ready(function(){
    })
</script> 
      <?php
  }
?>
<body>
   <div class="content_wrapper">
      <div id="sidebar">
          <hr>
          <div id="sidebar_title">Sản phẩm</div>
          <hr>
          <ul id="cats">
            <?php
            getCats();
            ?>
            <hr>
          </ul>
          <div id="sidebar_title">Thương hiệu</div>
          <hr>
          <ul id="cats">
            <?php
            getBrands();
            ?>
            <hr>
          </ul>
      </div>

<div class="bd1">
    <div class="card1">
        <div class="row">
            <div class="col-md-8 cart1">
                <div class="title1">
                    <div class="row">
                        <div class="col">
                            <h4><b>Giỏ hàng</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted ">Số sản phẩm: <span class="sosanpham">0</span></div>
                    </div>
                </div>
                <div class="row border-top border-bottom content_1">
                    <!-- <div class="row main1 align-items-center">
                        <div class="col-2" style="margin-left: 10px;"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                        <div class="col">
                            <div class="row text-muted">Thể loại</div>
                            <div class="row">Tên mặt hàng</div>
                        </div>
                        <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                        <div class="col">giá tiền <span class="close">&#10005;</span></div>
                    </div> -->
                </div>
                <div class="back-to-shop"><a href="#">&leftarrow;</a><a href="./index.php" class="text-muted">Trang chủ</a></div>
            </div>
            <div class="col-md-4 summary1">
                <form method="POST" action="" id="<?php echo $_SESSION['email'] ?>">
                        <div>
                            <h5><b>Tổng</b></h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">Số lượng: <span class="total_all_item">0</span></div>
                            <div class="col text-right"><span class="total_price_bf">0</span>đ</div>
                        </div>
                            <p>Phí vận chuyển</p> 
                            <select  class="ship">
                                <option class="text-muted">Miễn phí</option>
                                <!-- <option class="text-muted" id="20000">Nhanh(20.000đ)</option> -->

                            </select>
                            <p>Mã giảm giá</p> <input id="code1" placeholder="Nhập mã giảm giá...">
                        
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">Tổng tiền</div>
                            <div class="col text-right"><span class="total_price_af">0</span>đ</div>
                        </div>
                        <button class="btn check_out" name="check_out" type="submit" style="background-color: #000; color: #fff; padding: 10px 0px;">THANH TOÁN</button>
                </form>
            </div>
        </div>
    </div>

</div>

</div>

<script type="text/javascript">
    //1 su kien co ban cua jquery
      $(document).ready(function(){ 
        //lay tu ben index
        $("p.total_item").text("<?php if(isset($_SESSION['total_item'])){echo $_SESSION['total_item']; }else{echo "0" ;} ?>");
        // $("table.table").find("tbody").append(html);
        $("div.content_1").append(html2);   

        var price =  $("span.price_total").text();

        //lay total o tren
        var total = parseInt("<?php echo $total; ?>")
        $("span.total_price_bf").text(total);
        $("span.total_price_af").text(total);

        //add product
        var total_item = $("p.total_item").text();

        $('span.sosanpham').text("<?php echo $soSanPham; ?>");
        var soSanPham = "<?php echo $soSanPham; ?>";

        $("span.total_all_item").text(total_item);
        // alert(total_item);

        // thay doi dong nay chang han

        // comment nha luu lai

        $("a.quality_up").click(function(){
        // alert($("select.ship option").attr('id'));
            
            var product_id = $(this).closest("div.item1").find("input.product_id").val();
            
            
            
            var total_price_s= parseInt($(this).closest("div.item1").find("div span.price_total").text());
            var  product_price = parseInt($(this).closest("div.item1").find("input.price_sing").val());
            total_price_s+=product_price;

            $(this).closest("div.item1").find("div span.price_total").text(total_price_s);
            
            var qty_sing = $(this).prev("a.quality_sing").text();
            total+=product_price;
            $("span.total_price_bf").text(total);
            $("span.total_price_af").text(total);
            

            total_item++; // fe
            qty_sing++;

            $("span.total_all_item").text(total_item);
            // alert(qty_sing);
            $(this).prev("a.quality_sing").text(qty_sing);
            $("p.total_item").text(total_item);
            var id =$(this).closest("div.item1").attr("id");

            $.ajax({    //be
              method : "POST",
              url : "ajax/quality_up.php",
              mimeType : "multipart/form-data",
              data : {id:id,product_id:product_id},
              success : function(response){
                // alert(response);
              }
            })
        })
        //remove 1 product
        $("a.quality_down").click(function(){
            var total_price_s= parseInt($(this).closest("div.item1").find("div span.price_total").text());
            var  product_price = parseInt($(this).closest("div.item1").find("input.price_sing").val());
            
            total_price_s-=product_price;
            // $(this).closest("tr").find("span.price_total").text(total_price_s);
            $(this).closest("div.item1").find("div span.price_total").text(total_price_s);
            total_item--;
            $("span.total_all_item").text(total_item);
            $("p.total_item").text(total_item);
            
            var qty_sing = $(this).next("a.quality_sing").text();
            total-=product_price;
            $("span.total_price_bf").text(total);
            $("span.total_price_af").text(total);
            // $('span.sosanpham').text(total_item);

            qty_sing--;
            
            if(qty_sing==0){
              $(this).closest("div.item1").remove();
              
              soSanPham--;
              $('span.sosanpham').text(soSanPham);
            }
            
            $(this).next("a.quality_sing").text(qty_sing);
            var id =$(this).closest("div.item1").attr("id");

            $.ajax({
              method : "POST",
              url : "ajax/quality_down.php",
              mimeType : "multipart/form-data",
              data : {id:id},
              success : function(response){
                console.log(response);
              }
            })
        })  

        //remove all product
        $("span.close").click(function(){
            alert("Xoá thành công");
          var qty_sing = $(this).closest("div.item1").find("a.quality_sing").text()
          var  product_price = parseInt($(this).closest("div.item1").find("input.price_sing").val());
            total_item-=qty_sing;

            total-=(product_price*qty_sing);
            $("span.total_price_bf").text(total);
            $("span.total_price_af").text(total);
            $('span.sosanpham').text(total_item);

            
              soSanPham--;
              $('span.sosanpham').text(soSanPham);

            $("span.total_all_item").text(total_item);
            $("p.total_item").text(total_item);

            var id =$(this).closest("div.item1").attr("id");
            $(this).closest("div.item1").remove();
            $.ajax({
              method : "POST",
              url : "ajax/delete_all_pro.php",
              mimeType : "multipart/form-data",
              data : {id:id},
              success : function(response){
                console.log(response);
              }
            })

        })
      })       
</script> 

<?php
    if(isset($_POST['check_out'])){
        $sql = "SELECT * FROM `user` where `email`='".$_SESSION['email']."'";
        $run_user = $con->query($sql);
        $user = $run_user->fetch_assoc();
        
        $sql2 ="SELECT * FROM `products`";
        $run_product = $con->query($sql2);

        if($run_product->num_rows > 0){
            while($run = $run_product->fetch_assoc()){

            }
        }

        $sql1 = "DELETE FROM `cart` where `user_id`='".$user['id']."'";   
        if($con->query($sql1)){
            echo "<script>
                $(document).ready(function(){
                    
                    $('span.total_price_bf').text('0');
                    $('span.total_price_af').text('0');
                    $('span.sosanpham').text('0');
                    $('span.total_all_item').text('0');
                    $('p.total_item').text('0');
                    alert('mua thanh cong');
                    $('div.item1').remove();

                    })
            </script>";

        }
        

    }
    
?>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $("button.check_out").click(function(){
    //         var user_email = $(this).closest("form").attr('id');
    //         // alert(user_email);
    //         $.ajax({
                
    //         })
    //     })
    // })
</script>
       <?php
       include('includes/footer.php');
       ?>
</body>
</html>