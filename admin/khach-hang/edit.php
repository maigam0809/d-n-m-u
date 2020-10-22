<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Trang sửa users</h3>
                </div>
                <div class="card-body">
                    <?php
                    if (strlen($MESSAGE)) {
                        echo "<h5>$MESSAGE</h5>";
                       
                    }
                    ?>
                    <form action="index.php" method="post" class="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-4">
                                <div class="form-group">
                                    <input type="" class="form-control" name="id" value="<?=$id?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Tên username</label>
                                    <input type="text" class="form-control" name="username" value="<?=$username?>" id=""
                                        placeholder="Enter name">
                                    <p style="color:red;"><?php echo $err['username'] ?? ''; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?=$email?>" id=""
                                        placeholder="Enter email">
                                    <p style="color:red;"><?php echo $err['email'] ?? ''; ?></p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Vai trò ?</label>
                                    <div>
                                        <input class="p-3 mr-1" name="role" value="0" type="radio">Khách hàng
                                        <input class="p-3 mr-1" name="role" value="1" type="radio" checked> Nhân viên
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input type="text" class="form-control" name="fullname" value="<?=$fullname?>" id=""
                                        placeholder="Enter fullname">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input class="form-control" name="phone" value="<?=$phone?>" id=""
                                        placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input class="form-control" name="address" value="<?=$address?>" id=""
                                        placeholder="Enter address">
                                </div>

                                <div class="form-group">
                                    <label for="">Hình Ảnh</label>
                                    <input name="image" type="hidden" value="<?=$image?>">
                                    <input name="up_hinh" type="file"> (<?=$image?>)
                                    <p style="color:red;"><?php echo $err['image'] ?? ''; ?></p>
                                </div>
                                <div class="image-preview">
                                    <img src="../../content/images/users/<?=$image?>" name="image" class="" alt=""
                                        width="100px;">
                                </div>

                                <div class="form-group">
                                    <label for="">Giới tính ?</label>
                                    <!-- <input class="p-3 mr-1" <?=!$gender?'checked':''?> name="gender" value="0" type="radio">Nam
                                            <input  class="p-3 mr-1" <?=!$gender?'checked':''?> name="gender" value="1" type="radio">Nữ -->
                                    <input class="p-3 mr-1" name="gender" value="0" type="radio">Nam
                                    <input class="p-3 mr-1" name="gender" value="1" type="radio" checked>Nữ
                                </div>

                                <div class="form-group">
                                    <label for="">Kích hoạt ?</label>
                                    <div>
                                        <input class="p-3 mr-1" name="activated" value="0" type="radio">Kích hoạt
                                        <input class="p-3 mr-1" name="activated" value="1" type="radio" checked>Chưa
                                        kích hoạt
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Date of birth</label>
                                    <input class="form-control" type="date" name="date_of_birth"
                                        value="<?=$date_of_birth?>" id="" placeholder="Enter address">
                                    <p style="color: red;"><?php echo $err['date_of_birth'] ?? ''; ?></p>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info" name="btn_update">Cập nhật</button>
                            <button class="btn btn-outline-secondary ml-1" type="reset">Nhập lại</button>
                            <a class="btn btn-primary ml-1" href="index.php?btn_list">Danh sách</a>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>