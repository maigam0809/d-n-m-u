    <div class="card detail border-0 mt-3">
        <h4 class="item__right-text-desc">Chi tiết sản phẩm</h4>
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <img src='<?= $CONTENT_URL ?>/images/products/<?=$image?>' class="card-img" width="100%">
            </div>
            <div class="col-md-6">
                <div class="card-body  pb-0">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <h3 class="card-title-detail"><?=$name?></h3>
                    <div class="row">
                        <p class="card-price-detail col-6 mb-0 font-weight-bold text-danger">
                            <?=number_format($price, 2)?></p>
                        <div class="text-right text-warning col-6">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <h6 class="pt-2">Giảm giá : <span class="badge badge-danger pr-pl-2"> <?=$sale?>%</span></h6>
                    <p class="mt-3"><?= $description ?></p>
                    <div class="cart-text mt-3 mb-3">

                    </div>
                    <div class="cart-text  mt-3 mb-3">
                        <p>MÀU</p>
                        <button type="button" class="btn size btn-outline-dark mr-2">Đen</button>
                        <button type="button" class="btn size btn-outline-dark mr-2">Xanh</button>
                        <button type="button" class="btn size btn-outline-dark mr-2 ">Hồng</button>
                        <button type="button" class="btn size btn-outline-dark ">Bạc</button>
                        <div class="clear"></div>
                    </div>
                    <div class="cart-text mt-3 border-dark">
                        <p>Số lượng</p>
                        <button type="button" class="btn">-</button>
                        <span>1</span>
                        <button type="button" class="btn">+</button>
                    </div>
                    <div class="cart-text mt-3 ">
                        <button type="button" class="btn btn-outline-dark">ADD TO CARD</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'binh-luan.php';?>

<?php require 'hang-cung-loai.php';?>