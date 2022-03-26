<section class="theme" id="theme">
    <div class="section-title theme-title">
      <h1 class="title"><?php echo $product_title ?></h1>
      <p class="row-title"><?php echo $product_subtitle ?></p>
    </div>
    <?php
										$args = array(
										     'post_type' => 'product', /* 投稿タイプを指定 */
										     'paged' => $paged,
										     'posts_per_page' => 9 // 6件の記事を取得
										); ?>
    <div class="theme-box">
    <?php query_posts( $args ); ?>
										<?php if (have_posts()) : ?>
											<?php while (have_posts()) : the_post(); 
											/* ループ開始 */ ?>
      <!-- それぞれのパネル -->
      <div class="theme-panel">
        <a href="<?php echo the_permalink(); ?>" class="theme-panel__img">
          <img src="<?php the_post_thumbnail('full'); ?>" alt="">
        </a>
        <?php 
        $categories = get_the_category();
        foreach($categories as $cat): ?>
        <p class="theme-panel__txt"><?php echo $cat->name; ?></p>
        <?php endforeach; ?>
        <h2 class="theme-panel__plice"><span></span><?php echo $get_post_meta($post->ID,'plice',true); ?></h2>
      </div>
      <?php endwhile; ?>     
										<?php else : ?>
												<p>商品登録がありません</p>
										<?php endif; ?>
      <!--↓↓ BOXエリアの閉じタグ -->
    </div>
  </section>