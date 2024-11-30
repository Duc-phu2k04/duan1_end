<?php

function loadall_sptheomua()
{
    $sql = "select * from sptheomua order by id_mua asc";
    $listmua = pdo_query($sql);
    return $listmua;
}
function loadone_sptheomua($id_mua)
{
    $sql = "select * from sptheomua where id_mua=" . $id_mua;
    $sptheomua = pdo_query_one($sql);
    return $sptheomua;
}

?>