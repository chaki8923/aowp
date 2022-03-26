<?php

get_header();
require('getplugin.php');
?>



<?php if (have_posts()) : ?>
  <?php
  if (isset($_GET['s']) && empty($_GET['s'])) {
    echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
  } else {


  ?>

    <main class="main">

      <?php get_template_part('top-menu', 'topmenu'); ?>
      <div class="blog-list">
        <ul>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <li class="blog-item">
                <a href="<?php the_permalink(); ?>" class="blog-block">
                  <h3><?php the_title(); ?></h3>
                  <p><?php echo wp_trim_words(get_the_content(), 60, '...'); ?></p>
                  <span><?php the_time('Y.m.d'); ?></span>
                </a>
              </li>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
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