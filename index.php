<?php
include('includes/header.php');

if (isset($_SESSION['email'])) {
  $get_user = "SELECT * FROM `users` where `email`='" . $_SESSION['email'] . "'";
  $row_user = $con->query($get_user);
  $user_id = $row_user->fetch_assoc();
  if (!empty($user_id)) {
    $get_cart = "SELECT * FROM `cart` where `user_id` = '" . $user_id['id'] . "'";
    $row_cart = $con->query($get_cart);
    $total_item = 0;
    if ($row_cart->num_rows > 0) {
      while ($row = $row_cart->fetch_assoc()) {
        $total_item += $row['quality'];
      }
    }
    $_SESSION['total_item'] = $total_item;
  }
}


$show_pro = "SELECT * FROM `products`";
$run_show_pro = $con->query($show_pro);
$total_pro = 0;
if ($run_show_pro->num_rows > 0) {
  $total_pro = $run_show_pro->num_rows;
}
?>
<script type="text/javascript">
  $(document).ready(function() {


    $("p.total_item").text("<?php if (isset($total_item)) {
                              echo $total_item;
                            } else {
                              echo "0";
                            } ?>");
    // buy_btn
    var total_item = "<?php echo $total_item; ?>";


    $("button#button").click(function() {
      console.log("aaaad to");
      var id = $(this).closest("a.buy_btn").attr("id");

      console.log(id);
      $.ajax({
        method: "POST",
        url: "ajax/add_to_cart_ajax.php",
        mimeType: "multipart/form-data",
        data: {
          id: id
        },
        success: function(response) {
          console.log("done");
          var koconhang = response;
          var check = (koconhang.indexOf("khong"));

          if (check == 1) {
            alert("khong con hang");
          } else {
            total_item++;
            $("p.total_item").text(total_item);
          }

        },
        error: function(response) {
          console.log("error");
        },
      })
    })

  })
</script>
<!-- <img src="ajax/add_to_cart_ajax.php" alt=""> -->
<div class="content_wrapper">

  <div id="sidebar">
    <hr>
    <div id="sidebar_title">Sản phẩm</div>
    <hr>
    <ul id="cats">
      <?php
      getCats();
      ?>
    </ul>
    <hr>
    <div id="sidebar_title">Thương hiệu</div>
    <hr>
    <ul id="cats">
      <?php
      getBrands();
      ?>
      <hr>
    </ul>
  </div>
  <div id="content_area">
    <div id="product_box">
      <?php
      getPro(8);
      // echo $_SESSION['email'];
      get_pro_by_cat_id();
      get_pro_by_brand_id();
      ?>

    </div>
    <!--end product_box-->

  </div>
  <!--end content_area-->

  <!-- phan trang -->
  <?php
  $brand = isset($_GET['brand']);
  $cat = isset($_GET['cat']);
  if ($cat == false) {
    if ($brand == false) {
  ?>
      <form method="POST">
        <div class="list_phantrang">
          <a class="prev" href="#">PREV</a>
          <a class="next" href="#">NEXT</a>
        </div>
      </form>
  <?php }
  } ?>
</div>
<?php

//phan trang 
$sql = "SELECT * FROM `products`";
$run_pro = $con->query($sql);
$product_total = 0;
if ($run_pro->num_rows > 0) {
  while ($row = $run_pro->fetch_assoc()) {
    $product_total++;
  }
}
// echo $product_total."<br>";
$product_total = ceil($product_total / 8);  //30/8=3,75
// echo $product_total;

?>
<script type="text/javascript">
  $(document).ready(function() {
    $("a.prev").hide();
    var check = 1; //trang dau`
    var show_product_qty = 0;

    //phan trang ..next      

    $("a.next").click(function() {
      check++;
      if (check > 1) {
        $("a.prev").show();
      }

      if (check == "<?php echo $product_total; ?>") {
        $("a.next").hide();
      }
      show_product_qty += 8;
      $.ajax({
        method: "POST",
        url: "ajax/phantrang.php",
        mimeType: "multipart/form-data",
        data: {
          show_product_qty: show_product_qty
        },
        success: function(response) {
          // alert(response);
          console.log(response);
          $("div#product_box").html(response);

        },
        error: function(response) {
          console.log("error");
        },
      })
    });

    //phan trang ..prev      

    $("a.prev").click(function() {
      check--;
      // var asd = "<?php echo "asd" ?>"

      if (check < "<?php echo $product_total; ?>") {
        $("a.next").show();
      }

      if (check == 1) {
        $("a.prev").hide();
      }
      show_product_qty -= 8;
      $.ajax({
        method: "POST",
        url: "ajax/phantrang.php",
        mimeType: "multipart/form-data",
        data: {
          show_product_qty: show_product_qty
        },
        success: function(response) {
          // alert(response);
          console.log(response);
          $("div#product_box").html(response);

        },
        error: function(response) {
          console.log("error");
        },
      })
    })
  })
</script>
<?php
include('includes/footer.php');
?>