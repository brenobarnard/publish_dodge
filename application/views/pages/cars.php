<div class="title">
  <span><?php echo $title ?></span>
</div>
<div class="tip">
  <span><b><i class="icon ion-md-help-circle-outline"></i></b> Put the mouse cursor over the vehicle to see details.</span>
</div>
<div class="cars-container">

  <?php foreach ($cars as $car_item): ?>
    <div class="car-item">
      <div class="car-description">
        <span><b>Model: </b><span class="car-model"><?php echo $car_item['model'] ?></span></span>
        <span><b>Year: </b><?php echo $car_item['year'] ?></span>
        <span><b>Color: </b><?php echo $car_item['color'] ?></span>
        <span><b>Category: </b><?php echo $car_item['category'] ?></span>
      </div>
      <img src="<?php echo base_url('upload/'.$car_item['img'].'.jpg') ?>" alt="Foto de <?php echo $car_item['model']?>">
    </div>
  <?php endforeach; ?>
  
  <div style="width: fill-availabe"></div>
</div>


