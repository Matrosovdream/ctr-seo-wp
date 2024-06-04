<div id="stageAccordion" class="ctr-mb-4 ctr-m-2">
  <?php
  $i = 0;
  foreach ($stages as $stage) {
    if (isset($stage['in_development'])) { ?><span class="ctr-text-l"></span><?php } elseif (stripos($stage['name'], 'stage') !== false) { $firstItem = $firstItem ?? true; ?>
      <div class="ctr-accordion-item ctr-bg-white ctr-border border-gray-200">
        <h2 class="ctr-accordion-header ctr-m-2 ctr-text-left ctr-pl-4 ctr-cursor-pointer" id="heading<?php echo strtoupper($stage['name']); ?>" onclick="toggleAccordion('collapse<?php echo strtoupper($stage['name']); ?>')">
            <?php echo strtoupper($stage['display_name']); ?> <div class="ctr-float-right">+<span class="ctr-increment-counter ctr-transition-all ctr-delay-800"><?php echo $stage['data']['hp_tuning'] - $stage['data']['hp_ori']; ?></span> <?php _e('HP', 'ctr'); ?> / +<span class="ctr-increment-counter ctr-transition-all ctr-delay-800"><?php echo $stage['data']['nm_tuning'] - $stage['data']['nm_ori']; ?></span> <?php _e('Nm', 'ctr'); ?></div>
        </h2>
        <div id="collapse<?php echo strtoupper($stage['name']); ?>" style="height:<?php echo $firstItem ? 260 : 0; ?>px" class="ctr-overflow-hidden ctr-accordion-collapse ctr-collapse ctr-transition-all ctr-duration-500 ctr-ease-in-out ctr-show" aria-labelledby="heading<?php echo strtoupper($stage['name']); ?>"
          data-bs-parent="#stageAccordion">
          <div class="ctr-accordion-body ctr-py-4 ctr-px-5">
      <div class="ctr-flex ctr-flex-row  hover:ctr-bg-gray-50 ctr-text-gray-600">
        <!-- <div class="ctr--rotate-90 ctr-basis-2/12 ctr-text-xl"><?php echo strtoupper($stage['name']); ?></div> -->
        <div class="ctr-basis-3/12 ctr-text-base">
          <div class="ctr-h-8"></div>
          <div class="ctr-h-16 ctr-w-full ctr-flex">
          <div class="ctr-h-16 ctr-w-2/3 ctr-pt-5 ctr-pl-5 ctr-bg-gray-100 ">
          <?php _e('HP', 'ctr'); ?>
          </div>
              <div class="ctr-h-16 ctr-w-1/3 ctr-float-right arrow-div ctr-bg-gray-100 ">
              </div>
          </div>
          <div class="ctr-h-16 ctr-w-full ctr-flex ctr-mt-1">
          <div class="ctr-h-16 ctr-w-2/3 ctr-pt-5 ctr-pl-5 ctr-bg-gray-100 ">
          <?php _e('Nm', 'ctr'); ?>
          </div>
              <div class="ctr-h-16 ctr-w-1/3 ctr-float-right arrow-div ctr-bg-gray-100 ">
              </div>
          </div>
        </div>
        <div class="ctr-basis-4/12 ctr-text-base">
          <div class="ctr-h-8 ctr-text-center"><?php _e('Stock', 'ctr'); ?></div><div class="ctr-h-16 ctr-pt-5 ctr-text-center"><?php echo $stage['data']['hp_ori']; ?></div><div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100 ctr-text-center"><?php echo $stage['data']['nm_ori']; ?></div>
        </div>
        <div class="ctr-basis-4/12 ctr-text-base "><div class="ctr-h-8  ctr-text-center"><?php _e('Tuning', 'ctr'); ?></div><div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100  ctr-text-center"><?php echo $stage['data']['hp_tuning']; ?></div><div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100  ctr-text-center"><?php echo $stage['data']['nm_tuning']; ?></div></div>
        <div class="ctr-basis-4/12 ctr-text-base"><div class="ctr-h-8  ctr-text-center"><?php _e('Difference', 'ctr'); ?></div><div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100  ctr-text-center"><?php echo $stage['data']['hp_tuning'] - $stage['data']['hp_ori']; ?></div><div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100  ctr-text-center"><?php echo $stage['data']['nm_tuning'] - $stage['data']['nm_ori']; ?></div></div>
        
      </div>
      <?php if($show_price) { ?>
        <div class="ctr-flex ctr-flex-row  hover:ctr-bg-gray-50 ctr-text-gray-600">
          <div class="ctr-basis-8/12 ctr-text-base">
            <div class=""></div>
            <div class="ctr-h-16 ctr-w-full ctr-flex ctr-mt-1">
            <div class="ctr-h-16 ctr-w-full ctr-pt-5 ctr-pl-5 ctr-bg-gray-100 ">
            <?php _e('Price', 'ctr'); ?>
            </div>
                <div class="ctr-h-16 ctr-w-1/3 ctr-float-right arrow-div ctr-bg-gray-100 ">
                </div>
            </div>
          </div>
          <div class="ctr-basis-4/12 ctr-text-base"><div class="ctr-text-center"></div>
            <div class="ctr-h-16 ctr-pt-5 hover:ctr-bg-gray-100  ctr-text-center"><?php echo $currency; ?> <?php echo get_option(CTR_OPT_PREFIX . 'fixed_price_' . $stage['name'], null) ? get_option(CTR_OPT_PREFIX . 'fixed_price_' . $stage['name']) :  $stage['price']; ?></div>
          </div>
        </div>
      <?php } ?>
      </div>
      </div>
      </div>
  <?php $firstItem = false; 
  }   
  } ?>
</div>
<div class="table-responsive stageTableBlock">
</div>