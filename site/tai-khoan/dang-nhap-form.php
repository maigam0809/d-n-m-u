
<?php
    if(strlen($MESSAGE)){
        echo "<h5>$MESSAGE</h5>";
    }
    ?>
<div class="col-3">
    <h3 class="text-danger">ĐĂNG NHẬP</h3>
    <form action="dang-nhap.php" method="post">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input name="id" class="form-control" value="<?=$id?>" id="" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" value="<?=$password?>" class="form-control" id="" placeholder="">
        </div>
        <div class="form-check">
            <input type="checkbox"  name="ghi_nho" checked class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button class="btn btn-outline-success" name="btn_change">Đăng nhập</button>
    </div>
</div>

