<!-- <!DOCTYPE html>
<html>
    <body>
        <h3>THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h3>
        <table>
            <thead>
                <tr>
                    <th>LOẠI HÀNG</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($items as $item){
                    extract($item);
            ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$so_luong?></td>
                    <td>$<?=number_format($gia_min,2)?></td>
                    <td>$<?=number_format($gia_max,2)?></td>
                    <td>$<?=number_format($gia_avg,2)?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <a href="index.php?chart">Xem biểu đồ</a>
    </body>
</html> -->



<div class="row">
    <div class=" col-md-12 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Thống kê</h3>
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
                  
                        <!-- <a class="btn btn-info float-right mb-3" href="index.php">Nhập thêm</a> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col"></th> -->
                                    <th scope="col">Loại hàng</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá thấp nhất</th>
                                    <!-- <th scope="col" style="width: 50px;">Password</th> -->
                                    <th scope="col">Giá cao nhất</th>
                                    <th scope="col">Giá trung bình</th>
                                    <tr>
                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($items as $item){
                                        extract($item);
                                ?>
                                    <tr>
                                        <td><?=$cate_name?></td>
                                        <td><?=$so_luong?></td>
                                        <td>$<?=number_format($gia_min,2)?></td>
                                        <td>$<?=number_format($gia_max,2)?></td>
                                        <td>$<?=number_format($gia_avg,2)?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                          
                        </table>
                        <a href="index.php?chart" class="btn btn-dark">Xem biểu đồ</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?=$ASSET_URL?>/js/xshop-list.js"></script>
