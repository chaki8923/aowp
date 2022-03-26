<?php

require('head.php');

require('getplugin.php');
get_header();
$_SESSION['page'] = get_query_var( 'paged' ); 
update_option('current_page' ,$_SESSION['page']);
?>

<main class="main">
<?php require('loading.php'); ?>
  <div class="category-topImg">
    <img src="<?php the_post_thumbnail_url();  ?>" alt="サムネイル">
  </div>
  <div class="category-inner">
  <?php
        $args = array(
          'post_type' => 'post', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 10
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <a  href="<?php the_permalink(); ?>" class="category-panel">
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
