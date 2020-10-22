<?php
require "../../global.php";
require "../../dao/loai.php";
//--------------------------------//

// check_login();

// Lấy toàn bộ dữ liệu trong bảng categories
extract($_REQUEST);

// Kiểm tra các biến trong mảng có tồn tại hay không ?
$err = [
    'cate_name' => ''
];
  

if(exist_param("btn_insert")){

    try {

        $pattern['cate_name'] = "/([^\d]*)\s([^\d]*)/i";
     
        if (trim($cate_name) == '') {
            $err['cate_name'] = "Please enter name categories !";
        }elseif(preg_match($pattern['cate_name'], $cate_name) == 0){
            $err['cate_name'] = "Mời bạn nhập tên loại có tối thiểu hai chữ.";

        }

        // Lấy tất cả các dữ liệu có trong db
        $items2 = loai_select_all();
    
        // so sánh từng phần tử của mảng đó có khớp trong db hay không
        // nếu khớp thì báo là đã tồn tại tên loại của sản phẩm
        // còn nếu không khớp thì  update dữ liệu mới vào 
        foreach ($items2 as $item) {
            if (strtoupper($cate_name) === strtoupper($item['cate_name'])) {
                $err['cate_name'] = "Tên loại đã tồn tại";
    
            }
           
        }

        

        if (!array_filter($err)) {
            loai_insert($cate_name);
            unset($cate_name, $id);
            $VIEW_NAME = "index.php";
            $MESSAGE = "Insert into successfully";
            $items = loai_select_all();
            $VIEW_NAME = "loai-hang/list.php";
        }    
    } 
    catch (Exception $exc) {
        $item = loai_select_by_id($id);
        extract($item);
        $MESSAGE = "Insert into failed!".$exc->getMessage();
    }
    $VIEW_NAME = "loai-hang/new.php";
}
else if(exist_param("btn_update")){
    try {
        // Xét độ dài của cate name thỏa mãn trường hợp nào.
        $pattern['cate_name'] = "/([^\d]*)\s([^\d]*)/i";
        
        if (trim($cate_name) == '') {
            $err['cate_name'] = "Please name categories !";

        }elseif(preg_match($pattern['cate_name'], $cate_name) == 0){
            $err['cate_name'] = "Mời bạn nhập tên loại có tối thiểu hai chữ.";

        }

        // Lấy tất cả các dữ liệu có trong db
        $items2 = loai_select_all();
    
        // so sánh từng phần tử của mảng đó có khớp trong db hay không
        // nếu khớp thì báo là đã tồn tại 
        // còn nếu không khớp thì thêm dữ liệu vào db
      
        foreach ($items2 as $item) {
            if (strtoupper($cate_name) === strtoupper($item['cate_name'])) {
                $err['cate_name'] = "Tên loại đã tồn tại";
                
            }
           
        }

        if (!array_filter($err)) {
            loai_update($id, $cate_name);
            $MESSAGE = "Update successfully";
        }
    } 
    catch (Exception $exc) {
        $MESSAGE = "Update failed!".$exc->getMessage();
    }
    $VIEW_NAME = "loai-hang/edit.php";
}
else if(exist_param("btn_delete")){
    try {
        // loai_delete($id);
        // $items = loai_select_all();
        // $MESSAGE = "Delete successfully!";


        $sql = "SELECT id FROM categories";
        $a = pdo_query($sql);
        // var_dump($a);
        $b= [];
        for($i = 0; $i < count($a) ; $i++){
            $b[] = $a[$i]['id'];

        }
        if(in_array($_REQUEST['id'], $b)){
            loai_delete($id);
            $items = loai_select_all();
            $MESSAGE = "Delete successfully!";
            $VIEW_NAME = "loai-hang/list.php";

        }else{
            $VIEW_NAME = "loai-hang/err404.php";

        }
    } 
    catch (Exception $exc) {
        $MESSAGE = "Delete failed !".$exc->getMessage();
    }
    // $VIEW_NAME = "loai-hang/list.php";
}
else if(exist_param("btn_edit")){
   

    $sql = "SELECT id FROM categories";
        $a = pdo_query($sql);
        // var_dump($a);
        $b= [];
        for($i = 0; $i < count($a) ; $i++){
            $b[] = $a[$i]['id'];

        }
        if(in_array($_REQUEST['id'], $b)){
            $item = loai_select_by_id($id);
            extract($item);
            $VIEW_NAME = "loai-hang/edit.php";

        }else{
            $VIEW_NAME = "loai-hang/err404.php";

        }
}
else if(exist_param("btn_new")){
    $VIEW_NAME = "loai-hang/new.php";
}
else{
    $items = loai_select_all();
    $VIEW_NAME = "loai-hang/list.php";
}

require "../layout.php";