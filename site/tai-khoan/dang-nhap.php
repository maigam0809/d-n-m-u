<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);

if(exist_param("btn_login")){
    // $user = khach_hang_select_by_id($id);
    $user =  khach_hang_by_username($username);
    // var_dump($user);
    // die;
    if($user){


        if($user['password'] == $password){
            $MESSAGE = "Đăng nhập thành công!";
            
            if(exist_param("ghi_nho")){
                add_cookie("id", $username, 30);
                add_cookie("password", $password, 30);
            }
            else{
                delete_cookie("username");
                delete_cookie("password");
            }
            $_SESSION["user"] = $user;
            
            if(isset($_SESSION['request_uri'])){
                header("location: " . $_SESSION['request_uri']);
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
else{
    if(exist_param("btn_logoff")){
        session_unset();
    }
    // $id = get_cookie("id");
    $username = get_cookie("username");
    $password = get_cookie("password");
}

// if(exist_param("btn_login")){

    
//     $user = khach_hang_select_by_email($username);
   
//     if($user){


//         if($user['password'] == $password){
//             $MESSAGE = "Đăng nhập thành công!";
            
//             if(exist_param("ghi_nho")){
//                 add_cookie("username", $username, 30);
//                 add_cookie("password", $password, 30);
//             }
//             else{
//                 delete_cookie("username");
//                 delete_cookie("password");
//             }
//             $_SESSION["user"] = $user;
            
//             if(isset($_SESSION['request_uri'])){
//                 header("location: " . $_SESSION['request_uri']);
//             }
//         }
//         else{
//             $MESSAGE = "Sai mật khẩu!";
//         }
//     }
//     else{
//         $MESSAGE = "Sai mã đăng nhập!";
//     }
// }
// else{
//     if(exist_param("btn_logoff")){
//         session_unset();
//     }
//     $username = get_cookie("username");
//     $password = get_cookie("password");
// }

$VIEW_NAME="tai-khoan/dang-nhap-form.php";
require '../layout.php';
