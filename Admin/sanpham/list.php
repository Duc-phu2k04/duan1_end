<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <form action="">
                    <a href="index.php?act=addsp"><input type="button" class="btn btn-primary" value="Nhập thêm"></a>
                </form>

                <br>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                            $hinhpath = "../upload_file/" . $img;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='90'>";
                            } else {
                                $hinh = "No img";
                            }

                            echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $tensp . '</td>
                                <td>' . $giasp . ' VNĐ</td>
                                <td>' . $hinh . '</td>
                                <td>' . $mota . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . $luotxem . '</td>
                                <td>' . ($trangthai === 0 ? "<p style='color: green;'>Còn hàng</p>" : "<p style='color: red;'>Hết hàng</p>") . '</td>
                                <td>  
                                   <a href=" index.php?act=chitietsp&id= ' . $id . '"><input type="button" class=" form-control btn btn-secondary" value="Chi tiết"></a> 
                                    <a href="' . $suasp . '"><input type="button" class=" form-control btn btn-warning mt-2" value="Sửa"></a> 
                                    <a href="' . $xoasp . '"  onclick="return confirmDeletesp()"><input type="button" class=" form-control btn btn-danger mt-2" value="Xóa"></a>
                                </td> 
                                </tr>';

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

</div>


<script>
    function confirmDeletesp() {
        if (confirm("Bạn có muốn xóa sản phẩm này không ?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>