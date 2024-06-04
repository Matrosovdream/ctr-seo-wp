<?php

/**
 * Stages template
 *
 * This template can be overridden by copying it to yourtheme/chiptuningreseller/stages.php.
 *
 * @package     ChiptuningReseller\Templates
 * @version     6.0.0
 * 
 * AVAILABLE VARS:
 * $serie       Serie object
 *      $serie['image']         The image for the current serie
 *      $serie['name']          The name of the current serie
 *      $serie['slug']          The slug of the current serie
 * $brand       Brand object
 *      $brand['image']         The image for the current brand
 *      $brand['name']          The name of the current brand
 *      $brand['slug']          The slug of the current brand
 * 
 * $model      Model object
 *      $model['image']         The image for the current model
 *      $model['name']          The name of the current model
 *      $model['slug']          The slug of the current model
 * 
 * $engine     Engines object
 *      $engine['name']          The name of the current engine
 *      $engine['slug']          The slug of the current engine
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Changing SEO variables by ctr-seo plugin
global $seo_h1, $seo_text;
if( $seo_h1 ) { $title = $seo_h1; } 
?>
<!-- START TEMPLATE -->

<div class="ctr-container ctr-mx-auto">
<?php if( $title ) { ?>
    <h1><?php echo $title; ?></h1>
<?php } ?>

    <?php ctr_get_template('partials/breadcrumbs.php', ['vehicle_type' => $vehicle_type, 'brand' => $brand, 'serie' => $serie, 'model' => $model, 'engine' => $engine, 'stages' => $stages]); ?>
    <div class="ctr-grid md:ctr-grid-cols-1 lg:ctr-grid-cols-2 ctr-gap-8">
        <div class="">
            <div class="ctr-grid md:ctr-grid-cols-2 lg:ctr-grid-cols-4 ctr-pl-8 ">
                <img class="ctr-left-6 ctr-w-28 ctr-h-28 ctr-rounded-full ctr-shadow-lg" src="<?php ctr_get_image_by_url($brand['thumbnail'], 'thumb'); ?>">
                <div class="ctr-h-28 ctr-col-span-3  ctr-mt-4 "><span class="ctr-text-xl"><?php _e('Chiptuning for', 'ctr'); ?> <?php echo $brand['name']; ?> <?php echo $serie['name']; ?></span><br /><span class="ctr-text-l"><?php echo $model['name']; ?> <?php echo $engine['name']; ?></span></div>
            </div>
        </div>
        <div>
            <div class="ctr-grid ctr-grid-cols-3 ctr-gap-2 ctr-text-left">
                <?php ctr_get_template('partials/engine-basic-data.php', ['engine' => $engine]); ?>                    
            </div>
        </div>
    </div>
    <div class="ctr-grid md:ctr-grid-cols-1 lg:ctr-grid-cols-2  ctr-gap-8">
        <div>
        <div class="ctr-mt-5 ctr-text-center ctr-place-content-center" >
            <?php ctr_get_template('partials/stage-table.php', ['stages' => $stages, 'show_price' => $show_price, 'currency' => $currency]); ?>
            </div>
        </div>
        <div class="ctr-h-90 ctr-mb-8 ctr-mx-10 ctr-transition ctr-brightness-50 hover:ctr-brightness-100 hover:ctr-bg-center ctr-bg-no-repeat ctr-bg-contain ctr-bg-center ctr-text-center" style="
      height: 250px; max-height: 250px; position: relative; text-align:center;">
            <img src="<?php if(isset($serie['media'])) { echo ctr_get_image_by_id($serie['media'][0]['id'], 'medium'); } ?>" class="ctr-pb-4" style="display: block;
        width: 350px; height: auto; margin:0 auto; margin-top:-80px;">
        </div>
    </div>
    <div class="ctr-grid md:ctr-grid-cols-2 lg:ctr-grid-cols-2 ctr-gap-8">
        <div>
            <?php if($show_ecu_info) { ctr_get_template('partials/engine-metadata.php', ['metadata' => $engine['metadata']]); } ?>
            <div class="ctr-grid md:ctr-grid-cols-2 lg:ctr-grid-cols-2 ctr-gap-8">
                <?php if(get_option(CTR_OPT_PREFIX . 'show_barchart', false) == 'yes') { ctr_get_template('partials/barchart.php', ['stages' => $stages]); }?>
            </div>
        </div>
        <div class="ctr-mt-14">
            <?php if(get_option(CTR_OPT_PREFIX . 'show_dyno', false) == 'yes') { ctr_get_template('partials/linechart.php', ['stages' => $stages]); } ?>
        
        </div>
    </div>
    <div class="ctr-grid md:ctr-grid-cols-3 lg:ctr-grid-cols-3 ctr-gap-8">

    </div>
    <div class="ctr-grid md:ctr-grid-cols-2 lg:ctr-grid-cols-2 ctr-gap-8">
    </div>
    <div class="ctr-text-center ctr-mt-10 ctr-mb-10">
        <a class="ctr-px-6 ctr-py-3 ctr-text-gray-100 ctr-no-underline ctr-bg-gray-500 ctr-rounded hover:ctr-bg-gray-600 hover:ctr-text-gray-200 visited:ctr-text-gray-300" href="<?php ctr_print_full_start_url(); ?><?php echo $vehicle_type; ?>/<?php echo $brand['slug'] ?>/<?php echo $serie['slug']; ?>/<?php echo $model['slug'] . ctr_get_trailing_slash(); ?>" class="ctr-bg-gray-300 ctr-hover:bg-gray-400 ctr-text-gray-800 ctr-font-bold ctr-py-2 ctr-px-4 ctr-rounded inline-flex ctr-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;display:inline-block" class="ctr--mt-1 ctr-mr-5 ctr-fill-white" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
            <?php _e('Back to engine selection', 'ctr'); ?>
        </a>
    </div>
</div>

<div class='ctr-container ctr-mx-auto ctr-footer-seo'>
    <?php echo $seo_text; ?>
</div>

<!-- END TEMPLATE -->