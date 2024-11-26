<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Quản lý danh mục</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="">
                    <a href="index.php?act=adddm"><input type="button" class="btn btn-primary" value="Nhập thêm"></a>
                </form>
                <br>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên loại</th>
                            <th>Ảnh</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($listdanhmuc as $danhmuc) :
                            extract($danhmuc);
                            $suadm = "index.php?act=suadm&id=" . $id;
                            $xoadm = "index.php?act=xoadm&id=" . $id;
                            $hinhpath = "../upload_file/" . $img;
                            
                            ?>
                        <tr>
                            <td><?=$id ?></td>
                            <td><?=$tendm ?></td>
                            <td><img src="<?= $hinhpath?>" width="100px" alt=""></td>
                            <td> <a href="<?=$suadm ?>"><input type="button" class=" btn btn-warning" value="Sửa"></a>
                                <a href="<?=$xoadm ?>" onclick="return confirmDeletedm()"><input type="button"
                                        class="  btn btn-danger " value="Xóa"></a>

                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

                <script>
                function confirmDeletedm() {
                    if (confirm("Bạn có muốn xóa danh mục này không")) {
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