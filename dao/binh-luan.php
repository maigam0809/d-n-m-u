<?php
Require_once 'pdo.php';

// thêm mới bình luận 
function binh_luan_insert($user_id, $product_id, $content,$created_at){
    $created_at = date("Y-m-d h:i:sa");
    $sql = "INSERT INTO comments (user_id, product_id, content,created_at) VALUES (?,?,?,?)";
   
    pdo_execute($sql, $user_id, $product_id, $content,$created_at);
   
}

// update bình luận
function binh_luan_update($id, $user_id, $product_id, $content, $created_at){
    $sql = "UPDATE comments SET user_id = ?, product_id = ?, content = ?, created_at = ? WHERE id = ?";
    pdo_execute($sql, $user_id, $product_id, $content, $created_at, $id);

}

// xóa bình luận
function binh_luan_delete($id){
    $sql = "DELETE FROM comments WHERE id=?";
        if(is_array($id)){
            foreach ($id as $ma) {
                pdo_execute($sql, $ma);
            }
        }
        else{
            pdo_execute($sql, $id);
        }
}

//
function binh_luan_select_all(){
    $sql = "SELECT * FROM comments ORDER BY created_at asc";
    return pdo_query($sql);

}

function binh_luan_select_by_id($id){
    $sql = "SELECT * FROM comments WHERE id=?";
    return pdo_query_one($sql, $id);

}

function binh_luan_exist($id){
    $sql = "SELECT count(*) FROM comments WHERE id=?";
    return pdo_query_value($sql, $id) > 0;


}



function binh_luan_select_by_hang_hoa($product_id){
    $sql = "SELECT * , b.created_at 'ngay_nhap' FROM users u
            JOIN comments b ON u.id=b.user_id
            INNER JOIN products p on p.id = b.product_id
            WHERE b.product_id=? 
            ORDER BY b.created_at desc limit 5
            ";
    return pdo_query($sql, $product_id);


}

?>