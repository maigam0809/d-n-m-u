<?php
require "../../global.php";
require "../../dao/hang-hoa.php";
//--------------------------------//
require "../../dao/loai.php";

check_login();

extract($_REQUEST);
$err = [
    'name' => '',
    'image' => '',
    'detail' => '',
    'price' => '',
    'sale' => '',
    'description' => ''

];

if (exist_param("btn_insert")) {
  
    try {

        $cname=strlen($name);
        $pattern['name'] = "/^([a-zA-Z ]{3,})$/i";
     
        if (trim($name) == '') {
            $err['name'] = "Please name products.";
        } elseif (preg_match($pattern['name'], $name) == 0) {
            $errors['name'] = "Nhập tên không đúng";
        }


        // chuyển đổi không phân biệt chữ cái hoa và chữ cái thường
        $a = strtoupper($name);
        $sql = "SELECT name FROM products where name like '$name'";
        $b = pdo_query($sql);
        // var_dump($b);
        // die;
        if(count($b) > 0){
            $err['name'] = "Tên sp đã tồn tại";
        }
        

        

        if ($_FILES['image']['size'] > 0) {
           
            if (
              $_FILES['image']['type'] == 'image/png' ||
              $_FILES['image']['type'] == 'image/jpg' ||
              $_FILES['image']['type'] == 'image/jpeg'
            ) {
              if ($_FILES['image']['size'] > 0) {
                $up_hinh = save_file("image", "$IMAGE_DIR/products/");
                $image = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';
              } else {
                $err['image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
              }
            } else {
              $err['image'] = "Ảnh của bạn sai định dạng.
                <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
            }
          } else {
            $err['image'] = "Bạn chưa nhập ảnh";
        }



        if (trim($detail) == '') {
            $err['detail'] = "Chưa nhập chi tiết cho sản phẩm";
        }

        
        if (trim($description) == '') {
            $err['description'] = "Chưa nhập chi tiết cho sản phẩm";
        }

        if (trim($price) == '') {
            $err['price'] = "Bạn không được để trống giá của sản phẩm";
        } elseif ($price <= 0) {
            $err['price'] = "Giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
        }

        if (trim($sale) == '') {
            $err['sale'] = "Bạn không được để trống giảm giá";
        } elseif ($sale < 0) {
            $err['sale'] = "Giảm giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
        }

        if (!array_filter($err)) {
            $data = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'description' => $description,
                'cate_id' => $cate_id,
                'detail' => $detail,
                'price' => $price,
                'sale' => $sale,
                'status' => $status,
                
            ];

            hang_hoa_insert2($data);
            unset($data);
            $MESSAGE = "Thêm mới thành công!";
            $VIEW_NAME = "index.php";
            $items = hang_hoa_select_all();
            $VIEW_NAME = "hang-hoa/list.php";
        }

    } catch (Exception $exc) {
        echo $exc->getMessage();
        $MESSAGE = "thêm mới thất bại!";
        $item = hang_hoa_select_by_id($id);
        extract($item);
    }
    $VIEW_NAME = "hang-hoa/new.php";


} else if (exist_param("btn_update")) {
    
    try {
        if (trim($name) == '') {
            $err['name'] = "Nhập tên của sản phẩm";
        }elseif(strlen($name) < '3'){
            $err['name'] = "Tên của sản phẩm phải tối thiểu 3 kí tự";
        }

        if (trim($cate_id) == '') {
            $err['cate_id'] = "Nhập mã loại sản phẩm.";
        }

        if ($_FILES['up_hinh']['size'] > 0) {
            if (
                $_FILES['up_hinh']['type'] == 'image/png' ||
                $_FILES['up_hinh']['type'] == 'image/jpg' ||
                $_FILES['up_hinh']['type'] == 'image/jpeg'
            ) {
                if ($_FILES['up_hinh']['size'] > 0) {
                    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/products/");
                    $image = strlen($up_hinh) > 0 ? $up_hinh : null;
                } else {
                    $err['image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                }
            } else {
                $err['image'] = "Ảnh của bạn sai định dạng.
                <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
            }
        }

        if (trim($detail) == '') {
            $err['detail'] = "Chưa nhập chi tiết cho sản phẩm";
        }
        if (trim($description) == '') {
            $err['description'] = "Chưa nhập chi tiết cho sản phẩm";
        }

        if (trim($price) == '') {
            $err['price'] = "Bạn không được để trống giá của sản phẩm";
        } elseif ($price < 0) {
            $err['price'] = "Giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
        }

        if (trim($sale) == '') {
            $err['sale'] = "Bạn không được để trống giảm giá";
        } elseif ($sale < 0) {
            $err['sale'] = "Giảm giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
        }


        if (!array_filter($err)) {
            $data = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'cate_id' => $cate_id,
                'detail' => $detail,
                'price' => $price,
                'sale' => $sale,
                'status' => $status
            ];

            if (isset($image)) {
                $data['image'] = $image;
            }

            hang_hoa_update2($data);
            $MESSAGE = "Cập nhật thành công!";
            $VIEW_NAME = "index.php";
            $items = hang_hoa_select_all();
            $VIEW_NAME = "hang-hoa/list.php";


        } else {
            $item = hang_hoa_select_by_id($id);
            extract($item);
            $VIEW_NAME = "hang-hoa/edit.php";

        }

        
    } catch (Exception $exc) {
        echo $exc->getMessage();
        $MESSAGE = "Cập nhật thất bại!";
        $item = hang_hoa_select_by_id($id);
        extract($item);
    }
} else if (exist_param("btn_delete")) {
    try {
      
        $sql = "SELECT id FROM products";

        $a = pdo_query($sql);
        // var_dump($a);
        $b= [];
        for($i = 0; $i < count($a) ; $i++){
            $b[] = $a[$i]['id'];

        }
        if(in_array($_REQUEST['id'], $b)){
            hang_hoa_delete($id);
            $items = hang_hoa_select_page();
            $MESSAGE = "Xóa thành công!";
            $VIEW_NAME = "hang-hoa/list.php";
    
        }else{
            $VIEW_NAME = "hang-hoa/err404.php";
    
        }

    } catch (Exception $exc) {

        $MESSAGE = "Xóa thất bại!";

    }
    
} else if (exist_param("btn_edit")) {
    
    
    $sql = "SELECT id FROM products";
    $a = pdo_query($sql);
    // var_dump($a);
    $b= [];
    for($i = 0; $i < count($a) ; $i++){
        $b[] = $a[$i]['id'];

    }
    // var_dump($b);
    // var_dump($_REQUEST['id']);
    // die;
    
    
    if(in_array($_REQUEST['id'], $b)){
        $item = hang_hoa_select_by_id($id);
        extract($item);
        $VIEW_NAME = "hang-hoa/edit.php";

    }else{
        $VIEW_NAME = "hang-hoa/err404.php";

    }


} else if (exist_param("btn_new")) {
    $VIEW_NAME = "hang-hoa/new.php";

}elseif(exist_param("btn_detail")){
    $item = hang_hoa_select_by_id($id);
    extract($item);
    $VIEW_NAME = "hang-hoa/detail.php";

} else {

    $items = hang_hoa_select_page();
    $VIEW_NAME = "hang-hoa/list.php";
}

if ($VIEW_NAME == "hang-hoa/new.php" || $VIEW_NAME == "hang-hoa/edit.php" || $VIEW_NAME =="hang-hoa/detail.php") {
    $loai_select_list = loai_select_all();
}

require "../layout.php";
