




<div class="row">
    <div class=" col-md-12 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">QUẢN LÝ KHÁCH HÀNG</h3>
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
                        <a class="btn btn-info float-right mb-3" href="index.php?btn_new">Nhập thêm</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Activated</th>
                                    <th scope="col">Date of birth</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">view</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($items as $item) {
                                    extract($item);
                                ?>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                                    <th scope="row"><?=$id?></th>
                                    <td><?=$username?></td>
                                    <td><?=$email?></td>
                                    <td>
                                        <img src="../../content/images/users/<?=$image?>" width="50px">
                                    </td>
                                    <td><?=$role?'Nhân viên':'Khách hàng'?></td>
                                   
                                    <td>
                                        
                                        <span class="badge bg-<?=$gender ? 'danger' : 'info'?>"><?=$gender ? 'nam' : 'nữ'?></span>
                                    </td>
                                    <td>
                                        
                                        <span class="badge bg-<?=$activated ? 'success' : 'warning'?>"><?=$activated ? 'active' : 'unactive'?></span>
                                    </td>
                                    <td><?=$date_of_birth?></td>
                                   
                                   
                                    <td class="d-flex">
                                        <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" href="index.php?btn_edit&id=<?=$id?>">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                            href="index.php?btn_delete&id=<?=$id?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?btn_detail&id=<?=$id?>">
                                        <i class="fa fa-eye">

                                        </i> 
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr class="mt-4">
                                    <td colspan="4" class="">
                                        <button class="btn btn-outline-secondary mt-2" id="check-all" type="button">Chọn
                                            tất cả</button>
                                        <button class="btn btn-outline-warning mt-2" id="clear-all" type="button">Bỏ
                                            chọn tất cả</button>
                                        <button class="btn btn-outline-info mt-2"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')" id="btn-delete"
                                            name="btn_delete">Xóa các mục chọn</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                    <!-- bắt đầu phần phân trang -->
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination float-right pagination-lg ">
                            <li class="page-item">
                                <a class="page-link" href="?btn_list&page=1">|&lt;</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="?btn_list&page=<?=$_SESSION['prev_page']?>"> 
                                << 
                                </a>
                            </li>

                            
                            <?php
                            for($i = 1; $i <=$_SESSION['total_page']; $i++ ){

                                    echo '<li class="page_item ">
                                            <a class="page-link " 
                                            href="?btn_list&page='.$i.'">
                                            '.$i.'
                                            </a>
                                        </li>';
                                
                            }

                            ?>
                            <li class="page_item">
                                <a class="page-link" href="?btn_list&page=<?=$_SESSION['next_page']?>">
                                >>
                                </a>
                            </li>
                            <li class="page_item"><a class="page-link" href="?btn_list&page=<?=$_SESSION['total_page']?>">>|</a></li>
                        </ul>
                    </nav>
                    <!-- kết thúc phần phân trang -->
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?=$ASSET_URL?>/js/xshop-list.js"></script>





<!-- <!DOCTYPE html>
<html>
    <head>
        <script src="<?=$CONTENT_URL?>/js/xshop-list.js"></script>
    </head>
    <body>
        <h3>QUẢN LÝ KHÁCH HÀNG</h3>
        <?php
            if(strlen($MESSAGE)){
                echo "<h5>$MESSAGE</h5>";
            }
        ?>
        <form action="index.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>FULL NAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>ROLE</th>
                        <th>ADDRESS</th>
                        <th>IMAGE</th>
                        <th>PHONE</th>
                        <th>GENDER</th>
                        <th>CREATED AT</th>
                        <th>UPDATE AT</th>
                        <th>ACTIVATED</th>
                        <th>CHANGE</th>
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
                        <td><?=$id?></td>
                        <td><?=$fullname?></td>
                        <td><?=$username?></td>
                        <td><?=$email?></td>
                        <td><?=$password?></td>
                        <td><?=$role?'Nhân viên':'Khách hàng'?></td>
                        <td><?=$address?></td>
                        <td><?=$image?></td>
                        <td><?=$phone?></td>
                        <td><?=$gender?></td>
                        <td><?=$created_at?></td>
                        <td><?=$update_at?></td>
                        <td><?=$activated?></td>
                        <td>
                            <a href="index.php?btn_edit&id=<?=$id?>">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="index.php?btn_delete&ma_kh=<?=$id?>">Xóa</a>
                        </td>
                      
                    </tr>
                <?php
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <button id="check-all" type="button">Chọn tất cả</button>
                            <button id="clear-all" type="button">Bỏ chọn tất cả</button>
                            <button id="btn-delete" name="btn_delete">Xóa các mục chọn</button>
                            <a href="index.php">Nhập thêm</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </body>
</html> -->