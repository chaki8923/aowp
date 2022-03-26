<?php
 $Loading = get_option('loading');
?>

<div class="loading" style="background-color: <?php echo $Loading; ?>;">
  <div class="loader">
    <span style="background-color: <?php echo $Loading; ?>;"></span>
  Loading...</div>
</div>