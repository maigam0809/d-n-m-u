<?php 
session_start();
/*
 * Định nghĩa các url cần thiết được sử dụng trong website
 */
$ROOT_URL = "/duanmau/MaiThiGam_duanmau";
$ASSET_URL = "$ROOT_URL/admin/assets";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";



/*
 * Định nghĩa đường dẫn chứa ảnh sử dụng trong upload
 */
$IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/content/images";

/*
 * 2 biến toàn cục cần thiết để chia sẻ giữa controller và view
 */
$VIEW_NAME = "index.php";
$MESSAGE = '';

/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */

function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);

}

// Lưu vào upload file 
function save_file($fieldname, $target_dir){

   if(!file_exists($target_dir)){
       mkdir($target_dir, 0777,1);
   }
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;


}



function add_cookie($name, $value, $day){
    setcookie($name, $value, time() + (86400 * $day), "/");
}

// xóa cookie
function delete_cookie($name){
    add_cookie($name, '', -1);
}

// Lấy giá trị của cookie
function get_cookie($name){
    return $_COOKIE[$name]??'';
}


// Kiểm tra check_login
function check_login(){
    global $SITE_URL;
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] == 1){
            return;
        }
        if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE){
            return;
        }
    }
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
}

