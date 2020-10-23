<?php
require_once 'pdo.php';

function khach_hang_insert2($arr)
{
    $created_at = date('yyyy-mm-dd h:m:s');
    $updated_at = date('yyyy-mm-dd h:m:s');
    $sql = "INSERT INTO users (fullname, username, email, image,password, role, address, phone, gender, activated, date_of_birth)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ? )";
    pdo_execute($sql, $arr['fullname'], $arr['username'],$arr['email'],$arr['image'],$arr['password'],$arr['role'] == 1,$arr['address'], $arr['phone'],$arr['gender'],$arr['activated'] == 1, $arr['date_of_birth'] );
    
}
function khach_hang_update2($arr)
{
    // check image luôn ở đây thì đỡ hơn
    if (isset($arr['image'])) {
        $sql = "UPDATE users  SET fullname=?, username=?, email=?,
         image=?, role=?, address=?, phone=?, gender=?, activated=?, date_of_birth=?
        WHERE id=?";
        pdo_execute($sql,
            $arr['fullname'],
            $arr['username'],
            $arr['email'],
            $arr['image'],
            $arr['role'] == 1,
            $arr['address'],
            $arr['phone'],
            $arr['gender'],
            $arr['activated'] == 1,
            $arr['date_of_birth'],
            $arr['id']
        );

    } else {
        $sql = "UPDATE users  SET fullname=?, username=?, email=?, role=?, address=?, phone=?, gender=?, activated=?,date_of_birth=?
        WHERE id=?";
        pdo_execute($sql,
            $arr['fullname'],
            $arr['username'],
            $arr['email'],
            $arr['role'] == 1,
            $arr['address'],
            $arr['phone'],
            $arr['gender'],
            $arr['activated'] == 1,
            $arr['date_of_birth'],
            $arr['id']
        );

        // cái này nó có cần theo thức tự k nhể
        ///./ e cũng k nhớ . cái id nó lại trước cai dateofbird
    }
}

function khach_hang_delete($id)
{
    $sql = "DELETE FROM users  WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }

}

function khach_hang_select_all()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);

}

function khach_hang_select_by_id($id)
{
    $sql = "SELECT * FROM users WHERE id=?";
    return pdo_query_one($sql, $id);

}

function khach_hang_by_username($username){
    $sql = "SELECT * FROM users WHERE username=?";
    return pdo_query_one($sql, $username);
}


function khach_hang_exist($id)
{
    $sql = "SELECT count(*) FROM users WHERE $id=?";
    return pdo_query_value($sql, $id) > 0;

}

function khach_hang_select_by_role($role)
{
    $sql = "SELECT * FROM users WHERE role=?";
    return pdo_query($sql, $role);

}

function khach_hang_change_password($username, $mat_khau2)
{
    $sql = "UPDATE users SET password=? WHERE username=?";
    pdo_execute($sql, $mat_khau2, $username);

}

function khach_hang_select_page()
{
    // số bản ghi trên một trang
    $row_per_page = 4;

    $current_page = exist_param("page") ? $_REQUEST['page'] : 1;
    // Đếm sô lượng bản ghi có trên
    $total_row = pdo_query_value("SELECT count(*) FROM users");
    // var_dump($total_row);
    // die;
    // tính ra số lượng của trang là bao nhiêu
    $total_page = ceil($total_row / $row_per_page);
    if ($current_page < 1) {
        $current_page = 1;
    }

    if ($current_page > $total_page) {
        $current_page = $total_page;
    }

    $start = ($current_page - 1) * $row_per_page;
    $sql = "SELECT *
    FROM users
    order by id limit {$start}, {$row_per_page}";

    // cho các thiết lập vào session để ở view có thể dùng
    $_SESSION['total_page'] = $total_page; //trang thứ nhất có thể dùng
    $_SESSION['prev_page'] = ($current_page > 1) ? ($current_page - 1) : 1;

    $_SESSION['next_page'] = ($current_page < $total_page) ? ($current_page + 1) : $total_page;
    // die;
    return pdo_query($sql);

}




