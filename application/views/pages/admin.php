<div class="admin-container">
  <div class="table-title">
    <span>Showroom's Cars</span>
    <div class="button-group">
      <a class="admin-button secondary" href="/index.php/admin_categories"><i class="icon ion-md-albums"></i> See Categories</a>
      <a class="admin-button secondary" href="/index.php/admin_colors"><i class="icon ion-md-albums"></i> See Colors</a>
      <a class="admin-button primary" href="/index.php/admin/add_car"><i class="icon ion-md-add"></i> new Car</a>
    </div>
  </div>
  <div class="cards-container">
    <?php if(count($cars) == 0): ?>
      <div class="error absolute">No cars available yet...:(</div>
    <?php endif; ?>
    <?php foreach ($cars as $car_item) : ?>
      <div class="car-card">
        <img src="<?php echo base_url('upload/'.$car_item['IMG_PATH']) ?>" alt="Foto de <?php echo $car_item['MODEL'] ?>">
        <span class="card-car-model"><?php echo $car_item['MODEL'] ?></span></span>
        <span><?php echo $car_item['YEAR'] ?></span>
        <span><?php echo $car_item['COLOR'] ? $car_item['COLOR'] : 'Undefined' ?></span>
        <span><?php echo $car_item['CATEGORY'] ? $car_item['CATEGORY'] : 'Undefined'?></span>
        <span>
          <a class="admin-icon-button" href="<?php echo '/index.php/admin/edit_car/'.$car_item['ID']?>"><i class="icon ion-md-create"></i></a>
          <a class="admin-icon-button" href="<?php echo '/index.php/admin/delete_car/'.$car_item['ID']?>"><i class="icon ion-md-trash"></i></a>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>