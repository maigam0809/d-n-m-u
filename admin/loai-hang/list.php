
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
                            echo "<h5 >$MESSAGE</h5>";
                        }
                        ?>
                    <a class="btn btn-success float-right mb-3" href="index.php?btn_new">
                   <i class="fa fa-plus">  Create Categories  </i>
                    </a>
                    <form action="index.php" method="post" class="m-0">

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($items as $item) {
                                extract($item);
                            ?>
                            <tbody>
                                <tr>
                                <th scope="row"><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                                <th scope="row"><?=$id?></th>
                                <td><?=$cate_name?></td>
                                <td>
                                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" href="index.php?btn_edit&id=<?=$id?>" >
                                    <!-- Sửa -->
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="index.php?btn_delete&id=<?=$id?>" >
                                    <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </tr>
                            </tbody>
                            <?php
}
?>
 <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <button class="btn btn-outline-secondary" id="check-all" type="button">Chọn tất cả</button>
                                        <button class="btn btn-outline-warning" id="clear-all" type="button">Bỏ chọn tất cả</button>
                                        <button class="btn btn-outline-info" onclick="return confirm('Bạn có chắc chắn xóa không ?')" id="btn-delete" name="btn_delete" >Xóa các mục chọn</button>
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

<!-- <div class="container">

    <h3>QUẢN LÝ LOẠI HÀNG</h3>
    <?php
if (strlen($MESSAGE)) {
    echo "<h5 >$MESSAGE</h5>";
}
?>
    <form action="index.php" method="post">
        <table boder="1">
            <thead>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
foreach ($items as $item) {
    extract($item);
    ?>
                <tr>
                    <th><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                    <td><?=$id?></td>
                    <td><?=$name?></td>
                    <td>
                        <a href="index.php?btn_edit&id=<?=$id?>" >Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="index.php?btn_delete&id=<?=$name?>" >Xóa</a>
                    </td>
                </tr>
            <?php
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <button id="check-all" type="button">Chọn tất cả</button>
                        <button id="clear-all" type="button">Bỏ chọn tất cả</button>
                        <button onclick="return confirm('Bạn có chắc chắn xóa không ?')" id="btn-delete" name="btn_delete" >Xóa các mục chọn</button>
                        <a href="index.php">Nhập thêm</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div> -->