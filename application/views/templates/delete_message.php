<a class="icon ion-md-arrow-back navigation-icon absolute-form" href="<?php echo $form_config['back_page'] ?>"></a>
<div class="form-container">
  <div class="title">
    <span>Are you sure?</span>
  </div>
  <?php
    echo form_open_multipart($form_config['method'], $form_config['attributes']);
  ?>
  <div class="form-buttons">
    <a href="<?php echo $form_config['back_page']?>">cancel</a>
    <input type="submit" name="submit_button" value="<?php echo $form_config['submit_text']; ?>">
  </div>

  <?php
  echo form_close();
  ?>
</div>