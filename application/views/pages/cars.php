<a class="icon ion-md-settings navigation-icon absolute" href="/index.php/admin"></a>
<div class="title">
  <span><?php echo $title; ?></span>
</div>
<div class="tip">
  <span><b><i class="icon ion-md-help-circle-outline"></i></b> Put the mouse cursor over the vehicle to see details.</span>
</div>
<div class="cars-container">

  <?php if(count($cars) == 0): ?>
    <div class="error absolute">No cars available yet...:(</div>
  <?php endif; ?>

  <?php foreach ($cars as $car_item): ?>
    <div class="car-item">
      <div class="car-description">
        <span><b>Model: </b><span class="car-model"><?php echo $car_item['MODEL'] ?></span></span>
        <span><b>Year: </b><?php echo $car_item['YEAR'] ?></span>
        <span><b>Color: </b><?php echo $car_item['COLOR'] ? $car_item['COLOR'] : 'Undefined' ?></span>
        <span><b>Category: </b><?php echo $car_item['CATEGORY'] ? $car_item['CATEGORY'] : 'Undefined' ?></span>
      </div>
      <div class="car-img" style="background-image: url('<?php echo base_url('upload/'.$car_item['IMG_PATH']) ?>')">.
      </div>
    </div>
  <?php endforeach; ?>
</div>


