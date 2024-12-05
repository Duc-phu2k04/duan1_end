<?php
// Hàm lấy tất cả sản phẩm theo chất liệu
function loadall_sptheochatlieu()
{
    // Câu lệnh SQL để lấy tất cả sản phẩm theo chất liệu, sắp xếp theo id_chatlieu
    $sql = "SELECT * FROM sptheochatlieu ORDER BY id_chatlieu ASC";
    
    // Gọi hàm pdo_query để thực thi câu lệnh và trả về danh sách sản phẩm
    $listchatlieu = pdo_query($sql);
    return $listchatlieu;
}

// Hàm lấy một sản phẩm theo id_chatlieu
function loadone_sptheochatlieu($id_chatlieu)
{
    // Kiểm tra nếu id_chatlieu là một số hợp lệ
    if (!is_numeric($id_chatlieu)) {
        return null; // Trả về null nếu id không hợp lệ
    }

    // Câu lệnh SQL để lấy một sản phẩm theo id_chatlieu
    $sql = "SELECT * FROM sptheochatlieu WHERE id_chatlieu = :id_chatlieu";
    
    // Thực thi câu lệnh với tham số an toàn để tránh SQL Injection
    $sptheochatlieu = pdo_query_one($sql, [':id_chatlieu' => $id_chatlieu]);
    return $sptheochatlieu;
}
?>
