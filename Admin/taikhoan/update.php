<?php

if (is_array($taikhoan)) {
    extract($taikhoan);
}

?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tài khoản</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Cập nhật tài khoản</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <br>
                <form action="index.php?act=updatetk" method="post" >

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" name="nguoidung" value="<?= $nguoidung ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="matkhau" value="<?= $matkhau ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $email ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" value="<?= $diachi ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" value="<?= $sdt ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Vai trò</label>
                        <select name="id_role" class="form-control" id="id_role" >
                            <?php
                            foreach ($listrole as $role):
                                extract($role); ?>
                                <option <?= $role['id_role'] == $taikhoan['id_role'] ? 'selected' : '' ?>
                                    value="<?= $role['id_role'] ?>">
                                    <?= $role['name_role'] ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?= $taikhoan['id'] ?>  ">
                    <input type="submit" class="btn btn-success" name="capnhat" onclick="return confirmUpdatetk()"
                        value="Cập nhật">
                    <input type="reset" class="btn btn-info" value="Nhập lại">
                    <a href="index.php?act=listtk"><input type="button" class="btn btn-primary" value="Danh sách"></a>

                    <?php
                    if (isset($thongbao) && ($thongbao != ""))
                        echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmUpdatetk() {
        if (confirm("Bạn có muốn sửa tài khoản này không")) {
            document.location = "index.php?act=listdm";
        } else {
            return false;
        }
    }
</script>

</div>