<?php get_header(); ?>
<main class="main">
<?php get_template_part('top-menu', 'topmenu'); ?>
<div class="top-image">
  <?php  the_post_thumbnail();  ?> 
</div>

<section class="theme whatuse" id="theme">
    <div class="section-title theme-title">
      
      <h1 class="title how-to-title"><?php echo the_title(); ?></h1>
      <p class="row-title"><?php echo get_post_meta($post->ID,'how-subtitle',true); ?></p>
    </div>
    <?php
										$args = array(
										     'post_type' => 'howto', /* 投稿タイプを指定 */
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
        
        </p>

        <h2 class="theme-panel__plice size-l"><span><?php the_title(); ?></span></h2>
      </div>
      <?php endwhile; ?>     
										<?php else : ?>
												<p>商品登録はまだありません</p>
										<?php endif; ?>
      <!--↓↓ BOXエリアの閉じタグ -->
    </div>
  </section>
  </main>
<?php get_footer(); ?>