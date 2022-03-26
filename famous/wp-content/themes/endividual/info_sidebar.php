<?php 
$Main_img = [];

for ($i = 21; $i <= 21; $i++) {

  $Main_img[21] =  get_option('main_view' . $i);

}

?>


<div class="p-sidebar">
  <div class="p-sidebar_img">
    <img src="<?php echo $Main_img[21]; ?>" alt="" class="c-img">
  </div>
  <h3 class="p-sidebar_title c-sideTitle">人気記事</h3>
  <ul class="p-sidebar_new">
    <?php

    $args = array(
      'post_type' => 'information',
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'posts_per_page' => 5,
      'post_status'      => 'publish',
      'caller_get_posts' => 5,
      'offset'           => 0,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
    ?>
      
        <li class="p-sidebar_newItem">
          <a href="<?php the_permalink(); ?>" class="p-sidebar_list">
            <div class="p-sidebar_listImg">
              <?php if (has_post_thumbnail()) { ?>
                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="サムネイル" class="c-img">
              <?php } ?>
            </div>
            <div class="p-sidebar_newText">
              <p><?php echo the_title(); ?>
              </p>
              <p><?php echo get_post_time('Y.m.d'); ?></p>
              <p><?php echo getPostViews(get_the_ID()); // 記事閲覧回数表示 
                  ?></p>
            </div>
          </a>
        </li>

    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>

  </ul>
  <div class="p-sidebar_special">
    <h3 class="p-sidebar_title c-sideTitle">今月のトピック</h3>
    <p></p>
  </div>
  <div class="p-sidebar_arcive">
    <ul class="js-list">
      <li class="js-click-arcive p-sidebar_arciveSelect">月を選択して下さい<img src="<?php echo getImg('arrowbottom_white.png') ?>" alt="↓" class="arrow_bottom js-arrow"></li>
      <?php wp_get_archives('post_type=information&type=monthly'); ?>
    </ul>
  </div>
  <div class="p-sidebar_cat">
    <h3 class="p-sidebar_title c-sideTitle">カテゴリー</h3>

    <ul>
    
    <?php
    $terms = get_terms('info-cat');
    foreach ( $terms as $term ) {
      echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
    }
  ?>
    </ul>
  </div>
  <div class="p-sidebar_newsingle">
    <h3 class="p-sidebar_title c-sideTitle">最近の記事</h3>
    <ul class="sidebar__item">
      <?php $posts = get_posts('post_type=information&numberposts=3');
      foreach ($posts as $post) : ?>
        <li class="sidebar__list">
          <a href="<?php the_permalink() ?>" class="sidebar__link">
            <p class="sidebar__text c-text"><?php echo the_title(); ?></p>
            <ul class="sidebar__metaItem">
              <li class="sidebar__metaList">
                <img src="<?php echo getImg('crock.png'); ?>" alt="日付" class="sidebar__icon">
                <?php echo get_post_time('Y.m.d'); ?>
              </li>
              <?php $terms = wp_get_object_terms( $post->ID, 'info-cat');
                    $term = $terms[0]->name;

              ?>
              <li class="sidebar__metaList">
                <img src="<?php echo getImg('folder.png'); ?>" alt="ターム" class="sidebar__icon">
                <?php echo $term; ?>
              </li>
            </ul>
          </a>
        </li>
      <?php endforeach; ?>
      <?php wp_reset_postdata();
      wp_reset_query(); ?>

    </ul>
  </div>
  <!-- /newssingle -->
  <div class="sidebar__search">
    <?php get_search_form(); ?>

  </div>
</div>
<div class="clear"></div>