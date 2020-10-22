<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết sản phẩm</h3>
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

                                    <input type="hidden" name="id" class="form-control" readonly value="<?=$id?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm: </label> <?=$name?>
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
                                    <label class="mr-4" for="">Đơn giá: </label><?=$price?>
                                </div>

                                <label for="">Hình ảnh</label>
                                <div class="image-preview">
                                    <img src="../../content/images/products/<?=$image?>" name="image" class="" alt=""
                                        width="200px;">
                                </div>
                                <div class="form-group">
                                    <label for="" class="mr-4">Sale</label> <?=$sale?>
                                    <p style="color:red;"><?php echo $err['sale'] ?? ''; ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <input class="p-3 mr-1" name="status" value="0" type="radio">Đặc biệt
                                        <input class="p-3 mr-1" name="status" value="1" type="radio" checked>Bình thường
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="" class="mr-4">Description:</label><?=$description?>
                            </div>

                            <div class="form-group">
                                <label for="" class="mr-4">Detail: </label><?=$detail?>

                            </div>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary ml-1" href="index.php?btn_list">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>