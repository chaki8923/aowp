<?php

require('head.php');
require('getplugin.php');

$position = get_post_meta($post->ID, 'position', true);
?>
<?php if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}

get_header();
?>
<!-- ここから -->
<section class="staff-card">
  <svg id="icons" xmlns="http://www.w3.org/2000/svg">
    <symbol id="icon-arrow" viewBox="0 0 476.213 476.213">
      <polygon fill="inherit" points="347.5,324.393 253.353,418.541 253.353,0 223.353,0 223.353,419.033 128.713,324.393 107.5,345.607 
      238.107,476.213 368.713,345.606 " />
    </symbol>
  </svg>


  <div class="slider-content">

    <div class="header-wrapper">
      <div class="header">
        <div class="logo-wrapper">
          <div class="logo"><span><?php the_title(); ?></div>
        </div>
        <div class="shop-wrapper"></div>
      </div>
    </div>



    <div class="slider-wrapper">
      <div class="slider-container">
        <div class="slide active" data-order="1">
          <div class="slide-content txt">
            <div class="txt-wrapper">
              <h2><?php echo get_post_meta($post->ID, 'one_word', true); ?></h2>
              <?php $terms = wp_get_object_terms($post->ID, 'staff-cat');
              $term = $terms[0]->name; ?>
              <span class="subtitle"><?php echo $term; ?></span>
              <p class="excerpt"><?php the_content(); ?> </p>
            </div>
        
          </div>
          <div class="slide-content img">
            <img src="<?php the_post_thumbnail_url(); ?>" 
            alt="スタッフ画像" 
            style="<?php switch($position){
              case 1:
                echo "object-position:top;";
                break;
              case 2:
                echo "object-position:bottom;";
                break;
              case 3:
                echo "object-position:left;";
                break;
              case 4:
                echo "object-position:right;";
                break;
              case 5:
                echo "object-position:center;";
                break;
            } ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<a href="<?php echo get_permalink(74); ?>" class="staff-return">スタッフ一覧へ</a>
<!-- ここまで -->
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

<?php get_footer(); ?>