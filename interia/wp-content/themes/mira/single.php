<?php
require('head.php');
get_header();
require('getplugin.php');
?>
<main class="main main-single">
  
  <section class="single-product single-container">
  <div class="bread">
    <ul class="bread-item">
    <?php mytheme_breadcrumb(); ?>
    </ul>
  </div>
    <div class="single-product-left">
      <div class="single-product-left_inner">
        <p class="single-product-title">PRODUCT</p>
        <h2><?php the_title(); ?></h2>
        <div class="main-text_small">
          <p><?php the_content(); ?></p>
        </div>
        <ul>
          <?php for ($i = 1; $i <= 10; $i++) : ?>
            <li style="<?php if (!get_post_meta($post->ID, 'title' . $i, true)) echo "display:none"; ?>"><span><?php echo get_post_meta($post->ID, 'title' . $i, true) ?></span><span><?php echo get_post_meta($post->ID, 'material' . $i, true) ?></span></li>
          <?php endfor; ?>
        </ul>
        <div class="buy-btn">
          <?php for ($i = 1; $i <= 3; $i++) : ?>
            <a href="<?php echo get_post_meta($post->ID, 'site_url' . $i, true); ?>" style="<?php if (!get_post_meta($post->ID, 'site_name' . $i, true))  echo 'display: none;'; ?>"><?php echo get_post_meta($post->ID, 'site_name' . $i, true); ?></a>
          <?php endfor; ?>
        </div>
      </div>
    </div>

    <div class="single-product-right">
      <div class="single-product-right_inner">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
      </div>
      <div class="single-product-panel">
        <div class="js-single_img single-product-panel_img">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
        </div>
        <?php for ($i = 1; $i <= 5; $i++) : ?>
          <div class="js-single_img single-product-panel_img">
            <img src="<?php echo get_post_meta($post->ID, 'back-img' . $i, true); ?>" alt="背景">
            <span style="<?php if (get_post_meta($post->ID, 'back-img' . $i, true)) echo "display: none;" ?>">no-image</span>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>
  <div class="clear"></div>



  <div class="clear"></div>
  <!--------------- 関連商品 ----------------------->
  <?php // 現在表示されている投稿と同じタームに分類された投稿を取得
  $taxonomy_slug = 'product-cat'; // タクソノミーのスラッグを指定
  $post_type_slug = 'product'; // 投稿タイプのスラッグを指定
  $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
  if ($post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
    $terms_slug = array(); // 配列のセット
    foreach ($post_terms as $value) { // 配列の作成
      $terms_slug[] = $value->slug; // タームのスラッグを配列に追加
    }
  }
  $args = array(
    'post_type' => $post_type_slug, // 投稿タイプを指定
    'posts_per_page' => 10, // 表示件数を指定
    'orderby' =>  'rand', // ランダムに投稿を取得
    'post__not_in' => array($post->ID), // 現在の投稿を除外
    'tax_query' => array( // タクソノミーパラメーターを使用
      array(
        'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
        'field' => 'slug', // スラッグに一致するタームを返す
        'terms' => $terms_slug // タームの配列を指定
      )
    )
  );
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) :
  ?>
    <section class="other">
      <h2>関連商品</h2>
      <div class="other-flex">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="other-panel">
            <div class="other-panel_img">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="関連画像">
              </a>
            </div>
            <div class="other-panel_text">
              <h3><?php the_title(); ?></h3>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      </div>
    </section>
    <div class="map-wraper"></div>
    <section class="address">
      <?php echo $Address_map; ?>
      <div class="address-inner">
        <div class="address-inner_text">
          <h2><?php echo $Shop_name; ?></h2>
          <p><?php echo $Company_name; ?></p>
          <p><?php echo $Address_name; ?></p>
          <p>TEL：<?php echo $Tell_number; ?></p>
          <ul>
            <?php for ($i = 11; $i <= 19; $i++) : ?>
              <li style="<?php if (!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン"></a></li>
            <?php endfor; ?>
          </ul>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>