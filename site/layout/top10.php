<?php
require_once '../../dao/hang-hoa.php';
$hh_array = hang_hoa_select_top10();

?>
<div class="">
    <div class="container_top10 ">

        <div class="container ">
            <div class="section_content">
                <!-- bắt đầu section top_10 -->
                <section class="top_10">
                    <h2 class="page-subheading">
                        <img src="<?=$CONTENT_URL?>/images/icon-sale.png" alt="">
                        Top được xem nhiều nhất
                    </h2>


                    <div class="row ">
                        <?php foreach($hh_array as $hh) : ?>
                        <div class="col-6 mb-4">
                            <div class="col-inner d-flex">
                                <div class="flex phone-wrapper">
                                    <div class="box img-flower">
                                        <img src="<?=$CONTENT_URL . '/images/products/'. $hh['image']?>" alt="">
                                    </div>
                                    <div class="box box_content">
                                        <div class="content-top">
                                            <div class="title-wrapper">

                                                <p class="product-title">
                                                    <a href="<?=$SITE_URL?>/hang-hoa/chi-tiet.php?id=<?=$hh['id']?>">
                                                        <?=$hh['name']?>
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="price-wrapper">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="price">
                                                    <del>
                                                        <span class="price_old">
                                                            <?=$hh['price']?></a>
                                                            <span class="">₫
                                                            </span>
                                                        </span>
                                                    </del>
                                                    <span class="price_new">
                                                        <?= $hh['price'] - $hh['price'] * ($hh['sale'] / 100) ?>
                                                        <span class="">₫</span>
                                                    </span>

                                                </span>
                                            </div>
                                        </div>
                                        <div class="content-bottom">
                                            <a href="<?=$SITE_URL?>/hang-hoa/chi-tiet.php?id=<?=$hh['id']?>"
                                                class="add_cart">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <!-- kết thúc section top_10 -->

                <section class="top_10 pb-4">
                    <div class="row banner_row">
                        <div class="col-6">
                            <div class="img-inner">
                                <img src="<?=$CONTENT_URL?>/images/bg_top1.jpg">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="img-inner">
                                <img src="<?=$CONTENT_URL?>/images/BANNER4.jpg">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>