<?php
// Kết nối với cơ sở dữ liệu và lấy dữ liệu thống kê
// Bạn có thể thay thế phần này bằng mã kết nối cơ sở dữ liệu và truy vấn của bạn
// Ví dụ: 

// Đảm bảo bạn có hàm `loadThongKeDanhMuc()` trả về danh sách thống kê từ cơ sở dữ liệu
// Ví dụ dữ liệu giả
$listthongke = [
    ['tendm' => 'Đồng hồ nam', 'countsp' => 120],
    ['tendm' => 'Đồng hồ nữ', 'countsp' => 150],
    ['tendm' => 'Đồng hồ thể thao', 'countsp' => 90],
    ['tendm' => 'Đồng hồ sang trọng', 'countsp' => 200]
];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ thống kê bán đồng hồ</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        /* Bạn có thể thêm các style ở đây nếu cần */
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Biểu đồ thống kê bán đồng hồ</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Biểu đồ thống kê bán đồng hồ</h4>
            </div>
            <div class="card-body">

                <!-- Vùng chứa biểu đồ -->
                <div id="myChart" style="width:100%; height:600px;"></div>

                <script>
                    // Tải Google Charts
                    google.charts.load('current', {
                        'packages': ['corechart', 'piechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                            ['Danh mục', 'Số lượng bán'],
                            <?php 
                                // Giả sử $listthongke chứa các danh mục và số lượng bán
                                $tongdm = count($listthongke); // Tổng số danh mục
                                $i = 1;

                                foreach ($listthongke as $thongke) {
                                    extract($thongke);
                                    // Xử lý dấu phẩy cuối cùng cho danh sách dữ liệu
                                    $dauphay = ($i == $tongdm) ? "" : ",";
                                    echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                                    $i++;
                                }
                            ?>
                        ]);

                        const options = {
                            title: 'Biểu đồ thống kê bán đồng hồ',
                            is3D: true, // Biểu đồ 3D
                            slices: {
                                0: {
                                    offset: 0.1
                                }, // Thêm khoảng cách cho từng phần tử
                                1: {
                                    offset: 0.2
                                },
                                2: {
                                    offset: 0.3
                                },
                                3: {
                                    offset: 0.4
                                }
                            },
                            pieSliceText: 'percentage', // Hiển thị tỷ lệ phần trăm khi hover chuột
                            legend: {
                                position: 'top' // Hiển thị legend phía trên
                            }
                        };

                        // Tạo biểu đồ và vẽ nó vào phần tử HTML có id là myChart
                        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                        chart.draw(data, options);
                    }
                </script>

            </div>
        </div>
    </div>

</body>

</html>
