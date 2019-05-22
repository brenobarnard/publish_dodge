
<a class="icon ion-md-arrow-back navigation-icon absolute-form" href="<?php echo $form_config['back_page'] ?>"></a>
<div class="form-container">
  <div class="title">
    <span><?php echo $form_config['title'] ?></span>
  </div>
  <?php
    echo form_open_multipart($form_config['method'], $form_config['attributes']);
    echo form_hidden('car_id');
    echo '<div class="tip">
            <span>The car photo must be bigger or equals to <b>1024x768</b> and equals or smaller than <b>1920x1080</b>.
            Preferred sizes: <b>1024x768</b>, <b>1280x720</b>, <b>1440x900</b>, <b>1920x1080</b>.</span>
          </div>';
    echo form_upload(['name' => 'img_upload', 'id' => 'upload_button']);
    echo form_label('Upload Car Photo', 'upload_button', ['class' => 'custom-upload']);
    echo form_label('Model:', 'model');
    echo form_input(
      ['id' => 'model', 'name' => 'model', 'class' => 'form-input', 'placeholder' => 'Car Model', 'maxlength' => '200']
    );
    echo form_label('Year:', 'year');
    echo form_input(
      ['id' => 'year', 'name' => 'year', 'class' => 'form-input', 'placeholder' => 'Year', 'maxlength' => '4']
    );
    
  ?>

  <label for="colors">Colors:</label>
  <div class="radios" id="colors">
    <div class="error inline">No colors available :(, you need to register a color first...</div>
  </div>
  <label for="categories">Categories:</label>
  <div class="radios" id="categories">
    <div class="error inline">No categories available :(, you need to register a category first...</div>
  </div>
  <div class="form-buttons">
    <input type="reset" name="clear_button" value="clear">
    <input type="submit" name="submit_button" value="<?php echo $form_config['submit_text']; ?>">
  </div>

  <?php
  echo form_close();
  ?>

</div>