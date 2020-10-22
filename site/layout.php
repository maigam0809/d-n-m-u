<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online Shopping Center</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?=$CONTENT_URL?>/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=$CONTENT_URL?>/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- bắt đầu phần header -->
        <!-- kết thúc phần header -->
        <!-- bắt đầu phần menu  -->
        <div class="">
            <?php require 'layout/menu.php';?>
        </div>
        <!-- kết thúc phần menu -->

        <!-- mở đầu phần slider -->
        <aside>
            <?php require_once "layout/slider.php"; ?>
        </aside>
        <!-- kết thúc phần slider -->



        <!-- mở đầu phần loại hàng -->
        <section class="col-12 row row_loai_hoa mt-4">
            <div class="col-3 ">
                <?php require 'layout/loai-hang.php';?>
                <?php require 'layout/dang-nhap.php';?>
            </div>
            <div class="col-9">
                <?php require $VIEW_NAME;?>
            </div>
        </section>
        <!-- kết thúc phần loại hàng -->


        <!-- mở đầu phần top10 được xem nhiều nhất -->
        <div>
            <?php require 'layout/top10.php';?>
        </div>
        <!-- kết thúc top 10 sản phẩm có lượt xem nhiều nhất -->

        <!-- mở đầu phần footer -->
        <div>
            <?php 
            require_once "layout/footer.php";
            ?>
        </div>
        <!-- kết thúc phần footer -->


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>