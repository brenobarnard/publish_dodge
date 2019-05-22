<a class="icon ion-md-arrow-back navigation-icon absolute-form" href="<?php echo $form_config['back_page'] ?>"></a>
<div class="form-container">
  <div class="title">
    <span><?php echo $form_config['title'] ?></span>
  </div>
  <?php
  echo form_open_multipart($form_config['method'], $form_config['attributes']);
  echo form_label($form_config['input']['label'], $form_config['input']['id']);
  echo form_input(
    [
      'id' => $form_config['input']['id'], 
      'name' => $form_config['input']['name'],
      'class' => 'form-input', 
      'placeholder' => $form_config['input']['placeholder'], 
      'maxlength' => $form_config['input']['maxlength']
    ],
    set_value($form_config['input']['name'])
  );
  ?>
  <div class="form-buttons">
    <input type="reset" name="clear_button" value="clear">
    <input type="submit" name="submit_button" value="<?php echo $form_config['submit_text']; ?>">
  </div>

  <?php
  echo form_close();
  ?>

</div>