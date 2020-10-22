<?php
require '../../global.php';
require '../../dao/hang-hoa.php';
//-------------------------------//

extract($_REQUEST);
$hang_hoa = hang_hoa_select_by_id($id);
extract($hang_hoa);
// Tăng số lượt xem lên 1
hang_hoa_tang_so_luot_xem($id);
$VIEW_NAME = "hang-hoa/chi-tiet-ui.php";
require '../layout.php';
