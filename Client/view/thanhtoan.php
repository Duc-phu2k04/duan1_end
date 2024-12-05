<?php
if (isset($_SESSION['user'])) {
    $nguoidung = $_SESSION['user']['nguoidung'];
    $diachi = $_SESSION['user']['diachi'];
    $email = $_SESSION['user']['email'];
    $sdt = $_SESSION['user']['sdt'];
} else {
    $nguoidung = "";
    $diachi = "";
    $email = "";
    $sdt = "";
}
?>

<div class="main-container no-sidebar">
    <div class="container">
        <div class="main-content">
            <div class="page-title">
                <h3>Thanh toán</h3>
            </div>

            <div class="row">
                <h3>Thông tin đơn hàng</h3>
                <table class=" text-center" border="1">
                    <tr>
                        <th class="p-2 text-center" style="width: 30px;">STT</th>
                        <th class="p-2 text-center" style="width: 100px;">Ảnh</th>
                        <th class="p-2 text-center" style="width: 100px;">Tên sản phẩm</th>
                        <th class="p-2 text-center" style="width: 50px;">Giá</th>
                        <th class="p-2 text-center" style="width: 50px;">Số lượng</th>
                    </tr>
                    <?php
                    $i = 1;
                    $tong = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $tong += $cart[5];
                        $image = '../upload_file/' . $cart[2] . '';
                        echo '<tr class="p-4">
                    <td class="p-2">' . $i . '</td>
                    <td class="p-2"><img src=' . $image . ' width="100px";  style="margin: 10 0 10 0;"/></td>
                    <td class="p-2">' . $cart[1] . '</td>
                    <td class="p-2">' . $cart[5] . '.000 ₫</td>
                    <td class="p-2">' . $cart[4] . '</td>
                    
                    </tr>
                    ';
                        $i += 1;
                    }

                    ?>
                </table>
                <br>
                <?php echo "<h4><b>Tổng tiền:  $tong.000 VNĐ</b></h4>"; ?>
                <br>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-checkout">
                        <h5 class="form-title">ĐỊA CHỈ GIAO HÀNG</h5>
                        <form action="" method="post">
                            <label for="">Họ tên:</label>
                            <p><input type="text" name="nguoidung" value="<?= $nguoidung ?>"></p>

                            <label for="">Email: </label>
                            <p><input type="text" name="email" value="<?= $email ?>"></p>

                            <label for="">Địa chỉ:</label>
                            <p><input type="text" name="diachi" value="<?= $diachi ?>"></p>

                            <label for="">Số điện thoại:</label>
                            <p><input type="text" name="sdt" value="<?= $sdt ?>"></p>

                    </div>
                    <div class="form-checkout checkout-payment">
                        <h5 class="form-title">Bạn muốn thanh toán</h5>
                        <div class="payment_methods">

                            <div class="payment_method">
                                <label><input name="pt_thanhtoan" type="radio" value="0" checked>Thanh toán khi giao
                                    hàng</label>
                            </div>
                            <div class="payment_method">
                                <label><input name="pt_thanhtoan" type="radio" value="1">Chuyển khoản trực
                                    tiếp</label>
                            </div>
                                <input type="submit" name="dongythanhtoan" onclick="return datHang()" class="button medium" value="Thanh toán">
                        </div>
                    </div>
                </div>
                </form>

                <div class="col-sm-6">
                    <div class="form-checkout">
                        <h5 class="form-title">SẢN PHẨM CÓ THỂ BẠN THÍCH</h5>
                        <div class="row">

                            <table class="shop_table cart">
                                <tbody>

                                    <?php
                                    foreach ($sanphamtop5 as $sanpham):
                                        extract($sanpham);
                                        $linksp = "index.php?act=chitietsp&id=" . $id;
                                        $hinh = "../upload_file/" . $img;
                                        ?>
                                        <tr>
                                            <form action="index.php?act=addgiohang" method="post">
                                                <td class="product-thumbnail">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <input type="hidden" name="img" value="<?= $img ?>">
                                                    <a href="<?= $linksp ?>">
                                                        <img src="<?= $hinh ?>" alt="">
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="<?= $linksp ?>">
                                                        <input type="hidden" name="tensp" value="<?= $tensp ?>">
                                                        <?= $tensp ?>
                                                    </a>
                                                </td>
                                                <input type="hidden" name="soluong" value="1">
                                                <td>
                                                    <span class="price" style="color:red;">
                                                        <input type="hidden" name="giasp" value="<?= $giasp ?> ₫">
                                                        <?= $giasp ?> ₫
                                                    </span>
                                                </td>

                                                <td class="text-right"><input type="submit" name="addtocart"
                                                        onclick="return confirmAddgh()" value="Thêm vào giỏ hàng">
                                                </td>
                                            </form>
                                        </tr>

                                    <?php endforeach; ?>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "menu/3hopcn.php"; ?>

    <script>
        function confirmAddgh() {
            if (confirm("Bạn thêm sản phẩm này vào giỏ hàng?")) {
                document.location = "index.php?act=listsp";
            } else {
                return false;
            }
        }

        function datHang(){
            if(confirm("Bạn có muốn đặt hàng không ?")){
                alert("Bạn đã đặt hàng thành công")
            }else{
                return false;
            }
        }
    </script>
</div>