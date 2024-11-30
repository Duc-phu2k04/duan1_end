<div class="main-container no-sidebar">
    <div class="container">
    <div class="shop-top">
        <div class="shop-top-left">
            <div class="breadcrumbs">
                <a href="index.php">Home</a>
                <span>Giỏ hàng<span>
            </div>
        </div>
    </div>
        <div class="main-content">
            <div class="page-title">
                <h3>Giỏ hàng</h3>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <table class="shop_table cart">
                        <thead>
                            <tr>
                                <th colspan="2" class="product-name text-center">Sản phẩm</th>
                                <th class="product-soluong text-center">Số lượng</th>
                                <th class="product-price text-center">Giá</th>
                                <th class="product-remove text-center">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 0;

                            foreach ($_SESSION['mycart'] as $cart) {
                                $hinh = '../upload_file/' . $cart[2] . '';
                                $linksp = 'index.php?act=chitietsp';
                                $xoa = 'index.php?act=deletecart&id=' . $id . '';

                                echo '
                                        <tr>
                                        <td class="product-thumbnail"><img src="' . $hinh . '" alt=""></td>
                                        <td class="product-name"><a href="#">' . $cart[1] . '</a></td>

                                        <form action="" method="post" class="quantity-cart">
                                        <td class="product-soluong">
                                        <div class="form-soluong">
                                        <input type="hidden" name="id" value="'.$cart[0].'">
                                        <input type="submit" name="giamsoluong" class="count" value="-">
                                        <input type="number" name="soluong" class="count" value="'. $cart[4] .'">
                                        <input type="submit" name="tangsoluong" class="count" value="+">
                                        </div>
                                        </td>
                                        </form>
                                        
                                        

                                        <td class="product-price"><a href="#">' . $cart[3] . '</a></td>

                                        <td class="product-remove"><a href=' . $xoa . ' onclick="return confirmDeletegh()"><i class="fa-regular fa-trash-can"></i></a></td> 
                                        </tr>';

                                $id += 1;
                            }
                            ;
                            ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="box-cart-total">
                        <h2 class="title">Tổng đơn hàng</h2>
                        <table>

                            <tr>
                                <?php
                                $tong = 0;
                                foreach ($_SESSION['mycart'] as $cart) {
                                    $tong += $cart[5];

                                }
                                $tongSoLuong = 0;
                                if (isset($_SESSION['mycart'])) {
                                    $cartItems = $_SESSION['mycart'];

                                    foreach ($cartItems as $cart) {
                                        $tongSoLuong += $cart[4];
                                    }
                                }

                                echo '<p>Số lượng ' . $tongSoLuong . ' sản phẩm </p> 
                                <p> Tổng: ' . $tong . '.000 ₫</p>';
                                ?>

                            </tr>

                            <br>
                            <tr class="order-total">
                                <?php
                                $tong = 0;
                                foreach ($_SESSION['mycart'] as $cart) {
                                    $tong += $cart[5];
                                }
                                echo '
                                <td>Tổng: </td>
                                <td><span class="price" style ="color: red">' . $tong . '.000 ₫</span></td>';

                                ?>

                            </tr>
                        </table>
                        <a href="index.php?act=thanhtoan" class="button medium">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDeletegh() {
            if (confirm("Bạn có muốn xóa sản phẩm này không?")) {
                document.location = "index.php?act=listsp";
            } else {
                return false;
            }
        }
    </script>

    <?php include '3hopcn.php'; ?>
</div>