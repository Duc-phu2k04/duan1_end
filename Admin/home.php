<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h3>
                                <?php foreach ($tongtk as $taikhoan) {
                                    extract($taikhoan);
                                    echo $tongtk;
                                } ?>
                            </h3>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tài khoản</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h3>
                                <?php foreach ($tongdm as $dm) {
                                    extract($dm);
                                    echo $tongdm;
                                } ?>
                            </h3>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Danh mục</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h3>
                                <?php foreach ($tongsp as $sp) {
                                    extract($sp);
                                    echo $tongsp;
                                } ?>
                            </h3>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Sản phẩm</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h3>
                                <?php foreach ($tongbl as $binhluan) {
                                    extract($binhluan);
                                    echo $tongbl;
                                } ?>
                            </h3>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Bình luận</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--End Content -->


<div class="container-fluid">
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
    </div> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Thống kê sản phẩm</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($listthongke as $thongke):
                            extract($thongke);
                            ?>
                            <tr>
                                <td>
                                    <?= $madm ?>
                                </td>
                                <td>
                                    <?= $tendm ?>
                                </td>
                                <td>
                                    <?= $countsp ?>
                                </td>
                                <td>
                                    <?= $maxprice ?>
                                </td>
                                <td>
                                    <?= $minprice ?>
                                </td>
                                <td>
                                    <?= $avgprice ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biểu đồ</h1>
    </div> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Biểu đồ</h4>
        </div>
        <div class="card-body">

            <div id="myChart" style="width:100%;  height:600px; ">
            </div>
            <script>
                google.charts.load('current', { 'packages': ['corechart'] });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    const data = google.visualization.arrayToDataTable([
                        ['Tên', 'Số liệu'],
                        <?php
                        $tongdm = count($listthongke);
                        $i = 1;

                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tongdm)
                                $dauphay = "";
                            else
                                $dauphay = ",";
                            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                            $i += 1;

                        }

                        ?>
                    ]);

                    const options = {
                        title: 'Biểu đồ thống kê'
                    };

                    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);
                }
            </script>


        </div>
    </div>


    <!--End Content -->

</div>