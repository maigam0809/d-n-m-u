<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);

$VIEW_NAME="tai-khoan/quen-mk-form.php";

if(exist_param("btn_forgot")){
    $user = khach_hang_by_username($username);
    if($user){
        if($user['email'] != $email){
            $MESSAGE = "Sai địa chỉ email!";
        }
        else{
            $MESSAGE = "Mật khẩu của bạn là: " . $user['password'];
            $VIEW_NAME="tai-khoan/dang-nhap-form.php";
            global $username, $password;
        }
    }
    else{
        $MESSAGE = "Sai tên đăng nhập!";
    }
}

require '../layout.php';
