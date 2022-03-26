<?php
require('head.php');



get_header();
?>



  <?php if (have_posts()) : ?>
    <?php
    if (isset($_GET['s']) && empty($_GET['s'])) {
      echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
    } else {


    ?>


<main class="main page-container">
  <h1 class="page-title"><?php echo $_GET['s'] ?></h1>
  <div class="category-topImg">
    <img src="<?php the_post_thumbnail_url();  ?>" alt="サムネイル">
  </div>
  <div class="category-inner">
  <?php
        $args = array(
          'post_type' => 'post', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 8
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <a  href="" class="category-panel">
      <div class="category-panel--left">
        <span class="category-panel--date"><?php the_time('Y.m.d') ?></span>
        <h2 class="category-panel--title"><?php the_title(); ?></h2>
        <div class="category-panel--text">
          <p>
          <?php echo wp_trim_words(get_the_content(), 70, '...'); ?>
          </p>
        </div>
      </div>
      <div class="category-panel--right">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
      </div>
    </a>
    <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
    
   
  <?php
  //ページネーション
  if (function_exists('pagination')) {
    pagination();
  }
  ?>
  </div>
  <?php require('sidebar.php'); ?>
</main>
    <?php } ?>
  <?php else : ?>
    <div class="no-hit">

      <p aria-label="CodePen">
    <span data-text="N">N</span>
    <span data-text="O">O</span>
    <span data-text=""></span>
    <span data-text="H">H</span>
    <span data-text="I">I</span>
    <span data-text="T">T</span>
  
  </p>
  <h3>検索結果が見つかりません。</h3>
</div>

<h2 class="sp-nohit">検索結果が見つかりません。</h2>
 
  <?php endif; ?>

  <?php get_footer(); ?>