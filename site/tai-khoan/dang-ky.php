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

    $pattern['fullname'] = "/^([a-zA-Z]{3,})$/i";
    $pattern['username'] = "/^[a-z0-9_]{3,30}$/i";
    $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
    $pattern['phone'] = "/^[0-9]{10,11}$/i";

    // Kiểm tra xem các giá trị mà ta nhập vào có  hay không nhé
    // var_dump($username);
    $sql = "SELECT id,username FROM users where username like '$username'";
    $item_username = pdo_query($sql);
    if(count($item_username) > 0){
        $err['username'] = "Tên username đã tồn tại.";
    }
    if (trim($username) == '') {
        $err['username'] = "Bạn không được để trống giá trị của username";
    }elseif(preg_match($pattern['username'],$username) == 0){
        $err['username']= "Tên đăng nhập chỉ bao gồm các ký tự a-z A-Z 0-9 và gạch dưới
        , tối thiểu 5 ký tự, tối đa 30 ký tự";
    } 


    if (trim($fullname) == '') {
        $err['fullname'] = "Bạn không được để trống giá trị của của fullname";
    }
    // elseif (preg_match($pattern['fullname'],$fullname) == 0) {
    //     $err['fullname'] ="Tên là tiếng việt không dấu , không chứa số và không chứa kí tự đặc biệt";
    // }


    
    // check password
    
    if (trim($password) == '') {
        $err['password'] = "Bạn chưa nhập password.";
    }
    elseif (strlen($password) <= '6') {
        $err['password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $err['password'] = "Mật khẩu phải chứa ít nhất một số !";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $err['password'] = "Mật khẩu phải chứa ít nhất một chữ hoa";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $err['password'] = "Mật khẩu phải chưa ít nhất một chữ thường!";
    }elseif($password != $mat_khau2){

        $MESSAGE = "Xác nhận mật khẩu không khớp !";
    }
    
    
    // var_dump($email);
    $sql = "SELECT id,email FROM users where email like '$email'";
    $item_list = pdo_query($sql);
    if(count($item_list) > 0){
        $err['email'] = "Tài khoản này đã tồn tại.(Email đã đăng ký)";
    }
    
    if (trim($email) == '') {
        $err['email'] = "Bạn chưa nhập email .Hãy nhập email vào nhá.";
    }elseif(preg_match($pattern['email'], $email) == 0){
        $err['email'] ="Địa chỉ email này  không hợp lệ .Bạn phải nhập có địa chỉ gmail.com";
    }


    if(trim($date_of_birth) == ''){
        $err['date_of_birth'] = "Bạn chưa nhập ngày sinh nhật của mình";

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

    $sql = "SELECT id,phone FROM users where phone like '$phone'";
    $item_phone = pdo_query($sql);
    if(count($item_phone) > 0){
        $err['phone'] = "Số điện thoại này đã tồn tại.Mời nhập số điện thoại khác.";
    }
    
    // validate number phone
    if (trim($phone) == '') {
        $err['phone'] = "Bạn không được để trống phone";
    }elseif(preg_match($pattern['phone'], $phone) == 0){
        $err['phone'] ="Số điện thoại k hợp lệ .";
    }


    

    else{
        // $file_name = save_file("up_hinh", "$IMAGE_DIR/users/");
        // $image = $file_name?$file_name:"user.png";
    
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
                'image' => $image,
                'date_of_birth'=>$date_of_birth
                
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