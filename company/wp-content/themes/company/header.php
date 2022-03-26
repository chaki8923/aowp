<?php $Entry_link = get_option('entry_link'); //採用リンク ?>
<body <?php body_class(); ?>>
  <a href="<?php echo $Entry_link; ?>" class="oubo">ENTRY</a>

  <div class="bar">
    <span class="bar-top"></span>
    <span class="bar-middle"></span>
    <span class="bar-bottom"></span>
  </div>
  <!--------------- PCヘッダー ----------------->
  <?php get_template_part('top-menu', 'topmenu'); ?>