<?php
    if(isset($_SESSION['user'])){
        require 'dang-nhap-info.php';
    }
    else{
        $id = get_cookie("id");
        $password = get_cookie("password");
        require 'dang-nhap-form.php';
    }

    ?>