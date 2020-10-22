<!-- <!DOCTYPE html>
<html>
    <head>
        <script src="<?=$CONTENT_URL?>/js/xshop-list.js"></script>
    </head>
    <body>
        <h3>CHI TIẾT BÌNH LUẬN</h3>
        <?php
            if(strlen($MESSAGE)){
                echo "<h5>$MESSAGE</h5>";
            }
        ?>
        <form action="index.php?product_id=<?=$product_id?>" method="post">
            <h3>HÀNG HÓA: <?=$items[0]['name']?></h3>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>NỘI DUNG</th>
                        <th>NGÀY BL</th>
                        <th>NGƯỜI BL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($items as $item){
                            extract($item);
                    ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                            <td><?=$content?></td>
                            <td><?=$created_at?></td>
                            <td><?=$user_id?></td>
                            <td>
                                <a href="index.php?btn_delete&id=<?=$id?>&product_id=<?=$product_id?>">Xóa</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <button id="check-all" type="button" class="btn btn-danger">Chọn tất cả</button>
                            <button id="clear-all" type="button" class="btn btn-secondary">Bỏ chọn tất cả</button>
                            <button id="btn-delete" name="btn_delete" class="btn btn-danger">Xóa các mục chọn</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </body>
</html> -->


<div class="row">
    <div class=" col-md-12 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">QUẢN LÝ BÌNH LUẬN</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">

                <?php
                if (strlen($MESSAGE)) {
                    echo "<h5 >$MESSAGE</h5>";
                }
                ?>

                <div class="col-md-12 ">
                    <form  action="index.php?product_id=<?=$product_id?>" method="post">
                        <!-- <a class="btn btn-info float-right mb-3" href="index.php">Nhập thêm</a> -->
                        <h5 class="font-weight-bold p-3">Tên sản phẩm là :<?=$name?></h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Ngày bình luận</th>
                                    <th scope="col">Người bình luận</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($items as $item){
                                        extract($item);
                                ?>
                                    <tr>
                                        <th><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                                        <td><?=$content?></td>
                                        <td><?=$created_at?></td>
                                        <td><?=$fullname?></td>
                                        <td>
                                            <!-- <a onclick="return confirm('Sản phẩm này không được xóa')" href="index.php?btn_delete&id=<?=$id?>&product_id=<?=$product_id?>">Xóa</a> -->
                                            <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                            href="index.php?btn_delete&id=<?=$id?>&product_id=<?=$product_id?>"><i class="fa fa-trash"></i></a>
                                        
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button id="check-all" type="button" class="btn btn-danger">Chọn tất cả</button>
                                        <button id="clear-all" type="button" class="btn btn-success">Bỏ chọn tất cả</button>
                                        <button id="btn-delete" name="btn_delete" class="btn btn-warning">Xóa các mục chọn</button>
                                    </td>
                                </tr>
                            </tfoot>
                          
                        </table>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?=$ASSET_URL?>/js/xshop-list.js"></script>

