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
                    <form action="index.php" method="post" class="m-0">
                        <!-- <a class="btn btn-info float-right mb-3" href="index.php">Nhập thêm</a> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col"></th> -->
                                    <th scope="col">Hàng hóa</th>
                                    <th scope="col">Số bình luận</th>
                                    <th scope="col">Mới nhất</th>
                                    <th scope="col">Cũ nhất</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($items as $item){
                                        extract($item);
                                ?>
                                <tr>
                                    <td><?=$name?></td>
                                    <td><?=$so_luong?></td>
                                    <td><?=$cu_nhat?></td>
                                    <td><?=$moi_nhat?></td>
                                    <td>
                                        <a href="../binh-luan/index.php?product_id=<?=$id?>">Chi tiết</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                          
                        </table>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?=$ASSET_URL?>/js/xshop-list.js"></script>

        <!-- <h3>TỔNG HỢP BÌNH LUẬN</h3>
        <form action="index.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>HÀNG HÓA</th>
                        <th>SỐ BL</th>
                        <th>MỚI NHẤT</th>
                        <th>CŨ NHẤT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($items as $item){
                        extract($item);
                ?>
                    <tr>
                        <td><?=$name?></td>
                        <td><?=$so_luong?></td>
                        <td><?=$cu_nhat?></td>
                        <td><?=$moi_nhat?></td>
                        <td>
                            <a href="../binh-luan/index.php?product_id=<?=$id?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </form> -->
