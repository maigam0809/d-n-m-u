


<div class="row">
    <div class=" col-md-12 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">QUẢN LÝ HÀNG HÓA</h3>
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
                            <thead class="mb-2">
                                <tr>
                                    <td colspan="4">
                                        <button class="btn btn-outline-secondary mt-2" id="check-all" type="button">Chọn
                                            tất cả</button>
                                        <button class="btn btn-outline-warning mt-2" id="clear-all" type="button">Bỏ
                                            chọn tất cả</button>
                                        <button class="btn btn-outline-info mt-2"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')" id="btn-delete"
                                            name="btn_delete">Xóa các mục chọn
                                        </button>
                                    </td>
                                </tr>
                            </thead>
                        <a class="btn btn-info float-right mb-3" href="index.php?btn_new">
                        <i class="fa fa-plus">  Create products  </i>
                        </a>
                        <table class="table">
                            
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">CateName</th>
                                    <th scope="col">ProName</th>
                                    <th scope="col" style="max-height: 300px;">Description</th>
                                    <th scope="col" style="width: 50px;">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sale</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Display</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($items as $item) {
                                    extract($item);
                                   
                                ?>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="id[]" value="<?=$id?>"></th>
                                    <th scope="row"><?=$item['id']?></th>
                                    <td><?=$item['cate_name']?></td>
                                    <td><?=$name?></td>
                                    <td><?=$description?></td>
                                    <td>
                                        <img src="../../content/images/products/<?=$image?>" width="50px">
                                    </td>
                                    <td><?=$price?></td>
                                    <td><?=$sale?></td>
                                    <td>
                                        <span class="badge bg-<?=$status ? 'success' : 'warning'?>"><?=$status ? 'đặc biệt' : 'không đặc biệt'?></span>
                                    </td>
                                    <td><?=$view?></td>
                                    <td><?=$created_at?></td>
                                    <td class="d-flex">
                                        <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" href="index.php?btn_edit&id=<?=$id?>">  <i class="fa fa-edit"></i></a>
                                        <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                            href="index.php?btn_delete&id=<?=$id?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn mr-2 rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air btn-outline-success " 
                                        href="index.php?btn_detail&id=<?=$id?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                           
                        </table>
                    </form>
                    <!-- kết thúc phần hiển thị -->

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