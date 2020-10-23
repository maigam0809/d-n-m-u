
<div class="account_tk">
    <div class="account">TÀI KHOẢN</div>
    <div class="form">
        <form action="<?=$SITE_URL?>/tai-khoan/dang-nhap.php" method="post">
            <div>
                <div class="label">Tên đăng nhập</div>
                <input type="text" name="username" class="input" value="<?=$username?>">

            </div>
            <div>
                <div class="label">Mật khẩu</div>
                <input name="password"  class="input" type="password" value="<?=$password?>">

            </div>
            <div> 
                <div>
                    <label>
                        <input name="ghi_nho" type="checkbox" checked>  Ghi nhớ tài khoản?
                    </label>
                </div>
            </div>
            <div>
                <button class="btn btn-primary dn" name="btn_login">Đăng nhập</button>
            </div>
            <div>
                <li class="quen_mk"><a href="<?=$SITE_URL?>/tai-khoan/quen-mk.php">Quên mật khẩu</a></li>
                <li class="quen_mk"><a href="<?=$SITE_URL?>/tai-khoan/dang-ky.php">Đăng ký thành viên</a></li>
            </div>
        </form>        
    </div>
</div>        
