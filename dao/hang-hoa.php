<?php
Require_once 'pdo.php';

function hang_hoa_insert2($arr){

    $created_at =  date('yyyy-mm-dd h:m:s');
    $updated_at =  date('yyyy-mm-dd h:m:s');
    // e tu them vao nhe oke anh
    $sql = "INSERT INTO products(name, description, image, cate_id, detail, price, sale, status) 
    VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $arr['name'], $arr['description'], $arr['image'], $arr['cate_id'], $arr['detail'], $arr['price'], $arr['sale'], $arr['status'] == 1);

}


// viết lại hang_hoa_update 
function hang_hoa_update2($arr){
    // check image luôn ở đây thì đỡ hơn
    if(isset($arr['image'])) {
        $sql = "UPDATE products SET name=?, description=?, image=?, cate_id=?, detail=?, price=?, sale=?, status=?WHERE id=?";
        pdo_execute($sql, $arr['name'], $arr['description'], $arr['image'], $arr['cate_id'], $arr['detail'], $arr['price'], $arr['sale'], $arr['status'], $arr['id']);
    } else {
        $sql = "UPDATE products SET name=?, description=?, cate_id=?, detail=?, price=?, sale=?, status=?
        WHERE id=?";
        pdo_execute($sql, $arr['name'], $arr['description'], $arr['cate_id'], $arr['detail'], $arr['price'], $arr['sale'], $arr['status'], $arr['id']);
    }
}


// xóa bảng products
function hang_hoa_delete($id){
    $sql = "DELETE FROM products WHERE  id=?";
    if(is_array($id)){
        foreach ($id as $pro) {
            pdo_execute($sql, $pro);
        }
    }
    else{
        pdo_execute($sql, $id);
    }

}

// lấy tất cả dữ liệu trong bảng products
function hang_hoa_select_all(){
    $sql = "SELECT * from categories 
    inner join products 
    on categories.id = products.cate_id 
    where products.id 
    order by products.id asc;";
    return pdo_query($sql);

}

// Lấy sản phẩm theo id sản phẩm
function hang_hoa_select_by_id($id){
    $sql = "SELECT * FROM products WHERE id=?";
    return pdo_query_one($sql, $id);


}

// Đếm số lượng sản phẩm
function hang_hoa_exist($id){
    $sql = "SELECT count(*) FROM products WHERE id=?";
    return pdo_query_value($sql, $id) > 0;

}

// Đếm số lượt view sản phẩm theo id
function hang_hoa_tang_so_luot_xem($id){
    $sql = "UPDATE products SET view = view + 1 WHERE id=?";
    pdo_execute($sql, $id);


}

// Hiển thị top 10 hàng hóa có số lượt view nhiều nhất
function hang_hoa_select_top10(){
    $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC LIMIT 0, 12";
    return pdo_query($sql);


}
 
// lấy sản phẩm có đặc biệt hay không 
function hang_hoa_select_dac_biet(){
    $sql = "SELECT * FROM products WHERE status = 1";
    return pdo_query($sql);


}

// Lấy hàng hóa thep mã loại từ bảng products
function hang_hoa_select_by_loai($cate_id){
    $sql = "SELECT products.id, products.price, products.cate_id,products.name, 
    products.description, products.image, products.detail, products.sale, products.status, 
    products.view, products.created_at, products.updated_at , 
    comments.user_id,comments.content,comments.created_at 'ngay_nhap'
    FROM products 
        inner join comments 
        on products.id = comments.product_id 
        WHERE products.cate_id= ?";
    return pdo_query($sql, $cate_id);

}

// Lấy giá trị theo tên sản phẩm 
function hang_hoa_select_keyword($keyword){
        $sql = "SELECT P.id, P.name, P.description, P.cate_id, P.detail, P.price,P.image,P.detail 
        FROM products P "
        . "INNER JOIN categories C ON P.cate_id = C.id "
        . " WHERE P.name LIKE ? or C.cate_name LIKE ? order by P.price desc";
       
        $result =  pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
        return $result;
}

function hang_hoa_select_page(){
    // số bản ghi trên một trang
    $row_per_page = 5; 

    $current_page = exist_param("page") ? $_REQUEST['page'] : 1;
    // Đếm sô lượng bản ghi có trên 
    $total_row = pdo_query_value("SELECT count(*) FROM products"); 
    // var_dump($total_row);
    // die;
    // tính ra số lượng của trang là bao nhiêu
    $total_page = ceil($total_row / $row_per_page);
    if($current_page < 1)
        $current_page = 1;
    
    if($current_page > $total_page)
        $current_page = $total_page;
    

    $start = ($current_page - 1)*$row_per_page;
    $sql = "SELECT categories.cate_name , products . *
    FROM products inner join categories 
    on products.cate_id = categories.id 
    order by products.id limit {$start}, {$row_per_page}";
   
    
    // cho các thiết lập vào session để ở view có thể dùng
    $_SESSION['total_page'] = $total_page;//trang thứ nhất có thể dùng
    $_SESSION['prev_page'] = ($current_page > 1) ? ($current_page - 1):1;
    $_SESSION['next_page'] = ($current_page < $total_page) ? ($current_page + 1) : $total_page;
    // die;
    return pdo_query($sql);

}