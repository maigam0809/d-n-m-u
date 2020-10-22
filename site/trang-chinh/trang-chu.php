<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner" height="50%">

        <div class="carousel-item active">
            <img class="d-block w-100" src="https://kfcvietnam.com.vn/uploads/banner/469f19e2aaf9d9944691c6a307fce618.png" alt="testimonial img">
        </div>

        <?php
            foreach ($items as $item) {
        ?>
            <div class="carousel-item " style="max-height:410px; overflow:hidden; text-align:center;">
                <a href="../hang-hoa/chi-tiet.php?id=<?=$item['id']?>" class="">
                    <img class="d-block " src="<?=$CONTENT_URL?>/images/products/<?=$item['image']?>" width="max-width: 100%" alt="testimonial img"/>
                </a>
            </div>
        <?php
            }
        ?>
    </div> 

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

 -->
