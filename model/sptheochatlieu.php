<?php

function loadall_sptheochatlieu()
{
    $sql = "select * from sptheochatlieu order by id_chatlieu asc";
    $listchatlieu = pdo_query($sql);
    return $listchatlieu;
}
function loadone_sptheochatlieu($id_chatlieu)
{
    $sql = "select * from sptheochatlieu where id_chatlieu=" . $id_chatlieu;
    $sptheochatlieu = pdo_query_one($sql);
    return $sptheochatlieu;
}

?>
