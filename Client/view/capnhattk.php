<?php

if (is_array($taikhoan)) {
    extract($taikhoan);
}

$hinhpath = "../../upload_file/" . $img;
if (is_file($hinhpath)) {
    $img = "<img src='" . $hinhpath . "' height='100'>";
} else {
    $img = "no photo";
}

?>


<div class="wrapper">
    <div class="login">
        <h1>Cập nhật tài khoản</h1>
        <form action="index.php?act=capnhattk" method="post" class="form-login" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            
            <div class="form-input">
                <p>Email</p>
                <input type="text" name="email" value="<?= $email ?>">
            </div>
            <div class="form-input">
                <p>Ảnh</p>
                <br>
                <?php $hinhpath ?>
                <input type="hidden" class="form-control" name="img" value="<?= $hinhpath ?>">

                <input type="file" class="form-control" name="img" value="<?= $hinhpath ?>">
                <br>
            </div>

            <div class="form-input">
                <p>Số điện thoại</p>
                <input type="text" name="sdt" value="<?= $sdt ?>">
            </div>
            <div class="form-input">
                <p>Địa chỉ</p>
                <input type="text" name="diachi" value="<?= $diachi ?>">
            </div>

            <?php if (isset($_POST['capnhattk']) && $_POST['capnhattk']) {
                echo "Cập nhật tài khoản thành công";
            } ?>
            <div class="login-btn">

                <input type="submit" name="capnhattk" value="Cập nhật" onclick="return confirmCapnhattk()">
            </div>
            <div class="forget-password">
                <a href="index.php?act=tkcanhan">Về trang tài khoản</a>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmCapnhattk() {
        if (confirm("Bạn có muốn cập nhật lại tài khoản này không")) {
            document.location = "index.php?act=tkcanhan";
            alert("Cập nhật thành công");
        } else {
            return false;
        }
    }
</script>