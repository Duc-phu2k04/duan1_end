<?php

if (is_array($sanpham)) {
    extract($sanpham);
}

$hinhpath = ".././upload_file/" . $img;
if (is_file($hinhpath)) {
    $img = "<img src='" . $hinhpath . "' height='500px' width='auto'>";
} else {
    $img = "Chưa có ảnh";
}

?>


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Chi tiết sản phẩm</h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <div class="container" style="display: flex; ">
                    <div class="list-product-img">
                        <?= $img ?>
                    </div>
                    <div class="list-product-text" style="padding-left: 50px">
                        <h2><label for="">Mã sản phẩm :
                                <?= $id ?>
                            </label></h2>
                        <h2><label for="">Tên danh mục:
                                <?php foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    if ($iddm === $id) {
                                        echo $tendm;
                                    } else {
                                        echo "";
                                    }
                                } ?>
                            </label></h2>
                        <h2><label for="">Tên sản phẩm:
                                <?= $tensp ?>
                            </label></h2>
                        <h2><label for="">Giá sản phẩm:
                                <?= $giasp ?>
                            </label></h2>
                        <h2><label for="">Mô tả:
                                <?= $mota ?>
                            </label></h2>
                        <h2><label for="">Mùa :
                                <?php
                                foreach ($listmua as $sptheomua) {
                                    extract($sptheomua);
                                    if ($id_sptheomua === $id_mua) {
                                        echo $ten_mua;
                                    } else {
                                        echo "";
                                    }
                                }
                                ?>
                            </label></h2>
                        <h2><label for="">Số lượng:
                                <?= $soluong ?>
                            </label></h2>
                        <h2><label for="">Lượt xem:
                                <?= $luotxem ?>
                            </label></h2>
                        <h2><label for="">Trạng thái:
                                <?= $trangthai === 0 ? "<span style='color: green;'>Còn hàng</span>" : "<span style='color: red;'>hết hàng</span>" ?>
                            </label></h2>

                    </div>
                </div>
            </div>
            <br>

            <iframe src="./sanpham/listbl.php?id_sp=<?php if(is_array($sanpham)){
                extract($sanpham);
            } 
            echo $id;?>" width="100%" height="300px" frameborder="0"></iframe>
            <div class="row">
                <div class="function-back">
                    <a href="index.php?act=listsp"><input type="submit" class="btn btn-primary"
                            value="Quay lại trang sản phẩm"></a>
                </div>





            </div>
        </div>
    </div>
    <br>
    
    <?php //include "listbl.php"; ?>

<!--End Content -->

</div>