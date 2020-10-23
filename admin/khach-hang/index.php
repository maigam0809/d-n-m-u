<?php
require "../../global.php";
require "../../dao/khach-hang.php";
//--------------------------------//

check_login();

extract($_REQUEST);

$err = [
    'username' => '',
    'password' => '',
    'email' => '',
    'image' => '',
    'phone' => '',
    'fullname' => '',
    'date_of_birth' => ''
];

if (exist_param("btn_insert")) {
    try {

        $pattern['fullname'] = "/^([a-zA-Z ]{3,})$/i";
        $pattern['username'] = "/^[a-z0-9_]{3,30}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['phone'] = "/^[0-9]{10,11}$/i";

          // đầu số đt
          $b=substr($phone, 1, 2);
          $e=["32","33","34","35","36","37","38","39","56","58","59","70",
          "76","77","78","79","81","82","83","84","85","86","88","89","90",
          "91","92","93","94","96","97","98","99"];

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
        }elseif (preg_match($pattern['fullname'],$fullname) == 0) {
            $err['fullname'] ="Tên là tiếng việt không dấu , không chứa số và không chứa kí tự đặc biệt";
        }

        // var_dump($email);
        $sql = "SELECT id,email FROM users where email like '$email'";
        $item_list = pdo_query($sql);
        if(count($item_list) > 0){
            $err['email'] = "Tài khoản này đã tồn tại.(Email đã đăng ký)";
        }

    

        // var_dump($phone);
        $sql = "SELECT id,phone FROM users where phone like '$phone'";
        $item_phone = pdo_query($sql);
        if(count($item_phone) > 0){
            $err['phone'] = "Số điện thoại này đã tồn tại.Mời nhập số điện thoại khác.";
        }
        
        
        // password_hash ($password);

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
        }

        
        if (trim($email) == '') {
            $err['email'] = "Bạn chưa nhập email .Hãy nhập email vào nhá.";
        }elseif(preg_match($pattern['email'], $email) == 0){
            $err['email'] ="Địa chỉ email này  không hợp lệ .Bạn phải nhập có địa chỉ gmail.com";
        }
        if(trim($date_of_birth) == ''){
            $err['date_of_birth'] = "Bạn chưa nhập ngày sinh nhật của mình";

        }

      
        if ($_FILES['image']['size'] > 0) {
            if (
                $_FILES['image']['type'] == 'image/png' ||
                $_FILES['image']['type'] == 'image/jpg' ||
                $_FILES['image']['type'] == 'image/jpeg'

            ) {
                if ($_FILES['image']['size'] <= 2 * 1024 * 1024) {
                    $up_hinh = save_file("image", "$IMAGE_DIR/users/");
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
        }elseif(preg_match($pattern['phone'], $phone) == 0){
            $err['phone'] ="Số điện thoại k hợp lệ .";
        }

        // validate url


        if (!array_filter($err)) {
            // Câu lệnh sql insert into
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
                'date_of_birth' => $date_of_birth,
                
            ];
            
            khach_hang_insert2($data);
            $MESSAGE = "Thêm mới thành công!";
            $VIEW_NAME = "index.php";
            $items = khach_hang_select_all();
            $VIEW_NAME = "khach-hang/list.php";

        }
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!" . $exc->getMessage();
        $item = khach_hang_select_by_id($id);
        extract($item);
        echo $MESSAGE;
    }
    $VIEW_NAME = "khach-hang/new.php";

} else if (exist_param("btn_update")) {

    
    try {

        $pattern['fullname'] = "/^([a-zA-Z ]{3,})$/i";
        $pattern['username'] = "/^[a-z0-9_]{3,30}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['phone'] = "/^[0-9]{10,11}$/i";

          // đầu số đt
          $b=substr($phone, 1, 2);
          $e=["32","33","34","35","36","37","38","39","56","58","59","70",
          "76","77","78","79","81","82","83","84","85","86","88","89","90",
          "91","92","93","94","96","97","98","99"];

        // Kiểm tra xem các giá trị mà ta nhập vào có  hay không nhé
        if (trim($username) == '') {
            $err['username'] = "Bạn không được để trống giá trị của username";
        }elseif(preg_match($pattern['username'],$username) == 0){
            $err['username']= "Tên đăng nhập chỉ bao gồm các ký tự a-z A-Z 0-9 và gạch dưới
            , tối thiểu 5 ký tự, tối đa 30 ký tự";
        } 


        if (trim($fullname) == '') {
            $err['fullname'] = "Bạn không được để trống giá trị của của fullname";
        }
        //elseif (preg_match($pattern['fullname'],$fullname) == 0) {
        //    $err['fullname'] ="Tên là tiếng việt không dấu , không chứa số và không chứa kí tự đặc biệt";
        //}
        
        // check password
      
        // if (trim($password) == '') {
        //     $err['password'] = "Bạn chưa nhập password.";
        // }
        // elseif (strlen($password) <= '6') {
        //     $err['password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
        // }
        // elseif(!preg_match("#[0-9]+#",$password)) {
        //     $err['password'] = "Mật khẩu phải chứa ít nhất một số !";
        // }
        // elseif(!preg_match("#[A-Z]+#",$password)) {
        //     $err['password'] = "Mật khẩu phải chứa ít nhất một chữ hoa";
        // }
        // elseif(!preg_match("#[a-z]+#",$password)) {
        //     $err['password'] = "Mật khẩu phải chưa ít nhất một chữ thường!";
        // }

        
        if (trim($email) == '') {
            $err['email'] = "Bạn chưa nhập email .Hãy nhập email vào nhá.";
        }elseif(preg_match($pattern['email'], $email) == 0){
            $err['phone'] ="Địa chỉ email không hợp abclệ .Bạn phải nhập có địa chỉ gmail.com";
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


        // validate number phone
        if (trim($phone) == '') {
            $err['phone'] = "Bạn không được để trống phone";
        }elseif(!preg_match($pattern['phone'], $phone) == 0){
            $err['phone'] ="Số điện thoại k hợp lệ .";
        }

        if (trim($date_of_birth) == '') {
            $err['date_of_birth'] = "Bạn không được để trống ngày sinh nhật";
        }


        // dd($err);
        // thấy lỗi chưa thấy rồi
       
        // var_dump($_REQUEST);
        // die;

        if(!array_filter($err)){
             $data = [
                'id' =>  $id,
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
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


            // dd($data);

            
            khach_hang_update2($data);
            $MESSAGE = "Cật nhật thành công!";
            $VIEW_NAME = "index.php";
            $items = khach_hang_select_all();
            $VIEW_NAME = "khach-hang/list.php";
        // }
        }
        else{
            $item = khach_hang_select_by_id($id);
            extract($item);
            $VIEW_NAME = "khach-hang/edit.php";
            
        }
       

    } catch (Exception $exc) {
        // echo $exc->getMessage();
        $MESSAGE = "Cập nhật thất bại!";
        $item = khach_hang_select_by_id($id);
        extract($item);
        // $VIEW_NAME = "khach-hang/edit.php";
    }
    
} else if (exist_param("btn_delete")) {
    try {
        $sql = "SELECT id FROM users";
        $a = pdo_query($sql);
        // var_dump($a);
        $b= [];
        for($i = 0; $i < count($a) ; $i++){
            $b[] = $a[$i]['id'];

        }
        if(in_array($_REQUEST['id'], $b)){
            khach_hang_delete($id);
            $items = khach_hang_select_page();
            $MESSAGE = "Xóa thành công!";
            $VIEW_NAME = "khach-hang/list.php";
    
        }else{
            $VIEW_NAME = "khach-hang/err404.php";
    
        }
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!" . $exc->getMessage();
    }
   
} else if (exist_param("btn_edit")) {
   // check url cho users
    $sql = "SELECT id FROM users";
    $a = pdo_query($sql);
    // var_dump($a);
    $b= [];
    for($i = 0; $i < count($a) ; $i++){
        $b[] = $a[$i]['id'];

    }

    if(in_array($_REQUEST['id'], $b)){
        $item = khach_hang_select_by_id($id);
        extract($item);
        $VIEW_NAME = "khach-hang/edit.php";

    }else{
        $VIEW_NAME = "khach-hang/err404.php";

    }

} else if (exist_param("btn_new")) {

    $VIEW_NAME = "khach-hang/new.php";

} elseif(exist_param("btn_detail")){
    $item = khach_hang_select_by_id($id);
    extract($item);
    $VIEW_NAME = "khach-hang/detail.php";
    
}else {

    $items = khach_hang_select_page();
    $VIEW_NAME = "khach-hang/list.php";
}

require "../layout.php";

function dd($a) {
    var_dump($a);
    die;
}