<?php

Require_once 'pdo.php';


// thống kê hàng hóa
function thong_ke_hang_hoa(){
    $sql = "SELECT C.id, C.cate_name,"
            . " COUNT(*) so_luong,"
            . " MIN(P.price) gia_min,"
            . " MAX(P.price) gia_max,"
            . " AVG(P.price) gia_avg"
            . " FROM products P "
            . " JOIN categories C ON C.id = P.cate_id "
            . " GROUP BY C.id, C.cate_name";

    return pdo_query($sql);
}

function thong_ke_binh_luan(){
    $sql = "SELECT P.id, P.name,"
            . " COUNT(*) so_luong,"
            . " MIN(CM.created_at) cu_nhat,"
            . " MAX(CM.created_at) moi_nhat"
            . " FROM comments CM "
            . " JOIN products P ON P.id=CM.product_id "
            . " GROUP BY P.id, P.name"
            . " HAVING so_luong > 0";


    return pdo_query($sql);

}







?>