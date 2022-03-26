<?php

require('head.php');
require('getplugin.php');
get_header();
?>

<?php require('loading.php'); ?>
  <main class="main">
    <h2 class="page-title"><?php echo $Work_title ?>一覧</h2>
    <div class="page-inner">
      <div class="page-inner-text">
      </div>
      <ul class="page-inner_tab">

        <!-- //クラス名にそのままカテゴリー名
            //下の方の投稿表示してるaタグにcat-カテゴリー名のクラス
            //liタグをクリックしたらそいつのクラス名取得
            //aタグのクラス名取得＝＞その文字列の中にクリックしたliのクラス名含まれてればshow() -->
        <?php
       
        $terms = get_terms('work-cat');
        foreach($terms as $term): ?>
        <?php
          $_SESSION['cat'][] = $term->name; ?>
          <li class="<?php echo $term->name; ?>" style=""><?php echo $term->name; ?></li>
          
        <?php
        endforeach;
      
        ?>
        


      </ul>


      <!-- 制作実績リスト -->

      <div class="page-inner-image">
        <?php for($i = 0;$i <= 6;$i ++): ?>
        <?php
        $args = array(
          'post_type' => 'worklist', /* 投稿タイプを指定 */
          'paged' => $paged,
          'tax_query' => [
        [
            'taxonomy' => 'work-cat', // 絞り込みたいカスタムタクソノミー
            'field' => 'slug', // スラッグで検索。idでも検索できます
            'terms' => $_SESSION['cat'][$i], // 検索する文字列（fieldがidならidが入ります）
            'include_children' => true, // 子タクソノミーを含むかどうか
            'operator' => 'AND' // termsが複数ある場合AND検索（全て）かIN検索（いずれか）かNOT IN（いずれも除く）
        ]
    ],
          'posts_per_page' => 10
        ); ?>

        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <?php if($_SESSION['cat'][$i]): ?>
            <a href="<?php the_permalink(); ?>" class="cat-<?php echo $_SESSION['cat'][$i]; ?> tab-panel " >
              <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="" style="<?php if(!has_post_thumbnail()) echo "display:none;";  ?>">
              <p class="js-detail-title"><?php the_title(); ?></p>
            </a>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
<?php endfor; ?>

     
      </div>
    </div>
  </main>



  <?php get_footer(); ?>