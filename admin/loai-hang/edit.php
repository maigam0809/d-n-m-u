
<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-6">
            <div class="card card-success">
                <div class="card-header">
                        <h3 class="card-title">EDIT CATEGORIES</h3>
                </div>
                <div class="card-body">
                    
                    <?php
                        if(strlen($MESSAGE)){
                            echo "<h5>$MESSAGE</h5>";
                        }
                    ?>
                    <form action="index.php" method="post">
                            <!-- <label for="">ID categories</label> -->
                        <input type="hidden" name="id" class="form-control" readonly  value="<?=$id?>">
                        <div class="form-group">
                            <label for="">Name categories</label>
                            <input type="text" class="form-control" name="cate_name" value="<?=$cate_name?>" placeholder="Enter name">
                            <p style="color: red;"><?php echo $err['cate_name'] ?? ''; ?></p>
                        </div>
                        <div>
                            <button name="btn_update" class="btn btn-outline-info">
                            Cập nhật
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary ml-1">
                                Thêm mới
                            </a>
                            <button class="btn btn-outline-secondary ml-1" type="reset">
                                Nhập lại
                            </button>
                            <a class="btn btn-primary ml-1" href="index.php?btn_list">
                                Danh sách
                            </a>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>

<script src="<?=$ASSET_URL?>/js/xshop-list.js"></script>


