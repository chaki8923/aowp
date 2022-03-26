<?php
require('head.php');

$Main_img = [];
$Slide_text = [];
    for($i = 1;$i <= 8;$i ++){

      $Main_img[$i] =  get_option('main_view'.$i);
      $Slide_text[$i] =  get_option('slide_text'.$i);
     
    }
$About_title = get_option('about_title');
$Work_title = get_option('work_title');
$Info_title = get_option('info_title');
$About_text = get_option('about_text');
$Work_text = get_option('work_text');
$About_text2 = get_option('about_text2');
$Voice_title = get_option('voice_title');
$Blog_title = get_option('blog_title');


get_header();
?>

<body>
  
  <div class="demo-cont">
    <!-- slider start -->
    <div class="fnc-slider example-slider">
      <div class="fnc-slider__slides">
        <!-- slide start -->
        <div class="fnc-slide m--blend-green m--active-slide">
          <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[1]; ?>');">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[1]; ?>');"></div>
            </div>
            <div class="fnc-slide__content">
              <h2 class="fnc-slide__heading">
                <div class="fnc-slide__heading-line">
                  <span><?php echo $Slide_text[1]; ?></span>
                </div>
               
              </h2>
              <button type="button" class="fnc-slide__action-btn">
                
              </button>
            </div>
          </div>
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-dark">
          <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[2]; ?>');">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[2]; ?>');"></div>
            </div>
            <div class="fnc-slide__content">
              <h2 class="fnc-slide__heading">
                <div class="fnc-slide__heading-line">
                  <span><?php echo $Slide_text[2]; ?></span>
                </div>
                
              </h2>
              <button type="button" class="fnc-slide__action-btn">
            
              </button>
            </div>
          </div>
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-red">
          <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[3]; ?>');">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[3]; ?>');"></div>
            </div>
            <div class="fnc-slide__content">
              <h2 class="fnc-slide__heading">
                <div class="fnc-slide__heading-line">
                  <span><?php echo $Slide_text[3]; ?></span>
                </div>
                
              </h2>
              <button type="button" class="fnc-slide__action-btn">
                
              </button>
            </div>
          </div>
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-blue">
          <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[4]; ?>');">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[4]; ?>');"></div>
            </div>
            <div class="fnc-slide__content">
              <h2 class="fnc-slide__heading">
                <div class="fnc-slide__heading-line">
                  <span><?php echo $Slide_text[4]; ?></span>
                </div>
                
              </h2>
              <button type="button" class="fnc-slide__action-btn">
        
              </button>
            </div>
          </div>
        </div>
        <!-- slide end -->
      </div>
      <nav class="fnc-nav">
        <div class="fnc-nav__bgs">
          <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
          <div class="fnc-nav__bg m--navbg-dark"></div>
          <div class="fnc-nav__bg m--navbg-red"></div>
          <div class="fnc-nav__bg m--navbg-blue"></div>
        </div>
        <div class="fnc-nav__controls">
          <button class="fnc-nav__control">
            SLIDE1
            <span class="fnc-nav__control-progress"></span>
          </button>
          <button class="fnc-nav__control">
            SLIDE2
            <span class="fnc-nav__control-progress"></span>
          </button>
          <button class="fnc-nav__control">
            SLIDE3
            <span class="fnc-nav__control-progress"></span>
          </button>
          <button class="fnc-nav__control">
            SLIDE4
            <span class="fnc-nav__control-progress"></span>
          </button>
        </div>
      </nav>
    </div>
    <!-- slider end -->
    <div class="demo-cont__credits">
      <div class="demo-cont__credits-close"></div>
      <h2 class="demo-cont__credits-heading">Made by</h2>
      <img src="img/stylist.jpg" alt="" class="demo-cont__credits-img" />
      <h3 class="demo-cont__credits-name">Nikolay Talanov</h3>
      <a href="https://codepen.io/suez/" target="_blank" class="demo-cont__credits-link">My codepen</a>
      <a href="https://twitter.com/NikolayTalanov" target="_blank" class="demo-cont__credits-link">My twitter</a>
      <h2 class="demo-cont__credits-heading">Based on</h2>
      <a href="https://dribbble.com/shots/2375246-Fashion-Butique-slider-animation" target="_blank" class="demo-cont__credits-link">Concept by Kreativa Studio</a>
      <h4 class="demo-cont__credits-blend">Global Blend Mode</h4>
      <div class="colorful-switch">
        <input type="checkbox" class="colorful-switch__checkbox js-activate-global-blending" id="colorful-switch-cb" />
        <label class="colorful-switch__label" for="colorful-switch-cb">
          <span class="colorful-switch__bg"></span>
          <span class="colorful-switch__dot"></span>
          <span class="colorful-switch__on">
            <span class="colorful-switch__on__inner"></span>
          </span>
          <span class="colorful-switch__off"></span>
        </label>
      </div>
    </div>
  </div>
  <main class="main">
    <section class="about">
      <h2 class="title"><?php echo $About_title; ?></h2>
      <div class="about-text">
        <p>
          <?php echo $About_text; ?>
        </p>
      </div>
      <div class="about-threeClunum">
        <?php for($i = 5;$i <= 7;$i ++): ?>
        <img src="<?php echo $Main_img[$i]; ?>" alt="">
        <?php endfor; ?>
      </div>
      <div class="about-text">
        <p>
        <?php echo $About_text2; ?>
        </p>
      </div>
      <div class="link">
        <a href="<?php echo get_page_link(55); ?>"><?php echo $About_title; ?></a>
      </div>
    </section>
    <section class="work">
      <h2 class="title"><?php echo $Work_title; ?></h2>
      <div class="work-text">
        <p>
        <?php echo $Work_text; ?>
        </p>
      </div>
      <div class="work-area">
      <?php
        $args = array(
          'post_type' => 'worklist', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 8
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="work-area--link js-work-link">
          <div class="work-area--panel">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="work-area--img">
            <div class="work-area--panel-text js-work-text">
              <p>
              <?php echo get_post_meta($post->ID, 'work-comment', true); ?>
              </p>
            </div>
            <h2 class="work-area--panel-title js-work-title"><?php echo get_post_meta($post->ID, 'worklist', true); ?></h2>
          </div>
        </a>
        <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
        

      </div>
      <div class="link">
        <a href="<?php echo get_page_link(39); ?>"><?php echo $Work_title; ?>一覧へ</a>
      </div>
    </section>

    <section class="info">
      <div class="info-filter" style="background-image: url('img/pari10.jpg');"></div>
      <h2 class="title"><?php echo $Info_title; ?></h2>
      <div class="info-inner">
      <?php
        $args = array(
          'post_type' => 'information', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 8
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="info-inner--panel">
          <div class="info-inner--panel-img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="js-info-img">
          </div>
          <div class="info-inner--panel-text">
            <p>
              <?php echo get_post_meta($post->ID, 'info-comment', true)  ?>
            </p>
            <span><?php echo get_post_time('Y.m.d'); ?></span>
          </div>
        </a>
        <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
      </div>
      <div class="link">
        <a href=""><?php echo $Info_title; ?>一覧へ</a>
      </div>
    </section>

    <span class="sp-flg">a</span>
    <section class="voice">
      <div class="voice-filter" style="background-image: url('<?php echo $Main_img[8]; ?>');"></div>

      <h2 class="title"><?php echo $Voice_title; ?></h2>
      <div class="voice-slider">
        
       <?php  dynamic_sidebar('voice_widget'); ?>
        
      </div>

    </section>
    <section class="blog">
      <h2 class="title"><?php echo $Blog_title; ?></h2>
      <div class="blog-inner">
      <?php
        $args = array(
          'post_type' => 'post', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 4
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
     
        <a href="<?php the_permalink(); ?>" class="blog-panel">
          <span class="blog-panel--date"><?php echo get_post_time('Y.m.d'); ?></span>
          <div class="blog-panel--img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="js-blog-img">
            <h2 class="blog--slidetext js-blog-title">
              <?php the_title(); ?>
            </h2>
          </div>
          <div class="blog-panel--text">
            <p>
              
            </p>
          </div>
        </a>
        <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
        
        
      </div>
      <div class="link">
        <a href=""><?php echo $Blog_title; ?>一覧へ</a>
      </div>
    </section>

    <section class="address">
      <h2 class="title">
        ADDRESS
      </h2>
      <div class="address-map">
        <span class="address-title">アクセス</span>
        <div class="address-map--google">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12993.869904348052!2d139.35516305!3d35.49271735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60190132486a0615%3A0x5e89d3bc97b21873!2z44Op44O844Oh44Oz44G-44GT44Go5bGLIOWOmuacqOWxsemam-W6lw!5e0!3m2!1sja!2sjp!4v1632284432929!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="address-text">
          <p class="address-text--inner">
            <span class="bold">Chaki`sミュージアム</span>
            <span>〒532-0011 大阪府大阪市淀川区西中島6丁目8-23 ビープラスビル7F</span>
            <span>開催時間 / 午前 8:00 - 13:00　午後 14:30 - 18:30（土曜は午前のみ）　休館日 / 土曜午後・日曜・祝日</span>

          </p>
        </div>
        <span class="address-title">開催情報</span>
        <table class="address-table">
          <tbody>
            <tr>
              <th>開催期間</th>
              <td>2022.01.28～2022.02.14</td>
            </tr>
            <tr>
              <th>開催期間</th>
              <td>2022.01.28～2022.02.14</td>
            </tr>
            <tr>
              <th>開催期間</th>
              <td>2022.01.28～2022.02.14</td>
            </tr>
            <tr>
              <th>開催期間</th>
              <td>2022.01.28～2022.02.14</td>
            </tr>
            <tr>
              <th>開催期間</th>
              <td>2022.01.28～2022.02.14</td>
            </tr>
          </tbody>
        </table>

      </div>
    </section>
    <section class="footer">
      <div class="footer-top" style="background-image: url('img/studio.jpg');">
        <div class="footer-top--inner">
          <h2 class="footer-top--title">CHAKI‘ｓ　Template</h2>
          <ul class="footer-top--list">
            <li class="footer-top--item"><a href="" class="footer-top--link"><img src="img/twitter.svg" alt=""></a></li>
            <li class="footer-top--item"><a href="" class="footer-top--link"><img src="img/instagram.svg" alt=""></a></li>
            <li class="footer-top--item"><a href="" class="footer-top--link"><img src="img/facebook.svg" alt=""></a></li>
          </ul>
          <p class="footer-top--text">〒532-0011 大阪府大阪市淀川区西中島6丁目8-23 ビープラスビル7F</p>
        </div>
      </div>
      <div class="footer-middle">
        <ul class="footer-middle--list">
          <li class="footer-middle--item"><a href="" class="footer-middle--link">ABOUT</a></li>
          <li class="footer-middle--item"><a href="" class="footer-middle--link">WORK</a></li>
          <li class="footer-middle--item"><a href="" class="footer-middle--link">INFOMATION</a></li>
          <li class="footer-middle--item"><a href="" class="footer-middle--link">BLOG</a></li>
          <li class="footer-middle--item"><a href="" class="footer-middle--link">CONTAVT</a></li>
        </ul>
      </div>
      <div class="footer-bottom">
        <p class="footer-bottom--text">©chakiryou orijinaltheme from ryou chaki</p>
        <div class="top-return">
          <img src="img/arrow-top.png" alt="">
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>