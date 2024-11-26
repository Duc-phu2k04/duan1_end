<?php
if (is_array($danhmuc)) {
    extract($danhmuc);
}
$hinhpath = ".././upload_file/" . $img;
if (is_file($hinhpath)) {
    $img = "<img src='" . $hinhpath . "' height='200'>";
} else {
    $img = "no photo";
}


?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sửa danh mục</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <br>
                <form action="index.php?act=updatedm" method="post">

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên danh mục</label>
                        <input type="hidden" class="form-control" name="tendm" value="<?= $tendm ?>">
                        <input type="text" class="form-control" name="tendm" value="<?= $tendm ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Ảnh</label>
                        <input type="hidden" class="mt-2" name="img" value="<?= $img  ?>">
                        <br>
                        <img src="<?= $img  ?>" alt="">
                        <br>
                        <input type="file" class="mt-2" name="img">
                    </div>
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0))
                        echo $id; ?>">
                    <input type="submit" class="btn btn-success" name="capnhat" onclick="return confirmUpdatedm()"
                        value="Cập nhật">
                    <input type="reset" class="btn btn-info" value="Nhập lại">

                    <a href="index.php?act=listdm"><input type="button" class="btn btn-primary" value="Danh sách"></a>
                    <?php

                    if (isset($thongbao) && ($thongbao != ""))
                        echo $thongbao;
                    ?>
                </form>
                <script>
                function confirmUpdatedm() {
                    if (confirm("Bạn có muốn sửa danh mục này không ?")) {
                        document.location = "index.php?act=listdm";
                    } else {
                        return false;
                    }
                }
                </script>
            </div>
        </div>
    </div>
</div>

</div>