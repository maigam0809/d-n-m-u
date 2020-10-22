<?php
require '../../global.php';
require '../../dao/hang-hoa.php';
//-------------------------------//

extract($_REQUEST);
// var_dump($_REQUEST);

if(exist_param("status")){
    $items = hang_hoa_select_dac_biet();
}
else if(exist_param("keywords")){
  
    if(trim($keywords) != ''){
        $items = hang_hoa_select_keyword($keywords);
    }

}elseif(exist_param("sp")){
    $items = hang_hoa_select_by_loai($id);
    
}
else{
    $items = hang_hoa_select_all();
}
$VIEW_NAME = "hang-hoa/liet-ke-ui.php";
require '../layout.php';