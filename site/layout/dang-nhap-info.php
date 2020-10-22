
<div class="account_tk mt-3 ml-5">
    <div class="account">TÀI KHOẢN</div>
    <div class="dang_nhap text-justify p-3">
        <div>
            <img class="img " width="100%;" src='<?=$CONTENT_URL?>/images/users/<?=$_SESSION['user']['image']?>'>
            <p class="h5 text-center">
                <?= $_SESSION['user']['username']?>

            </p>
        </div>
        <li><a class="text-dark" href="<?=$SITE_URL?>/tai-khoan/doi-mk.php">Đổi mật khẩu</a></li>
        <li><a class="text-dark" href="<?=$SITE_URL?>/tai-khoan/dang-nhap.php?btn_logoff">Đăng xuất</a></li>
        <li><a class="text-dark" href="<?=$SITE_URL?>/tai-khoan/cap-nhat-tk.php">Cập nhật tài khoản</a></li>
        <?php
            if($_SESSION['user']['role'] == TRUE){ ?>

            <li><a class="text-dark" href="<?=$ADMIN_URL?>/trang-chinh">Quản trị website</a></li>

            <?php    
            }
            ?>
    </div>
</div>        
