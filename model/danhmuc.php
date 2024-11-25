<?php 

// in danh sách
function insert_danhmuc($tendm, $img)
{
    $sql = "insert into danhmuc(tendm, img) values('$tendm', '$img')";
    pdo_execute($sql);
}

// xóa danh mục
function delete_danhmuc($id)
{
    $sql = "delete from danhmuc where id=  $id" ;
    pdo_execute($sql);
}


function loadall_danhmuc()
{
    $sql = "select * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id)
{
    $sql = "select * from danhmuc where id=" . $id;
    $danhmuc = pdo_query_one($sql);
    return $danhmuc;
}
// sửa danh mục
function update_danhmuc($id, $tendm, $img)
{
    if ($img != "") {
        $sql = " update danhmuc set tendm = '". $tendm ."', img ='".$img."' where id= " . $id;
    } else {
        $sql = " update danhmuc set tendm = '". $tendm ."' where id= " . $id;
    }
    pdo_execute($sql);
}

?>