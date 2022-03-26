<?php

require('head.php');

require('getplugin.php');
get_header();
?>


<div class="fadeslider">
  <ul>
    <h2><?php echo $About_title ?></h2>
    <?php for ($i = 1; $i <= 3; $i++) : ?>
      <li><img src="<?php echo $Slide_img[$i]; ?>" alt="スライド画像" class="js-slide"></li>
    <?php endfor; ?>
  </ul>
</div>
<main class="main">
  <?php require('loading.php'); ?>
  <a href="<?php echo $Url_link; ?>" class="reserve">
    RESERVE
  </a>
  <div class="bc-wraper" style="background-image: url('<?php if (!empty($image)) echo $image; ?>');">

  </div>
  <h1 class="row-title"><?php echo $About_text ?></h1>
  <section class="style long">
    <div class="style-num">
      <h2>No.1</h2>
      <p><?php echo $Menu_name[1] ?></p>
    </div>
    <div class="slider slider1">
      <?php for ($i = 4; $i <= 6; $i++) : ?>
        <img src="<?php echo $Slide_img[$i] ?>" alt="スライド画像" class="slide">
      <?php endfor; ?>
    </div>
  </section>
  <section class="style short">
    <div class="style-num">
      <h2>No.2</h2>
      <p><?php echo $Menu_name[2] ?></p>
    </div>
    <div class="slider slider2">
      <?php for ($i = 7; $i <= 9; $i++) : ?>
        <img src="<?php echo $Slide_img[$i] ?>" alt="スライド画像" class="slide">
      <?php endfor; ?>
    </div>
  </section>
  <section class="style">
    <div class="style-num">
      <h2>No.3</h2>
      <p><?php echo $Menu_name[3] ?></p>
    </div>
    <div class="slider slider2">
      <?php for ($i = 10; $i <= 12; $i++) : ?>
        <img src="<?php echo $Slide_img[$i] ?>" alt="スライド画像" class="slide">
      <?php endfor; ?>
    </div>
  </section>

  <?php
  $args = array(
    'post_type' => 'menu', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 8 // 4件の記事を取得
  ); ?>
  <section class="menu">
    <h1 class="js-title">MENU</h1>

    <div class="menu-inner">
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?> <!--ループ開始-->
          <a href="<?php echo get_post_meta($post->ID, 'hotpepper', true); ?>" target=”_blank” rel=”noopener noreferrer” class="menu-panel  js-panel">
            <div class="menu-panel_img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" style="<?php if(!has_post_thumbnail()) echo "display:none;";  ?>">
              <div class="menu-panel_text js-text" style="<?php if(!get_post_meta($post->ID, 'menu_text', true)) echo "display:none"; ?>">
              <?php echo get_post_meta($post->ID, 'menu_text', true); ?>
              </div>
            </div>
            <div class="menu-panel_flextitle">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="menu-panel_text js-text sp-menu_text" style="<?php if(!get_post_meta($post->ID, 'menu_text', true)) echo "display:none"; ?>">
            <?php echo get_post_meta($post->ID, 'menu_text', true); ?>
            </div>
            
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>

  </section>

  <?php
  $args = array(
    'post_type' => 'staff', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 10 // 10件の記事を取得
  ); ?>
  <section class="staff">
    <h1>STAFF</h1>
    <?php $wp_query = new WP_Query($args); ?>
    <?php if ($wp_query->have_posts()) : ?>
    <div class="staff-inner">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="staff-panel">
            <div class="staff-panel_image">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
            </div>
            <div class="staff-panel_comment">
              <?php $terms = wp_get_object_terms($post->ID, 'staff-cat');
              $term = $terms[0]->name;

              ?>
              <span><?php echo $term; ?></span>
              <h3><?php the_title(); ?></h3>
              <p><?php echo get_post_meta($post->ID, 'one_word', true); ?></p>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
    </div>
    <a href="<?php echo get_permalink(74); ?>" class="news-list">スタッフ一覧へ</a>
  </section>

  <section class="blog-info">
    <h1>NEWS</h1>
    <div class="blog-info-inner">
      <ul>
        <?php
        $args = array(
          'post_type' => 'post', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 5
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>

      </ul>
      <a href="<?php echo get_permalink(140); ?>" class="news-list">全て見る</a>
    </div>
  </section>
  <div class="map-wraper"></div>
  <section class="map">
    <?php echo $Add_map; ?>
    <table>
      <tbody>
        <tr>
          <th>Address</th>
          <td>
            <div class="map-detail">
              <p>
                <?php echo $Add_text; ?>

              </p>
            </div>
          </td>
        </tr>
        <tr>
          <th>TELL</th>
          <td>
            <div class="map-detail">
              <p><?php echo $Add_tell; ?></p>
            </div>
          </td>
        </tr>
        <tr>
          <th>Hour</th>
          <td>
            <div class="map-detail">
              <dl>
                <dt><?php echo $cut_name ?></dt>
                <dd><?php echo $Add_place ?></dd>
                <dt><?php echo $perma ?></dt>
                <dd><?php echo $Add_time ?></dd>
              </dl>
            </div>
          </td>
        </tr>
        <tr>
          <th>RECRUIT</th>
          <td>
            <div class="map-detail">
              <a href="<?php echo get_permalink(48); ?>">採用情報はコチラ</a>
            </div>
          </td>
        </tr>

      </tbody>
    </table>

  </section>
</main>
<?php get_footer(); ?>