<?php
require('head.php');
require('getplugin.php');

get_header();
?>
<main class="main no-find">

<?php get_template_part('top-menu', 'topmenu'); ?>
<h1 class="neon" data-text="[404 page]">404 page</h1>
<p>お探しのページは削除されたか移動しました。</p>

</main>
<?php get_footer(); ?>