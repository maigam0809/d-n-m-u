<?php
Require_once 'pdo.php';

// thêm categories
function loai_insert($cate_name){
    $sql = "INSERT INTO categories (cate_name) VALUES(?)";
    pdo_execute($sql, $cate_name);

}

// update categories
function loai_update($id, $cate_name){
    $sql = "UPDATE categories SET cate_name=? WHERE id=?";
    pdo_execute($sql, $cate_name, $id);


}

// Xóa categories 
function loai_delete($id){
    $sql = "DELETE FROM categories WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }

}


// Lấy tất cả sữ liệu trong categories
function loai_select_all(){
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);

}


// Lấy tên loại sản phẩm the mã id
function loai_select_by_id($id){
    $sql = "SELECT * FROM categories WHERE id=?";
    return pdo_query_one($sql, $id);
    
}


// Kiểm tra tên id của sản phẩm có tồn tại hay không
 function loai_exist($id){
    $sql = "SELECT count(*) FROM categories WHERE id=?";
    return pdo_query_value($sql, $id) > 0;

 }
