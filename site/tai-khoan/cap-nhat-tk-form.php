<div class="mt-3">

    <h3>CẬP NHẬT TÀI KHOẢN</h3>
    <?php
    if(strlen($MESSAGE)){
        echo "<h5>$MESSAGE</h5>";
        
    }
?>


    <form action="cap-nhat-tk.php" method="post" class="mt-3" enctype="multipart/form-data">
        <div class="mt-3">
            <div class="col-4">
                <img src="<?=$CONTENT_URL?>/images/users/<?=$image?>" style="max-width: 95%">
            </div>
            <div class="col-8">
                <div class="form-group">
                    <!-- <label>Tên đăng nhập</label> -->
                    <input name="id" class="form-control" value="<?=$id?>" type="hidden">
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input name="username" class="form-control" value="<?=$username?>">
                </div>
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input name="fullname" class="form-control" value="<?=$fullname?>">
                </div>
                <div class="form-group">
                    <label>Địa chỉ email</label>
                    <input name="email" class="form-control" value="<?=$email?>">
                </div>
                <div class="form-group">
                    <label>Hình</label>
                    <input name="up_hinh" class="form-control" type="file">
                </div>
                <div>
                    <button class="btn btn-primary" name="btn_update">Cập nhật</button>
                </div>
                <!--Giá trị mặc định-->
                <input name="role" value="<?=$role?>" type="hidden">
                <input name="activated" value="<?=$activated?>" type="hidden">
                <input name="password" value="<?=$password?>" type="hidden">
                <input name="image" value="<?=$image?>" type="hidden">
                <input name="date_of_birth" value="<?=$image?>" type="hidden">
            </div>
        </div>
    </form>

</div>