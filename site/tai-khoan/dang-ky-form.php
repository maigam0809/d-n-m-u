
<h3>ĐĂNG KÝ THÀNH VIÊN</h3>
<?php
    if(strlen($MESSAGE)){
        echo "<h5>$MESSAGE</h5>";
    }
?>
<form action="dang-ky.php" method="post" class="col-6" enctype="multipart/form-data">
    <div class="form-group">
        <input name="id" class="form-control" type="hidden">
    </div>
    <div class="form-group">
    <label class="form-group">Họ và tên</label>
        <input name="username" class="form-control" value="<?php echo $_POST['username'] ?? '';?>">
        <p style="color:red;"><?php echo $err['username'] ?? ''; ?></p>
    </div>

    <div class="form-group">
        <label>Họ và tên</label>
        <input name="fullname" class="form-control"  value="<?php echo $_POST['fullname'] ?? '';?>" >
        <p style="color:red;"><?php echo $err['fullname'] ?? ''; ?></p>
    </div>

    <div class="form-group">
        <label>Địa chỉ email</label>
        <input name="email" class="form-control"  value="<?php echo $_POST['email'] ?? '';?>">
        <p style="color:red;"><?php echo $err['email'] ?? ''; ?></p>
    </div>

    <div class="form-group">
        <label>Mật khẩu</label>
        <input name="password" class="form-control" type="password"  value="<?php echo $_POST['password'] ?? '';?>">
        <p style="color:red;"><?php echo $err['password'] ?? ''; ?></p>
    </div>
    
    <div class="form-group">
        <label>Xác nhận mật khẩu</label>
        <input name="mat_khau2" class="form-control" type="password"   value="<?php echo $_POST['mat_khau2'] ?? '';?>">
        <p style="color:red;"><?php echo $err['password'] ?? ''; ?></p>
    </div>
  
    
    <div class="form-group">
        <label>Hình</label>
        <input name="up_hinh" class="form-control" type="file">
        <p style="color:red;"><?php echo $err['up_hinh'] ?? ''; ?></p>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input name="phone" class="form-control" type="number" value="<?php echo $_POST['phone'] ?? '';?>">
        <p style="color:red;"><?php echo $err['phone'] ?? ''; ?></p>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input name="address" class="form-control" type="" name="address" value="<?php echo $_POST['address'] ?? '';?>">
        <p style="color:red;"><?php echo $err['address'] ?? ''; ?></p>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <input class="p-3 mr-1" name="gender" value="0" type="radio">Nam
        <input class="p-3 mr-1" name="gender" value="1" type="radio" checked>Nữ
    </div>

    <div class="form-group">
        <label>Ngày sinh</label>
        <input class="p-3 mr-1" name="date_of_birth" class="form-control" type="date" value="<?php echo $_POST['date_of_birth'] ?? '';?>" >
    </div>

    <input name="role" value="0" type="hidden">
    <input name="activated" value="0" type="hidden">


    <div>
        <button name="btn_register" class="btn btn-primary">Đăng ký</button>
    </div>
    <!--Giá trị mặc định-->
    
</form>
