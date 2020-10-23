<?php
    if(strlen($MESSAGE)){
        echo "<h5>$MESSAGE</h5>";
        // var_dump($MESSAGE);
    }
    ?>
<div class="card-body col-8">
    <h3 class="text-danger">ĐỔI MẬT KHẨU</h3>
    <form action="doi-mk.php" method="post">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input name="username" class="form-control" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu cũ</label>
            <input type="password" name="password" class="form-control" id="" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="mat_khau2"  class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Xác nhận mật khẩu mới</label>
            <input type="password" name="mat_khau3" class="form-control" id="" placeholder="">
        </div>
        <div>
        <button class="btn btn-outline-success" name="btn_change">Đổi mật khẩu</button>
    </div>
</div>
