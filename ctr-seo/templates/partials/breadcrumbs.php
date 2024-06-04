<nav class="ctr-mb-10">
  <ol class="ctr-list-reset ctr-list-none ctr-rounded ctr-border-solid ctr-border-gray-500 ctr-flex ctr-text-grey ctr-bg-gray-100">
  <?php if(isset($vehicle_type)) { ?>  
  <li class="ctr-px-6 ctr-bg-gray-100 ctr-min-h-16 ctr-pt-5 ctr-pb-5"><a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo ucfirst(Ctr_Translator::translate_vehicle_type($vehicle_type)); ?></a></li>
    <?php } if(isset($brand)) { ?>
    <li class="ctr-pt-5 ctr-bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg" class="ctr-h-5 ctr-w-5 ctr-fill-gray-600" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></li>
    <li class="ctr-px-6 ctr-bg-gray-100 ctr-min-h-16 ctr-pt-5 ctr-pb-5"><a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><img class="ctr-hidden lg:ctr-block ctr-left-6 ctr-w-6 ctr-h-6 ctr-float-left ctr-mr-5 ctr-rounded-full ctr-shadow-lg" src="<?php echo $brand['image']; ?>"><?php echo $brand['name']; ?></a></li>
    <?php } if(isset($serie)) { ?>
    <li class="ctr-pt-5 ctr-bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg" class="ctr-h-5 ctr-w-5 ctr-fill-gray-600" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></li>
    <li class="ctr-px-6 ctr-bg-gray-100 ctrmin--h-16 ctr-pt-5 ctr-pb-5"><a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] ?>/<?php echo $serie['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><img src="<?php echo $serie['image']; ?>" class="ctr-hidden lg:ctr-block ctr-left-6 ctr-w-10 ctr-h-10 ctr-float-left ctr-mr-5 ctr--mt-4"><?php echo $serie['name']; ?></a></li>
    <?php } if(isset($model)) { ?>
    <li class="ctr-pt-5 ctr-bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg" class="ctr-h-5 ctr-w-5 ctr-fill-gray-600" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></li>
    <li class="ctr-px-6 ctr-bg-gray-100 ctr-min-h-16 ctr-pt-5 ctr-pb-5"><a href="<?php ctr_print_full_start_url(); ?><?php echo Ctr_Translator::translate_vehicle_type($vehicle_type) ; ?>/<?php echo $brand['slug'] ?>/<?php echo $serie['slug']; ?>/<?php echo $model['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-no-underline ctr-text-gray-700"><?php echo $model['name']; ?></a></li>
    <?php } if(isset($engine)) { ?>
    <li class="ctr-pt-5 ctr-bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg" class="ctr-h-5 ctr-w-5 ctr-fill-gray-600" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></li>
    <li class="ctr-px-6 ctr-bg-gray-100 ctr-min-h-16 ctr-pt-5 ctr-pb-5"><a href="#" class="ctr-no-underline ctr-text-gray-700"><?php echo $engine['name']; ?> <span class="ctr-hidden lg:ctr-block ctr-float-right ctr-pl-5"> ( <?php echo $engine['hp']; ?> <?php _e('HP', 'ctr'); ?> / <?php echo $engine['nm']; ?> <?php _e('Nm', 'ctr'); ?>)</span></a></li>
    <?php } ?>
  </ol>
</nav>