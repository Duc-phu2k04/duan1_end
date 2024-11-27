<?php

function insert_donhang($nguoidung, $sdt, $email, $diachi, $thoigian_mua, $pt_thanhtoan, $soluong, $id_taikhoan)
{
    $sql = "insert into donhang values (null,'$nguoidung' ,'$sdt','$email','$diachi','$thoigian_mua','$pt_thanhtoan','$soluong',1, '$id_taikhoan')";
    return pdo_execute_return_lastInsertId($sql);
}


function delete_donhang($id)
{
    $sql = "delete from donhang where id=" . $id;
    pdo_execute($sql);
}

function loadall_trangthai()
{
    $sql = "select * from trangthai_donhang ";
    $listtrangthai = pdo_query($sql);
    return $listtrangthai;
}
function load_cart($id_donhang){
    $sql = "SELECT
                gh.id, 
                gh.id_tk,
                gh.id_sp, 
                gh.tensp, 
                gh.img, 
                gh.giasp,
                gh.soluong, 
                gh.id_donhang,
                dh.thoigian_mua,
                ttdh.ten_trangthai
            FROM giohang as gh
            INNER JOIN donhang as dh 
            ON gh.id_donhang = dh.id
            INNER JOIN trangthai_donhang as ttdh
            ON gh.id_trangthai_donhang = ttdh.id_trangthai
            where gh.id_donhang = $id_donhang";
    $giohang = pdo_query($sql);
    return $giohang;
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
function loadone_donhang_user($id)
{
    $sql = "SELECT 
                donhang.id, 
                donhang.nguoidung, 
                donhang.diachi,
                donhang.sdt, 
                donhang.email, 
                donhang.thoigian_mua, 
                donhang.pt_thanhtoan,
                donhang.soluong,
                trangthai_donhang.ten_trangthai,
                donhang.id_taikhoan,
                giohang.id_donhang,
                giohang.id_tk,
                giohang.tensp,
                giohang.giasp 
        FROM donhang
        LEFT JOIN giohang ON giohang.id = donhang.id_taikhoan
        INNER JOIN trangthai_donhang ON trangthai_donhang.id_trangthai = donhang.id_trangthai_donhang

        WHERE donhang.id_taikhoan = $id";
    $donhang = pdo_query($sql);
    return $donhang;
}

function loadall_donhang()
{
    $sql = "SELECT 
        donhang.id,
        donhang.nguoidung,
        donhang.sdt,
        donhang.email,
        donhang.diachi,
        donhang.thoigian_mua,
        donhang.pt_thanhtoan,
        donhang.soluong,
        trangthai_donhang.ten_trangthai
        from donhang 
        inner join trangthai_donhang
        on trangthai_donhang.id_trangthai = donhang.id_trangthai_donhang";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}

function loadonedonang(){
    $sql = "SELECT * FROM donhang ORDER BY id desc";
    $donhang = pdo_query_one($sql);
    return $donhang;
}

function loadone_donhang($id)
{
    $sql = "select * from donhang where id= " .$id;
    $donhang = pdo_query_one($sql);
    return $donhang;
}

function huydonhang($id){
    $sql = "UPDATE donhang SET id_trangthai_donhang = 8 WHERE id = $id";
    pdo_execute($sql);
    header("Location: index.php?act=listdh");
}


function update_donhang($id, $nguoidung, $sdt, $email, $diachi, $thoigian_mua, $soluong, $id_trangthai_donhang)
{
    $sql = "update donhang set nguoidung = '" . $nguoidung . "', sdt = '" . $sdt . "', email = '" . $email . "', diachi = '" . $diachi . "', thoigian_mua= '" . $thoigian_mua . "', soluong='" . $soluong . "' , id_trangthai_donhang = '" . $id_trangthai_donhang . "'  where id= " . $id;
    pdo_execute($sql);
}
?>