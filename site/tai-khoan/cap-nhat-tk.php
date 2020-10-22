<?php
require '../../global.php';
require '../../dao/khach-hang.php';

// check_login();

extract($_REQUEST);
// var_dump($_REQUEST);
// die;

$err = [
    'username' => '',
    'password' => '',
    'email' => '',
    'image' => '',
    'phone' => '',
    'fullname' => '',
    'date_of_birth' => ''
];


if(exist_param("btn_update")){
  
    try {

        if (trim($username) == '') {
            $err['username'] = "Bạn không được để trống giá trị của username";
        }elseif(preg_match($pattern['username'],$username) == 0){
            $err['username']= "Tên đăng nhập chỉ bao gồm các ký tự a-z A-Z 0-9 và gạch dưới
            , tối thiểu 5 ký tự, tối đa 30 ký tự";
        } 


        if (trim($fullname) == '') {
            $err['fullname'] = "Bạn không được để trống giá trị của của fullname";
        }elseif (preg_match($pattern['fullname'],$fullname) == 0) {
            $err['fullname'] ="Tên là tiếng việt không dấu , không chứa số và không chứa kí tự đặc biệt";
        }

        if ($_FILES['up_hinh']['size'] > 0) {
            if (
                $_FILES['up_hinh']['type'] == 'image/png' ||
                $_FILES['up_hinh']['type'] == 'image/jpg' ||
                $_FILES['up_hinh']['type'] == 'image/jpeg'

            ) {
                if ($_FILES['up_hinh']['size'] <= 2 * 1024 * 1024) {
                    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/users/");
                    $image = strlen($up_hinh) > 0 ? $up_hinh : 'user.png';
                } else {
                    $err['image'] = "Bạn nhập đúng định dạng ảnh nhưng chưa đúng kích thước. Hãy nhập lại kích thước của ảnh nhé.";
                }
            } else {
                $err['image'] = "Bạn nhập không đúng định dạng ảnh";
            }
        }


        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'address' => $address,
            'gender' => $gender,
            'phone' => $phone,
            'activated' => $activated,
            'date_of_birth' => $date_of_birth
            
        ];
        if (isset($image)) {
            $data['image'] = $image;
        }
        if(!array_filter($err)){
            khach_hang_update2($data);
            $MESSAGE = "Cập nhật thông tin thành viên thành công!";
            $_SESSION['user'] = khach_hang_select_by_id($id);
        }
    } 
    catch (Exception $exc) {
        $MESSAGE = "Cập nhật thông tin thành viên thất bại!";
    }
}
else{
    extract($_SESSION['user']);
}

$VIEW_NAME="tai-khoan/cap-nhat-tk-form.php";

require '../layout.php';