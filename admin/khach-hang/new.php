<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                        <h3 class="card-title">Trang thêm khách hàng</h3>
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
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $_POST['id'] ?? ''; ?>" id="" placeholder="Enter name">
                                    </div>
                              
                                    <div class="form-group">
                                        <label for="">Tên username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $_POST['username'] ?? ''; ?>" id="" placeholder="Enter name">
                                        <p style="color:red;"><?php echo $err['username'] ?? ''; ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" id="" placeholder="Enter email">
                                        <p style="color:red;"><?php echo $err['email'] ?? ''; ?></p>
                                    </div>
                                    <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $_POST['password'] ?? ''; ?>" id="" placeholder="Enter password">
                                            <p style="color:red;"><?php echo $err['password'] ?? ''; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Xác nhận mật khẩu ?</label>
                                        <input type="password" class="form-control" name="password2" value="<?php echo $_POST['password'] ?? ''; ?>" id="" placeholder="Enter password">
                                        <p style="color:red;"><?php echo $err['password'] ?? ''; ?></p>
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
                                            <input type="text" class="form-control" name="fullname" value="<?php echo $_POST['fullname'] ?? ''; ?>" id="" placeholder="Enter fullname">
                                            <p style="color:red;"><?php echo $err['fullname'] ?? ''; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" name="phone" value="<?php echo $_POST['phone'] ?? ''; ?>" id="" placeholder="Enter phone">
                                            <p style="color: red;"><?php echo $err['phone'] ?? ''; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $_POST['address'] ?? ''; ?>" id="" placeholder="Enter address">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Hình Ảnh</label>
                                            <input type="file" class="form-control" name="image" id="" placeholder="Enter name">
                                            <p style="color: red;"><?php echo $err['image'] ?? ''; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới tính ?</label>
                                            <input class="p-3 mr-1" name="gender" value="0" type="radio">Nam
                                            <input class="p-3 mr-1" name="gender" value="1" type="radio" checked>Nữ
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Kích hoạt ?</label>
                                            <div>
                                                <input class="p-3 mr-1" name="activated" value="0" type="radio">Kích hoạt
                                                <input class="p-3 mr-1" name="activated" value="1" type="radio" checked>Chưa kích hoạt
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date of birth</label>
                                            <div>
                                                <input class="p-3 mr-1" name="date_of_birth" value="<?php echo $_POST['date_of_birth'] ?? ''; ?>" type="date">
                                                <p style="color: red;"><?php echo $err['date_of_birth'] ?? ''; ?></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                        
                                </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-info" name="btn_insert">Thêm mới</button>
                            <button class="btn btn-outline-secondary ml-1" type="reset">Nhập lại</button>
                            <a class="btn btn-primary ml-1" href="index.php?btn_list">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
