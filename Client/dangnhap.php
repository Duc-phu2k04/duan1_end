<?php
ob_start();
if(isset($_SESSION["user"])) {
    header("Location: index.php");
}

?>
<div class="wrapper">
    <div class="login">
        <h1>Đăng nhập</h1>
        <form action="" method="post" class="form-login">
            <div class="form-input">
                <p>Tài khoản</p>
                <input type="text" name="nguoidung" />
            </div>
            <div class="form-input">
                <p>Mật khẩu</p>
                <input type="password" id="password" name="matkhau" />
            </div>

            <input type="checkbox" class="mt-2" onclick="myFunction()"> Hiện mật khẩu
            <br>
            <?php

            if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $nguoidung = $_POST['nguoidung'];
                $matkhau = $_POST['matkhau'];
                $checkuser = checkuser($nguoidung, $matkhau);

                if(is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header("Location: index.php");

                }
                if(!$checkuser) {
                    echo "<lable style='color:red;'>Tài khoản hoặc mật khẩu không chính xác</lable>";
                }
                $thongbao = "<lable style='color:red;'>Tài khoản không tồn tại. Vui lòng nhập lại</lable>";
            }


            ?>

            <div class="login-btn">
                <input type="submit" class="mt-2" name="dangnhap" value="Đăng nhập">
            </div>
            <div class="forget-password">
                <a href="#">Quên mật khẩu?</a>
            </div>

            <div class="forget-password">
                <a href="index.php?act=dangky">Đăng ký tài khoản</a>
            </div>
        </form>
    </div>
</div>
</div>
<?php ob_end_flush(); ?>


<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>