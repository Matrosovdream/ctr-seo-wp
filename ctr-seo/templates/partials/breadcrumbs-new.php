<p>

<?php if(isset($vehicle_type)) { ?>  
  <a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo ucfirst(Ctr_Translator::translate_vehicle_type($vehicle_type)); ?></a>
  <?php } if(isset($brand)) { ?>
    &gt;
  <a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo $brand['name']; ?></a>
  <?php } if(isset($serie)) { ?>
    &gt;
    <a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] ?>/<?php echo $serie['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo $serie['name']; ?></a>
  <?php } if(isset($model)) { ?>
    &gt;
    <a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] ?>/<?php echo $serie['slug']; ?>/<?php echo $model['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo $model['name']; ?></a>
  <?php } if(isset($engine)) { ?>
    &gt;
    <a href="#" class="ctr-no-underline ctr-text-gray-700"><?php echo $engine['name']; ?> ( <?php echo $engine['hp']; ?> <?php _e('HP', 'ctr'); ?> / <?php echo $engine['nm']; ?> <?php _e('Nm', 'ctr'); ?>)</a>
  <?php } ?>
</p>
