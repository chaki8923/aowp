<?php

require('head.php');
get_header();
?>

<main class="main">
  <div class="thumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
  </div>
  <section class="reqruit">
    <div class="title">
      <h1><?php the_title(); ?></h1>
      <div class="bread">
        <ul class="bread-item">
          <?php mytheme_breadcrumb(); ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="detail">
  <a class="job-link" href="<?php echo get_post_meta($post->ID, 'job-link', true); ?>"><?php echo get_post_meta($post->ID, 'job-title', true); ?>の詳細を見る</a>
    <h1 class="detail-title white">募集職種</h1>
    <ul class="detail-ul">
      <li><?php echo get_post_meta($post->ID, 'job-category1', true); ?></li>
      <li><?php echo get_post_meta($post->ID, 'job-category2', true); ?></li>
      <li><?php echo get_post_meta($post->ID, 'job-category1', true); ?></li>
    </ul>
    <div class="about-panel">
      <h2><?php echo get_post_meta($post->ID, 'job-category1', true); ?>について</h2>
      <ul>
        <?php for($i = 1;$i <= 4;$i ++): ?>
        <li style="<?php if(!get_post_meta($post->ID, 'job-question'.$i, true)) echo "display: none" ?>">
          <h3><?php echo get_post_meta($post->ID, 'job-question'.$i, true); ?></h3>
          <p><?php echo get_post_meta($post->ID, 'answer'.$i, true); ?></p>
        </li>
        
        <?php endfor; ?>
      </ul>
    </div>
    <div class="about-panel">
      <h2><?php echo get_post_meta($post->ID, 'job-category2', true); ?>について</h2>
      <ul>
        <?php for($i = 5;$i <= 8;$i ++): ?>
        <li style="<?php if(!get_post_meta($post->ID, 'job-question'.$i, true)) echo "display: none" ?>">
          <h3><?php echo get_post_meta($post->ID, 'job-question'.$i, true); ?></h3>
          <p><?php echo get_post_meta($post->ID, 'answer'.$i, true); ?></p>
        </li>
        
        <?php endfor; ?>
      </ul>
    </div>
    <div class="about-panel">
      <h2><?php echo get_post_meta($post->ID, 'job-category3', true); ?>について</h2>
      <ul>
        <?php for($i = 9;$i <= 12;$i ++): ?>
        <li style="<?php if(!get_post_meta($post->ID, 'job-question'.$i, true)) echo "display: none" ?>">
          <h3><?php echo get_post_meta($post->ID, 'job-question'.$i, true); ?></h3>
          <p><?php echo get_post_meta($post->ID, 'answer'.$i, true); ?></p>
        </li>
        
        <?php endfor; ?>
      </ul>
    </div>
    <a class="job-link" href="<?php echo get_post_meta($post->ID, 'job-link', true); ?>"><?php echo get_post_meta($post->ID, 'job-title', true); ?>の詳細を見る</a>
  </section>

</main>
<?php get_footer(); ?>