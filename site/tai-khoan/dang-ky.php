<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);
// var_dump($_REQUEST);
// die;

$err=[
    'username' => '',
    'password' => '',
    'email' => '',
    'image' => '',
    'phone' => '',
    'fullname' => '',
    'mat_khau2' => '',
    'address' => '',
    'gender' => '',
    'activated' => '',
    'role' => ''
];

if(exist_param("btn_register")){

        // Kiểm tra xem các giá trị mà ta nhập vào có  hay không nhé
    if (trim($username) == '') {
        $err['username'] = "Bạn không được để trống giá trị của username";
    }


    if (trim($fullname) == '') {
        $err['fullname'] = "Bạn không được để trống giá trị của của fullname";
    }elseif (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
        $err['fullname'] ="Chỉ được chứa chữ cái và khoảng trắng";
    }


    
    // check password
    
    if (trim($password) == '') {
        $err['password'] = "Bạn chưa nhập password.";
    }
    elseif (strlen($password) <= '6') {
        $err['password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
        
    }elseif($password != $mat_khau2){

        $MESSAGE = "Xác nhận mật khẩu không khớp !";
    }
    
    

    
    if (trim($email) == '') {
        $err['email'] = "Bạn chưa nhập email .Hãy nhập email vào nhá.";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "E-mail không hợp lệ.Hãy nhập email dạng abc.gmail.com"; 
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
    } else {
        $err['image'] = "Bạn chưa nhập ảnh nhé.";
    }


    // validate number phone
    if (trim($phone) == '') {
        $err['phone'] = "Bạn không được để trống phone";
    }elseif(! preg_match('/^[0-9]{10}+$/', $phone)){
        $err['phone'] ="Số điện thoại k hợp lệ .";
    }

    

    else{
        $file_name = save_file("up_hinh", "$IMAGE_DIR/users/");
        $image = $file_name?$file_name:"user.png";
    
        try {
        if (!array_filter($err)) {
            
            $data = [
                // 'id' => $id,
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'address' => $address,
                'gender' => $gender,
                'phone' => $phone,
                'activated' => $activated,
                'image' => $image
                
            ];
            
            khach_hang_insert2($data);
            $MESSAGE = "Đăng ký thành viên thành công !";
        }
        } 
        catch (Exception $exc) {
            $MESSAGE = "Đăng ký thành viên thất bại!";
        }
    }
}
else{
    global  $password, $username, $email, $image, $activated, $role, $mat_khau2;
}

$VIEW_NAME="tai-khoan/dang-ky-form.php";
require '../layout.php';
