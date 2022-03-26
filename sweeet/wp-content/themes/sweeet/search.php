<?php
require('head.php');

$Main_img = [];
$Slide_text = [];
$Sns_link = [];
$Title = [];
$Movie = [];
$Top_flg = [];
for ($i = 1; $i <= 19; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Slide_text[$i] = get_option('slide_text' . $i);
  $Title[$i] = get_option('title' . $i);
  $Movie[$i] = get_option('movie' . $i);
  $Sns_link[$i] = get_option('sns_link' . $i);
  $Top_flg[$i] = get_option('top_flg' . $i); //動画写真切り替え
}




get_header();
?>



  <?php if (have_posts()) : ?>
    <?php
    if (isset($_GET['s']) && empty($_GET['s'])) {
      echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
    } else {


    ?>


<main>



  <section class="news blog-news">
    <div class="title-cover">
      <h1 class="news-title store-title"><?php echo $_GET['s']; ?></h1>
    </div>
    <?php if (have_posts()) : ?>
      <div class="news-area">
        <!--------------------- bob1------------------- -->
        <?php while (have_posts()) : the_post(); ?>
          <a href="<?php the_permalink(); ?>">
            <div class="news-box">
              <div class="news-box__leftImg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
              </div>
              <div class="news-box__text">
                <p><?php the_title(); ?></p>
                <span class="date"><?php echo get_post_time('Y.m.d'); ?></span>
                <span class="detail-arrow">＞</span>
                <div class="news-svg">
                  <svg viewBox="0 0 160 250" version="1.1">
                    <path d="M160,9.09494702e-13 L160,250 C83.8467314,250 30.5133981,250 0,250 C62.0781553,234.015625 80,103.660156 105.673828,55.0234375 C122.789714,22.5989583 140.898438,4.2578125 160,9.09494702e-13 Z"></path>
                  </svg>
                </div>

              </div>
            </div>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      </div>

      <?php
      //ページネーション
      if (function_exists('pagination')) {
        pagination();
      }
      ?>
  </section>
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
<p class="sp-nohit">検索結果が見つかりません。</p>

 
  <?php endif; ?>

  <?php get_footer(); ?>