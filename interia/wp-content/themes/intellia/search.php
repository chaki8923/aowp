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

<main class="main blog-page">
<h2 class="blog-title"><?php echo $_GET['s'];  ?></h2>
  <div class="blog-container">
  <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="blog-card js-card">
          <div class="blog-card__img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="js-card-image">
          </div>
          <div class="blog-card__text">
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
            <span><?php the_time('Y.m.d'); ?></span>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <li>ニュースはありません</li>
    <?php endif; ?>
  </div>
  <?php
  //ページネーション
  if (function_exists('pagination')) {
    pagination();
  }
  ?>
  
  
</main>
<?php require('sidebar.php'); ?>
  <?php } ?>
<?php else : ?>
<main class="main">
<?php get_template_part('top-menu', 'topmenu'); ?>
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
  <p class="sp-nohit">検索結果が見つかりません。</p>
</main>

<?php endif; ?>

<?php get_footer(); ?>