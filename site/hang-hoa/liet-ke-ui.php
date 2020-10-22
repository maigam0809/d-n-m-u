<div class="row">
    <?php
        foreach ($items  as $item) {
            extract($item);
    ?>
    <div class="col-3 d-flex flex-row flex-wrap">
        <div class="card chi_tiet">
            <a href="chi-tiet.php?id=<?=$id?>">
                <img class="card-img-top p-3" src="<?=$CONTENT_URL?>/images/products/<?=$image?>" alt="Card image cap">
            </a>
            <div class="card-body">
                <h6 class="card-title"><a href="chi-tiet.php?id=<?=$id?>" style="color: #212529;"><?=$name?></a>
                </h6>
                <h5 class="card-title text-danger">$<?=number_format($price, 2)?></h5>
                <a href="chi-tiet.php?id=<?=$id?>" class="btn btn-info">Mua hàng</a>
            </div>
        </div>
    </div>
    <?php
            }
        ?>

</div>