<?php
require('head.php');
require('getplugin.php');
if ( is_post_type_archive() && !is_date() ) {
  $title = post_type_archive_title( '', false );
}    elseif ( is_date() ) {
  $date  = single_month_title('',false);
  $point = strpos($date,'月');
  $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
}
get_header();
?>


 <div class="p-category">
 <?php require('loading.php'); ?>
      <div class="p-category_list">
      <div class="p-title">
      <h1><?php echo $title;  ?>の記事一覧</h1>
    </div>
      <?php if(have_posts()): while(have_posts()):the_post(); ?>
      
            <div class="p-category_panel">
              <a href="<?php the_permalink(); ?>" class="p-category_panelImg" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                <label for="" class="p-category_label c-label">
                  <ul class="p-category_labelText c-label_item">
                    <li><img src="<?php echo getImg('crock.png'); ?>" alt="日付" class="sidebar__icon sidebar__icon--card"><?php echo get_post_time('Y.m.d'); ?></li>
                    <?php $cat = get_the_category();
                    $cats = $cat[0];

                    ?>
                    <li><img src="<?php echo getImg('folder.png'); ?>" alt="カテゴリー" class="sidebar__icon sidebar__icon--card"><?php echo $cats->cat_name; ?></li>
                  </ul>
                </label>
                <h2 class="p-category_panelTitle c-title">
                  <?php the_title(); ?>
                </h2>
              </a>
              <div class="p-category_panelText">
                <p>
                  <?php echo wp_trim_words(get_the_content(), 60, '...'); ?>
                </p>
              </div>

            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <?php
        //ページネーション
        if (function_exists('pagination')) {
          pagination();
        }
        ?>
      </div>
      <?php if($get == 'information'){
        require('info_sidebar.php');
      }elseif($get == 'worklist'){
        require('sidebar.php');
      }else{
        require('blog_sidebar.php'); 
      }
      
      
      ?>

    </div>
  </div>
  <?php get_footer(); ?>