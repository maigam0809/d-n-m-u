<div class="row">
    <div class="card-body table-responsive p-0">
        <div class="col-6">
            <div class="card card-success">
                <div class="card-header">
                        <h3 class="card-title">QUẢN LÝ LOẠI HÀNG</h3>
                </div>
                <div class="card-body">
                    <?php
                        if(strlen($MESSAGE)){
                            echo "<h5>$MESSAGE</h5>";
                        }
                    ?>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="">Cate Name</label>
                            <input type="text" class="form-control" name="cate_name" value="<?php echo $_POST['cate_name'] ?? ''; ?>" id="" placeholder="Enter name">
                            <p style="color:red;"><?php echo $err['cate_name'] ?? ''; ?></p>
                        </div>
                        <div>
                            <button class="btn btn-outline-info" name="btn_insert"><i class="fa fa-plus">  Create Categories  </i></button>
                            <button class="btn btn-outline-secondary ml-1" type="reset">Retype</button>
                            <a class="btn btn-outline-info ml-1" href="index.php?btn_list">
                            <i class="fas fa-list"> List </i>
                            </a>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>


