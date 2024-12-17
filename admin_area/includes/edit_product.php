<?php
$edit_product = mysqli_query($con, "SELECT * from `products` where `product_id`='".$_GET['product_id']."'");
$fetch_edit = mysqli_fetch_array($edit_product);
?>

<div class="form_box">
    <form action="" method="POST" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td colspan="7">
                    <h1>Sửa thông tin sản phẩm</h1>
                    <div class="border_bottom">

                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Tên Sản Phẩm</b></td>
                <td><input type="text" name="product_title" value="<?php echo ($fetch_edit['product_title']); ?>" size="60" required value=""></td>
            </tr>
            <tr>
                <td><b>Danh Mục Sản Phẩm</b></td>
                <td>
                    <select name="product_cat" id="">
                        <!-- <option value="">Chọn một danh mục</option> -->
                        <?php
                        $get_cats = "SELECT * from categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            if ($fetch_edit['product_cat'] == $cat_id) {
                                echo "<option value = '$fetch_edit[product_cat]' selected>$cat_title</option>";
                            } else {
                                echo "<option value = '$cat_id'>$cat_title</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Thương Hiệu Sản Phẩm : </b></td>
                <td>
                    <select name="product_brand" id="">
                        <!-- <option value="">Chọn một thương hiệu</option> -->
                        <?php
                        $get_brands = "SELECT * from brands";
                        $run_brands = mysqli_query($con, $get_brands);

                        while ($row_brands = mysqli_fetch_array($run_brands)) {
                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];

                            if ($fetch_edit['product_brand'] == $brand_id) {
                                echo "<option value = '$fetch_edit[prodyct_brand]' selected>$brand_title</option>";
                            } else {
                                echo "<option value = '$brand_id'>$brand_title</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Hình Ảnh Sản Phẩm : </b></td>
                <td><input type="file" name="product_image" required/ />
                    <div class="edit_image">
                        <img src="product_images/<?php echo ($fetch_edit['product_image']); ?>" width="100px" height="70px" alt="">
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Giá Sản Phẩm : </b></td>
                <td><input type="number" min="1" name="product_price" value="<?php echo($fetch_edit['product_price']) ?>" required/ id=""></td>
            </tr>
            <tr>
                <td><b>So Luong : </b></td>
                <td><input type="number" min="1" name="product_qty" value="<?php echo($fetch_edit['product_soluong']) ?>" required/ id=""></td>
            </tr>
            <tr>
                <td valign="top"><b>Mô tả bản phẩm</b></td>
                <td><textarea name="product_desc"  rows="10" ><?php echo($fetch_edit['product_desc']); ?></textarea></td>
            </tr>
            <tr>
                <td><b>Từ Khoá Tìm Kiếm Sản Phẩm : </b></td>
                <td><input type="text" name="product_keywords" value="<?php echo($fetch_edit['product_keywords']) ?>" required/ id=""></td>
            </tr>
            <tr">
                <td colspan="7"><input type="submit" name="edit_product" value="Lưu thanh đổi" id=""></td>
            </tr>
        </table>
    </form>
</div>
<!-- Thêm sản phẩm mới -->
<?php
if (isset($_POST['edit_product'])) {

    $img_name = $_FILES['product_image']['name'];
    $img_arr = explode('.',$img_name);
    $img_tail = array_pop($img_arr);
    $img = ['png','jpg','jpeg','svg','PNG','JPG','JPEG','SVG'];
    $check_img = in_array($img_tail,$img);
    if($check_img==1){
        $product_desc = trim(mysqli_real_escape_string($con, $_POST['product_desc']));
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        $product_title = trim(mysqli_real_escape_string($con,$_POST['product_title']));
        $cat_id = $_POST['product_cat'];
        $brand_id = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_qty = $_POST['product_qty'];
        $product_keywords = $_POST['product_keywords'];
        // $product_soluong = $_POST['product_soluong'];
        $date = date("F d, y");
        move_uploaded_file($product_image_tmp, "product_images/$product_image");
        $update_product = mysqli_query($con,"UPDATE `products` set `cat_id` = '".$cat_id."',`brand_id` = '".$brand_id."',`product_title` = '".$product_title."',`product_price`='".$product_price."',`product_desc`='".$product_desc."',`product_image`='".$product_image."',product_keywords = '$product_keywords',date='$date',`product_soluong`='".$product_qty."' where product_id = '$_GET[product_id]'");
        
       
        if(($update_product)){
            echo "Bạn đã sửa sản phẩm thành công";
        }else{
            echo("Bạn đã bị lỗi");
        }
      }

}
?>