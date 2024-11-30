<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <br>
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Danh mục</label>
                        <select name="iddm" id="">
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id . '"> ' . $tendm . '</option>';
                            }
                            ?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Mùa</label>
                        <select name="id_sptheomua" id="">
                            <?php
                            foreach ($listmua as $sptheomua) {
                                extract($sptheomua);
                                echo '<option value="' . $id_mua. '"> ' . $ten_mua . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="giasp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Ảnh</label>
                        <br>
                        <input type="file" name="hinh">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Mô tả</label>
                        <textarea class="form-control" rows="10" name="mota"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Số lượng</label>
                        <input type="text" class="form-control" name="soluong">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Lượt xem</label>
                        <input type="text" class="form-control" name="luotxem" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Trang thái</label>
                        <br>
                        <select name="trangthai" class="form-control" id="">
                            <option value="0" selected>Còn hàng</option>
                            <option value="1" selected>Hết hàng</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" name="themmoi" onclick="return confirmAddsp()"
                        value="Thêm mới">
                    <input type="reset" class="btn btn-primary" value="Nhập lại">
                    <a href="index.php?act=listsp"><input type="button" class="btn btn-primary" value="Danh sách"></a>

                    <?php
                    if (isset($thongbao) && ($thongbao != ""))
                        echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        function confirmAddsp() {
            if (confirm("Bạn có muốn thêm sản phẩm này không?")) {
                document.location = "index.php?act=listsp";
            } else {
                return false;
            }
        }
    </script>

</div>

</div>