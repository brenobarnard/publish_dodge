<div class="admin-container">
  <div class="table-title">
    <span>Colors</span>
    <div class="button-group">
      <a class="admin-button secondary" href="/index.php/admin_categories"><i class="icon ion-md-albums"></i> See Categories</a>
      <a class="admin-button secondary" href="/index.php/admin"><i class="icon ion-md-albums"></i> See cars</a>
      <a class="admin-button primary" href="/index.php/admin_colors/add_color"><i class="icon ion-md-add"></i> New Color</a>
    </div>
  </div>
  <div class="cards-container">
    <?php if(count($colors) == 0): ?>
      <div class="error absolute">No colors available yet...:(</div>
    <?php endif; ?>
    <?php foreach ($colors as $color) : ?>
      <div class="cc-card">
        <span><?php echo $color['COLOR'] ?></span>
        <span>
          <a class="admin-icon-button" href="<?php echo '/index.php/admin_colors/delete_color/'.$color['ID']?>"><i class="icon ion-md-trash"></i></a>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>