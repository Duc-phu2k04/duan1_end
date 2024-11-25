<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Thêm danh mục</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <br>
                <form action="index.php?act=adddm" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputID" class="form-label">Mã danh mục</label>
                        <input type="text" class="form-control" name=madm>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="tendm">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Ảnh</label>
                        <br>
                        <input type="file" name="hinh">
                    </div>

                    <input type="submit" class="btn btn-primary" name="themmoi" onclick="return confirmAdddm()"
                        value="Thêm mới">
                    <input type="reset" class="btn btn-primary" value="Nhập lại">

                    <a href="index.php?act=listdm"><input type="button" class="btn btn-primary" value="Danh sách"></a>
                    <?php

                    if (isset($thongbao) && ($thongbao != ""))
                        echo $thongbao;

                    ?>
                </form>
            </div>
        </div>
    </div>
    <script>
    function confirmAdddm() {
        if (confirm("Bạn có muốn thêm danh mục không")) {
            document.location = "index.php?act=listdm";
        } else {
            return false;
        }
    }
    </script>

</div>

</div>