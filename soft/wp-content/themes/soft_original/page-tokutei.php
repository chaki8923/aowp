<?php get_header(); ?>
<main class="main">
<?php get_template_part('top-menu', 'topmenu'); ?>
<div class="top-image">
  <?php  the_post_thumbnail();  ?> 
</div>

<section class="policy">

  <div class="inner">
    <div class="section-title about-title">
      <h1 class="title size-l"><?php the_title(); ?></h1>
    </div>
    <div class="content-area">
      <?php if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 
      ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php the_content(); ?>
          </div>
        <?php endwhile; // 繰り返し処理終了
      else : // ここから記事が見つからなかった場合の処理 
        ?>
        <div class="post">
          <h2>記事はありません</h2>
          <p>お探しの記事は見つかりませんでした。</p>
        </div>
      <?php endif; // WordPress ループ終了 
      ?>

    </div>
  </div>
</section>
</main>
<?php get_footer(); ?>