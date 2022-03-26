<?php  

$Loading = get_option('loading');
?>

<div class="loading">
  <svg width="100%" height="100vh">
    <defs>
  
    </defs>
    <rect x="0" y="0" width="360" height="" fill="#000" />
    <text x="25%" y="50%" class="my-text">
      <?php echo $Loading; ?>
    </text>
    <text x="12%" y="50%" class="my-text-sp">
      <?php echo $Loading; ?>
    </text>
    <text x="16%" y="50%" class="my-text-md">
      <?php echo $Loading; ?>
    </text>
    <text x="21%" y="50%" class="my-text-ls">
      <?php echo $Loading; ?>
    </text>
  </svg>
</div>