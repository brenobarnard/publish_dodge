<div class="admin-container">
  <div class="table-title">
    <span>Categories</span>
    <div class="button-group">
      <a class="admin-button secondary" href="/index.php/admin_colors"><i class="icon ion-md-albums"></i> See Colors</a>
      <a class="admin-button secondary" href="/index.php/admin"><i class="icon ion-md-albums"></i> See cars</a>
      <a class="admin-button primary" href="/index.php/admin_categories/add_category"><i class="icon ion-md-add"></i> New Category</a>
    </div>
  </div>
  <div class="cards-container">
    <?php if(count($categories) == 0): ?>
      <div class="error absolute">No categories available yet...:(</div>
    <?php endif; ?>
    <?php foreach ($categories as $category) : ?>
      <div class="cc-card">
        <span><?php echo $category['CATEGORY'] ?></span>
        <span>
          <a class="admin-icon-button" href="<?php echo '/index.php/admin_categories/delete_category/'.$category['ID']?>"><i class="icon ion-md-trash"></i></a>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>