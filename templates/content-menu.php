<div class="navbar navbar-expand-lg navbar-dark justify-content-between" style="margin: 0 -15px 0 -15px;" id="navbarmnu">
                <div id="navbar">  <a class="navbar-brand" href="/News/default.htm">VietCatholic News</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsDefault">
    <ul class="navbar-nav mr-auto">
      <?php
        $args = array (
          'taxonomy' => 'category',
          'orderby' => 'name',
          'parent' => 0,
        );
        //$categories = get_categories($args);
        $cat = get_the_category();
        // var_dump($cat);
        wp_nav_menu($cat);
        foreach ($categories as $category) { 
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="dropdownvatican" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $category->name; ?></a>
          </li>
        <?php
          } 
        ?>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 search" type="text" placeholder="Những từ muốn tìm" id="txtSearch">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="return onSearch('txtSearch');">Tìm</button>
    </form>
  </div>
</div>
                <div><a href="/News/Home/GetVideos" style="color:white"><i class="fas fa-video"></i></a></div>
            </div>