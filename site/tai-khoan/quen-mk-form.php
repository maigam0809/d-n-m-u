<?php
if(strlen($MESSAGE)){
echo "<h5>$MESSAGE</h5>";
}
?>
<div class="card-body col-8">
    <h3 class="text-danger">QUÊN MẬT KHẨU</h3>
    <form action="quen-mk.php" method="post">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input name="id" class="form-control" id="" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ email</label>
            <input type="email" name="email" class="form-control" id="" placeholder="Nhập email">
        </div>
        <button class="btn btn-outline-success" name="btn_forgot">Tìm lại mật khẩu</button>
    </div>
</div>
