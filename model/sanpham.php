<?php


function insert_sanpham($tensp, $giasp, $hinh, $mota, $soluong, $luotxem, $trangthai, $iddm, $id_sptheochatlieu)
{
    $sql = "insert into sanpham (tensp, giasp, img , mota, soluong, luotxem, trangthai, iddm, id_sptheochatlieu) values ('$tensp', '$giasp', '$hinh', '$mota','$soluong','$luotxem','$trangthai', '$iddm',  '$id_sptheochatlieu')";
    pdo_execute($sql);


}
function delete_sapham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}

function loadall_sanpham_top5()
{
    $sql = "select * from sanpham where 1 order by giasp desc limit 0,5";
    $sanphamtop5 = pdo_query($sql);
    return $sanphamtop5;
}



function loadall_shop($kyw = " ", $iddm = 0)
{
    $sql = "select * from sanpham where 1"; // Câu lệnh SQL cơ bản
    if ($kyw != "") {
        $sql .= " and tensp like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by luotxem asc limit 0, 10";

    // Thực hiện truy vấn
    $sanphamShop = pdo_query($sql);

    // Kiểm tra nếu $sanphamShop là null hoặc không phải là mảng
    if ($sanphamShop === null || !is_array($sanphamShop)) {
        return [];  // Trả về mảng rỗng nếu không có sản phẩm
    }

    return $sanphamShop;  // Trả về kết quả hợp lệ
}



function load_sanpham_top6()
{
    $sql = "select * from sanpham order by giasp desc limit 6";
    $sanphamtop6 = pdo_query($sql);
    return $sanphamtop6;
}



function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}



function loadall_sanpham($kyw = " ", $iddm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and tensp like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }

    $sql .= " order by id desc";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function loadall_sp_theochatlieu($kyw = " ", $id_sptheochatlieu = 0)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and tensp like '%" . $kyw . "%'";
    }
    if ($id_sptheochatlieu > 0) {
        $sql .= " and id_sptheochatlieu ='" . $id_sptheochatlieu . "'";
    }

    $sql .= " order by id desc";

    $listsp_theochatlieu = pdo_query($sql);
    return $listsp_theochatlieu;
}




function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id= " . $id;
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

// function load_ten_dm($iddm)
// {
//     if ($iddm > 0) {
//         $sql = "select * from danhmuc where id=" . $iddm;
//         $danhmuc = pdo_query_one($sql);
//         extract($danhmuc);
//         return $tendm;
//     } else {
//         return "";
//     }
// }



function update_sanpham($id, $iddm, $id_sptheochatlieu, $tensp, $giasp, $mota, $soluong, $luotxem, $trangthai, $hinh)
{
    if ($hinh != "") {
        $sql = " update sanpham set iddm = '" . $iddm . "' , id_sptheochatlieu = '" . $id_sptheochatlieu . "' , tensp = '" . $tensp . "', giasp = '" . $giasp . " ', mota = '" . $mota . "', soluong='" . $soluong . "', luotxem='" . $luotxem . "', trangthai='" . $trangthai . "', img = '" . $hinh . "' where id = " . $id;
    } else {
        $sql = " update sanpham set iddm = '" . $iddm . "' , id_sptheochatlieu = '" . $id_sptheochatlieu . "' , tensp = '" . $tensp . "', giasp = '" . $giasp . " ', mota = '" . $mota . "', soluong='" . $soluong . "', luotxem='" . $luotxem . "', trangthai='" . $trangthai . "' where id = " . $id;
    }
    pdo_execute($sql);
}


function tang_luotxem($luotxem,$idsp){
    $sql = "UPDATE sanpham SET luotxem='$luotxem' WHERE id_sp='$idsp'";
    pdo_execute($sql);
}



?>

