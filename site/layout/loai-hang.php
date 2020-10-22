<?php 
        require '../../dao/loai.php';
        $loai_array = loai_select_all();
    ?>

<div class="loai_hoa">
    <h4 class="type">Chọn Loại Hoa</h4>
    <ul id="menu-danh-muc-hoa" class="menu">
        <?php
                    foreach ($loai_array as $loai) { 
                        $href = "$SITE_URL/hang-hoa/liet-ke.php?sp&id=$loai[id]";
                    
                    ?>
        <li id="menu-item-495" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-495">
            <a href="<?=$href?>">
                <img width="70" height="70"
                    src="https://flower.ghouse.com.vn/wp-content/uploads/2018/09/icon-hoa-70.jpg"
                    class="_mi _before _image lazy-load-active">
                <span> <?=$loai['cate_name']?></span>
            </a>
        </li>


        <?php   
                }
        ?>
    </ul>

</div>