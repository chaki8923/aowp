<?php get_header(); ?>
<main class="main">

<?php get_template_part('top-menu','topmenu'); ?>

 
  <!-- ========================================================== -->
  <!-- メインキャッチ画像 -->
  <!-- ========================================================== -->
  <?php 

$main_bc = get_option('main_bc');
$bc_color = get_option('bc_color');
$about_title = get_option('about_title');
$main_text = get_option('main_text');

$about_subtitle = get_option('about_subtitle');
$about_img1 = get_option('about_img1');
$about_img2 = get_option('about_img2');

$abouText_t = get_option('about_textTop'); 
$abouText_m = get_option('about_textMiddle'); 
$abouText_b = get_option('about_textBottom'); 

$feature_title = get_option('feature_title');
$feature_subtitle = get_option('feature_subtitle');

$option_title = get_option('option_title');
$option_subtitle = get_option('option_subtitle');

$product_title = get_option('product_title');
$product_subtitle = get_option('product_subtitle');

$news_title = get_option('news_title');
$news_subtitle = get_option('news_subtitle');
?>
  <div class="main-kyatch">
    <img src="<?php if(!empty($main_bc)){echo $main_bc;}else{ echo get_template_directory_uri().'/img/top-father.png'; } ?>" alt="">
    <h1><?php echo $main_text; ?><h1>
  </div>
  <!-------------------- セクション ～about～ ----------------------------->
  <section class="about" id="about">
    <div class="section-title about-title">
      <h1 class="title"><?php if(!empty($about_title)){echo $about_title;}else{echo 'ABOUT';} ?></h1>
      <p class="row-title"><?php if(!empty($about_subtitle)){echo $about_subtitle; }else{ echo '私たちについて'; } ?></p>
    </div>
    <div class="about-inner">
      <div class="about-inner__imgarea">
        <div class="about-inner__img about-inner__img1">
          <img src="<?php echo $about_img1 ?>" alt="">
        </div>
        <div class="about-inner__img about-inner__img2">
          <img src="<?php echo $about_img2 ?>" alt="">
        </div>
      </div>
      <div class="about-inner__textarea">
        <p class="txt-t"><?php echo $abouText_t; ?></p>
        <p class="txt-m">
        <?php echo $abouText_m; ?>
        </p>
        <p class="txt-b"><?php echo $abouText_b; ?></p>
      </div>
    </div>
  </section>

  <!------------------------- セクション ～FEATURE～ ----------------------->
  <section class="feature" id="feature">
    <div class="section-title feature-title">
      <h1 class="title"><?php if(!empty($feature_title)){echo $feature_title;}else{echo 'FEATURE'; } ?></h1>
      <p class="row-title"><?php if(!empty($feature_subtitle)){echo $feature_subtitle;}else{echo '強み'; } ?></p>
    </div>
    <div class="feature-merit">
      <!-- タイトルとその下の説明文 -->
      <?php dynamic_sidebar('メリットエリア'); ?>
      
    </div>
  </section>
  <!------------------------- セクション ～OPTION～ ----------------------->
  <section class="option" id="option">
    <div class="section-title option-title">
      <h1 class="title"><?php if(!empty($option_title)){echo $option_title;}else{ echo 'OPTION'; } ?></h1>
      <p class="row-title"><?php  if(!empty($option_subtitle)){echo $option_subtitle;}else{ echo '各種オプション'; } ?></p>
    </div>
    <?php dynamic_sidebar('オプションエリア'); ?>

  </section>
  <!------------------------- セクション ～THEME～ ----------------------->
  <section class="theme" id="theme">
    <div class="section-title theme-title">
      <h1 class="title"><?php echo $product_title ?></h1>
      <p class="row-title"><?php echo $product_subtitle ?></p>
    </div>
    <?php
										$args = array(
										     'post_type' => 'product', /* 投稿タイプを指定 */
										     'paged' => $paged,
										     'posts_per_page' => 6 // 6件の記事を取得
										); ?>
    <div class="theme-box">
    <?php query_posts( $args ); ?>
										<?php if (have_posts()) : ?>
											<?php while (have_posts()) : the_post(); 
											/* ループ開始 */ ?>
      <!-- それぞれのパネル -->
      <div class="theme-panel">
        <a href="<?php echo the_permalink(); ?>" class="theme-panel__img">
          <?php the_post_thumbnail();  ?>
        </a>
        <!-- カテゴリー名取得表示 -->
        <?php
        $categories = get_the_category();?>
        <p class="theme-panel__txt">
        <?php
        foreach($categories as $cat): ?>
        <?php echo $cat->name; ?>
        <?php endforeach; ?>
        </p>

        <h2 class="theme-panel__plice"><span><?php the_title(); ?></span><?php echo get_post_meta($post->ID,'plice',true); ?></h2>
      </div>
      <?php endwhile; ?>     
										<?php else : ?>
												<p>商品登録はまだありません</p>
										<?php endif; ?>
      <!--↓↓ BOXエリアの閉じタグ -->
    </div>
  </section>
  <!------------------------- セクション ～NEWS～ ----------------------->
  <section class="news" id="news">
    <div class="section-title news-title">
      <h1 class="title"><?php if(!empty($news_title)){echo $news_title;}else echo 'NEWS'; ?></h1>
      <p class="row-title"><?php if(!empty($news_subtitle)){echo $news_subtitle;}else echo 'ニュース'; ?></p>
    </div>
    <div class="news-inner">
      <ul>
        <a href="">
          <li>2021.7.28　　夏季休業のお知らせ夏季休業のお知らせ</li>
        </a>
        <a href="">
          <li>2021.7.28　　夏季休業のお知らせ</li>
        </a>
        <a href="">
          <li>2021.7.28　　夏季休業のお知らせ</li>
        </a>
        <a href="">
          <li>2021.7.28　　夏季休業のお知らせ</li>
        </a>
        <a href="">
          <li>2021.7.28　　夏季休業のお知らせ</li>
        </a>
      </ul>
    </div>

  </section>
  </main>
  <?php get_footer(); ?>