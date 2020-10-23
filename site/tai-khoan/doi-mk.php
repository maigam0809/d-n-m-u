<?php
require '../../global.php';
require '../../dao/khach-hang.php';

check_login();

extract($_REQUEST);

if(exist_param("btn_change")){
    if($mat_khau2 != $mat_khau3){
        $MESSAGE = "Xác nhận mật khẩu mới không đúng!";
    }
    else{
        $user = khach_hang_by_username($username);
        if($user){
            if($user['password'] == $password){
                try {
                    khach_hang_change_password($username, $mat_khau2);
                    $MESSAGE = "Đổi mật khẩu thành công!";
                } 
                catch (Exception $exc) {
                    $MESSAGE = "Đổi mật khẩu thất bại !";
                }
            }
            else{
                $MESSAGE = "Sai mật khẩu!";
            }
        }
        else{
            $MESSAGE = "Sai mã đăng nhập!";
        }        
    }
}


$VIEW_NAME="tai-khoan/doi-mk-form.php";
require '../layout.php';
