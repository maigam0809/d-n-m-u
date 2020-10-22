<?php
      $binh_luan_list = hang_hoa_select_by_loai($cate_id);
?>

<div class="panel mt-3">
    <div class="panel-heading account">HÀNG CÙNG LOẠI</div>
    <div class="top-10">
        <ul>
            <div class="flex">
                <div class="row">
                    <?php foreach($binh_luan_list as $bl):?>
                    <div class="col-6">
                        <div class="row mb-3">
                            <div class="col-4">
                                <img src="<?=$CONTENT_URL?>/images/products/<?=$bl['image']?>" alt=""
                                    style="max-width: 100%;">
                            </div>
                            <div class="col-8">
                                <li class="d-flex flex-column">
                                    <a href="chi-tiet.php?id=<?=$bl['id']?>">
                                        <h6 class="font-weight-bold">
                                            <?=$bl['name'] ?>
                                        </h6>
                                    </a>
                                    <div class="pl-2">
                                        <?=$bl['price'] ?>
                                    </div>
                                    <div class="pl-2">
                                        <?=$bl['created_at'] ?>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </ul>
    </div>
</div>