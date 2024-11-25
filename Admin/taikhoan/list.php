<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tài khoản</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Quản lý tài khoản</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listtaikhoan as $taikhoan): 
                            extract($taikhoan);
                            $suatk = "index.php?act=suatk&id=" . $tk_id;
                            $xoatk = "index.php?act=xoatk&id=" . $tk_id;

                            if ($tk_img) {
                                $url = "../upload_file/$tk_img";
                            } else {
                                $url = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
                            }
                            ?>
                            <tr>
                            <td><?= $tk_id  ;?></td>
                            <td><?= $tk_nguoidung ;?></td>
                            <td><?= $tk_matkhau ;?></td>
                            <td><?= $tk_email ;?></td>
                            <td><img src="<?= $url ?>" width="100px" height="130px"></td>
                            <td><?= $tk_diachi ?></td>
                            <td><?= $tk_sdt ?></td>
                            <td><?= $r_name_role?></td>
                            <td><a href="<?= $suatk ?>" ><input type="button" class= " form-control btn btn-warning" value="Sửa"></a>
                            <a href="<?= $xoatk ?>" onclick="return confirmDeletetk()"><input type="button" class=" form-control btn btn-danger mt-2" value="Xóa"></a></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    function confirmDeletetk() {
        if (confirm("Bạn có muốn xóa tài khoản này không")) {
            document.location = "index.php?act=listtk";
        } else {
            return false;
        }
    }
</script>
<!--End Content -->

</div>