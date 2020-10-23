<?php
    if(isset($_SESSION['user'])){
        require 'dang-nhap-info.php';
    }
    else{
        // $id = get_cookie("id");
        $username = get_cookie("username");
        $password = get_cookie("password");
        require 'dang-nhap-form.php';
    }

    ?>