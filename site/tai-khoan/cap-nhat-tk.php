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
    'fullname' => '',
];


if(exist_param("btn_update")){
  
    try {
        $pattern['fullname'] = "/^([a-zA-Z]{3,})$/i";
        $pattern['username'] = "/^[a-z0-9_]{3,30}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
    
        // Kiểm tra xem các giá trị mà ta nhập vào có  hay không nhé
        // var_dump($username);
        // $sql = "SELECT id,username FROM users where username like '$username'";
        // $item_username = pdo_query($sql);
        // if(count($item_username) > 0){
        //     $err['username'] = "Tên username đã tồn tại.";
        // }
        if (trim($username) == '') {
            $err['username'] = "Bạn không được để trống giá trị của username";
        }elseif(preg_match($pattern['username'],$username) == 0){
            $err['username']= "Tên đăng nhập chỉ bao gồm các ký tự a-z A-Z 0-9 và gạch dưới
            , tối thiểu 5 ký tự, tối đa 30 ký tự";
        } 
    
    
        if (trim($fullname) == '') {
            $err['fullname'] = "Bạn không được để trống giá trị của của fullname";
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

        // var_dump($email);
        // $sql = "SELECT id,email FROM users where email like '$email'";
        // $item_list = pdo_query($sql);
        // if(count($item_list) > 0){
        //     $err['email'] = "Tài khoản này đã tồn tại.(Email đã đăng ký)";
        // }
    
        if (trim($email) == '') {
            $err['email'] = "Bạn chưa nhập email .Hãy nhập email vào nhá.";
        }elseif(preg_match($pattern['email'], $email) == 0){
            $err['email'] ="Địa chỉ email này  không hợp lệ .Bạn phải nhập có địa chỉ gmail.com";
        }

        // var_dump($_REQUEST);
        // dd($err);

        if(!array_filter($err)){
            $data = [
                // 'fullname' => $fullname,
                // 'username' => $username,
                // 'email' => $email,
                // 'password' => $password,
                // 'address' => $address,
                // 'phone' => $phone,
                // 'gender' => $gender,
                // 'date_of_birth' => $date_of_birth,
                // 'role' => $role,
                // 'activated' => $activated,
                // 'id'=> $id

                'id' =>  $id,
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                // 'role' => $role,
                'address' => $address,
                'gender' => $gender,
                'phone' => $phone,
                'activated' => $activated,
                'date_of_birth' => $date_of_birth
                
            ];
            if (isset($image)) {
                $data['image'] = $image;
            }
            // dd($data);
            khach_hang_update2($data);
            $MESSAGE = "Cập nhật thông tin thành viên thành công!";
            $_SESSION['user'] = khach_hang_by_username($username);
        }
    } 
    catch (Exception $exc) {
        $MESSAGE = "Cập nhật thông tin thành viên thất bại!";
    }
}
else{
    extract($_SESSION['user']);
}

 function dd($a)
{
    var_dump($a);
    die;
}

$VIEW_NAME="tai-khoan/cap-nhat-tk-form.php";

require '../layout.php';