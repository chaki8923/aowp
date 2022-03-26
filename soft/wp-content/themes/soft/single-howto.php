<?php get_header(); ?>
<main class="main">
<?php get_template_part('top-menu','topmenu'); ?>
<?php 

$_SESSION['how-title'] = get_post_meta($post->ID,'how-title',true); 

?>

<div class="inner">

<?php if (have_posts()) : ?>
							    <?php while (have_posts()) : the_post();?>
     <?php the_content(); ?>
      <?php endwhile; ?>
										<?php else : ?>
							
						        <h3>記事がありません</h3>
						        <p>表示する記事はありませんでした。</p>
									
									<?php endif; ?><!-- ループ終了 -->
</div>
</main>
  <?php get_footer(); ?>