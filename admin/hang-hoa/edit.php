<!-- <!DOCTYPE html>
<html>
    <body>
        <h3>QUẢN LÝ HÀNG HÓA</h3>
        <?php
            if(strlen($MESSAGE)){
                echo "<h5>$MESSAGE</h5>";
            }
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <div>
                    <label>MÃ HÀNG HÓA</label>
                    <input name="id" readonly value="<?=$id?>">
                </div>
                <div>
                    <label>TÊN HÀNG HÓA</label>
                    <input name="name" value="<?=$name?>">
                </div>
                <div>
                    <label>ĐƠN GIÁ</label>
                    <input name="price" value="<?=$price?>">
                </div>
            </div>
            <div>
                <div>
                    <label>DESCRIPTION</label>
                    <input name="description" value="<?=$description?>">
                </div>
                <div>
                    <label>GIẢM GIÁ</label>
                    <input name="sale" value="<?=$sale?>">
                </div>
                <div>
                    <label>HÌNH ẢNH</label>
                    <input name="up_hinh" type="file">
                    <input name="image" type="hidden" value="<?=$image?>"> (<?=$image?>)
                </div>
                <div>
                    <label>LOẠI HÀNG</label>
                    <select name="cate_id">
                        <?php
                            foreach ($loai_select_list as $loai) {
                                if($loai['cate_id'] == $id){
                                    echo '<option selected value="'.$loai['cate_id'].'">'.$loai['name'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$loai['id'].'">'.$loai['name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <div>
                    <label>HÀNG ĐẶC BIỆT?</label>
                    <div>
                        <label><input name="status" value="0" type="radio" <?=$status?'':'checked'?>>Đặc biệt</label>
                        <label><input name="status" value="1" type="radio"<?=$status?'checked':''?>>Bình thường</label>
                    </div>
                </div>
                <div>
                    <label>NGÀY NHẬP</label>
                    <input name="created_at" value="<?=$created_at?>">
                </div>
                <div>
                    <label>NGÀY UPDATE</label>
                    <input name="updated_at" value="<?=$updated_at?>">
                </div>
                <div>
                    <label>SỐ LƯỢC XEM</label>
                    <input name="view" readonly value="0" value="<?=$view?>">
                </div>
            </div>
            <div>
                <div>
                    <label>MÔ TẢ</label>
                    <textarea name="detail" rows="4"><?=$detail?></textarea>
                </div>
                <div>
                    <button name="btn_update">Cập nhật</button>
                    <button type="reset">Nhập lại</button>
                    <a href="index.php">Thêm mới</a>
                    <a href="index.php?btn_list">Danh sách</a>
                </div>
            </div>
        </form>
    </body>
</html> -->


<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">QUẢN LÝ LOẠI HÀNG</h3>
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
                                <div>
                                    <!-- <label>MÃ HÀNG HÓA</label> -->
                                    <input type="hidden" name="id" class="form-control" readonly value="<?=$id?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên hàng hóa</label>
                                    <input type="text" class="form-control" name="name" value="<?=$name?>" id=""
                                        placeholder="Enter name">
                                    <p style="color:red;"><?php echo $err['name'] ?? ''; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên loại</label>
                                    <select name="cate_id" class="form-control">
                                        <?php
                                                foreach ($loai_select_list as $loai) {
                                                    if($loai['id'] == $id){
                                                        echo '<option selected value="'.$loai['id'].'">'.$loai['cate_name'].'</option>';
                                                    }
                                                    else{
                                                        echo '<option value="'.$loai['id'].'">'.$loai['cate_name'].'</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Đơn giá</label>
                                    <input type="number" class="form-control" name="price" value="<?=$price?>" id=""
                                        placeholder="Enter name">
                                    <p style="color:red;"><?php echo $err['price'] ?? ''; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Hình Ảnh</label>
                                    <input name="up_hinh" type="file">
                                    <!-- <p style="color:red;"><?php echo $err['image'] ?? ''; ?></p> -->
                                </div>
                                <div class="image-preview">
                                    <img src="../../content/images/products/<?=$image?>" name="image" class="" alt=""
                                        width="100px;">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sale</label>
                                    <input type="number" class="form-control" name="sale" value="<?=$sale?>" id=""
                                        placeholder="Enter name">
                                    <p style="color:red;"><?php echo $err['sale'] ?? ''; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <input name="status" value="1" type="radio" <?=$status?'':'checked'?> > Đặc biệt
                                        <input name="status" value="0" type="radio" <?=$status?'checked':''?> >Bình thường
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" value="<?=$description?>" id=""
                                placeholder="Enter name">
                            <p style="color:red;"><?php echo $err['description'] ?? ''; ?></p>
                        </div>

                        <div class="form-group">
                            <label for="">Detail</label>
                            <textarea class="form-control" name="detail" id="" cols="10" rows="5"
                                placeholder="Enter description">
                                <?=$detail?>
                                <?php echo $err['updated_at'] ?? ''; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-info" name="btn_update">Cập nhật</button>
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