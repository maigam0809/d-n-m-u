<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand text-white" href="<?=$SITE_URL?>/trang-chinh?trang-chu">
  <img src="" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
        <a class="nav-link " href="<?=$SITE_URL?>/trang-chinh?trang-chu">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?gioi-thieu">Giới thiệu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?lien-he">Liên hệ<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?tin-tuc">Tin tức<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?=$SITE_URL?>/hang-hoa/liet-ke.php">
      <input class="form-control mr-sm-2 "  name="keywords" type="search" value="<?= isset($keywords) ? $keywords : ''; ?>" placeholder="Search" aria-label="Search">
      <button class="btn tim_kiem" name="tim_kiem" type="submit">Search</button>
    </form>
  </div>
</nav>



