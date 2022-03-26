<?php

require('head.php');

require('getplugin.php');
get_header();
?>
<?php
$args = array(
  'post_type' => 'staff', /* 投稿タイプを指定 */
  'paged' => $paged,
  'posts_per_page' => 10 // 10件の記事を取得
); ?>
<main class="main">
  <section class="staff-content">
    <h1>スタッフ一覧</h1>
    <?php $wp_query = new WP_Query($args); ?>
    <?php if ($wp_query->have_posts()) : ?>
      <div class="staff-list">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="list-panel js-panel">
            <div class="list-panel_inner">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
              <div class="description">
                <div>
                  <?php $terms = wp_get_object_terms($post->ID, 'staff-cat');
                  $term = $terms[0]->name;

                  ?>
                  <span><?php echo $term; ?></span>
                  <h3><?php the_title(); ?></h3>
                </div>
              </div>
              <div class="panel-wraper"></div>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
      </div>
      </div>
  </section>
  <?php
  //ページネーション
  if (function_exists('pagination')) {
    pagination();
  }
  ?>
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