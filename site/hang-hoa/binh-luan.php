    <div class=" panel panel-default container">
        <div class="col-10">
            <div class="panel-heading account mt-4">Đánh giá cho sản phẩm</div>
        </div>
        <div class="panel">
            <?php
                require '../../dao/binh-luan.php';
                
                $product_id = $id;
                if(exist_param("content")){
                    $user_id = $_SESSION['user']['id'];
                    $created_at = date_format(date_create(), 'Y-m-d');
                    binh_luan_insert($user_id, $product_id, $content,$created_at);
                }
                $binh_luan_list = binh_luan_select_by_hang_hoa($product_id);
            ?>
        </div>



        <div class="panel-footer">

            <form action="" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-8">
                            <input name="content" class="form-control" placeholder="Viết bình luận cho sản phẩm này" />
                        </div>
                        <input type="hidden" name="product_id" value="<?php $product_id?>" />
                        <div class="col-sm-2">
                            <button class="btn btn-primary " name="" style="width: 100%">Gửi</button>
                        </div>
                    </div>
                </div>
            </form>

            <?php
                if(!isset($_SESSION['user'])){
                    echo '<b class="text-danger">Đăng nhập để bình luận về sản phẩm này</b>';
                }else{
                ?>
            <div class="comments-list" style="margin-top: 20px">
                <h5 class="font-weight-bold text-success">Top 5 bình luận mới nhất</h5>
                <?php
                        foreach ($binh_luan_list as $u): ?>
                <div class="media mb-4 pl-1 col-10">

                    <a class="media-left mr-3 " href="#">
                        <img src="https://ui-avatars.com/api/?name=<?php echo $u['username'] ?>">
                    </a>
                    <div class="media-body">

                        <h6 class="media-heading user_name font-weight-bold"><?=$u['fullname']?></h6>
                        <p class="font-size-2" style="font-size: 14px;"><?=$u['content']?></p>
                    </div>

                    <p class="pull-right">
                        <small><?=$u['ngay_nhap']?></small>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php }?>
        </div>
    </div>