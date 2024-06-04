<?php

/**
 * Series template
 *
 * This template can be overridden by copying it to yourtheme/chiptuningreseller/series.php.
 *
 * @package     ChiptuningReseller\Templates
 * @version     6.0.0
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

<?php ctr_get_template('partials/breadcrumbs.php', ['vehicle_type' => $vehicle_type, 'brand' => $brand]); ?>
    <p class="ctr-text-lg"><img class="ctr-hidden lg:ctr-block ctr-left-6 ctr-w-10 ctr-h-10 ctr-float-left ctr-mr-5 ctr-rounded-full ctr-shadow-lg" src="<?php echo $brand['image']; ?>"><?php echo $brand['name']; ?></p>
	<em><?php if(isset($brand['seo_description'])) { echo $brand['seo_description']; } ?></em><br/><br/>
	<p class="ctr-text-lg"><?php esc_html_e('Select a serie for', 'ctr'); ?> <?php echo $brand['name']; ?></p>
    <div class="ctr-grid ctr-grid-cols-2 md:ctr-grid-cols-4 lg:ctr-grid-cols-6 ctr-pl-8 ctr-pr-8 ">
        <?php foreach ($series as $serie) { ?>
            <div class="col ctr-m-5 ctr-transition ctr-grayscale hover:ctr-grayscale-0 hover:ctr-bg-gray-200 ctr-py-2 ctr-border-gray-50 ctr-border-2">
                <a href="<?php echo $serie['url']; ?>" class="ctr-basis-1/8 ctr-md:ctr-basis-1/4 ctr-text-gray-600 ctr-text-center">
                    <img class="ctr-h-28 ctr-w-30 ctr-mx-auto ctr-mb-2" loading="lazy" data-src="<?php echo $serie['image_url']; ?>" src="<?php echo $serie['image_url']; ?>" alt="<?php echo $serie['name']; ?>" title="<?php echo $serie['name']; ?>">
                    <div><?php echo $serie['name']; ?></div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<div class="ctr-text-center ctr-mt-10 ctr-mb-10">
    <a class="ctr-px-6 ctr-py-3 ctr-text-gray-100 ctr-no-underline ctr-bg-gray-500 ctr-rounded hover:ctr-bg-gray-600 hover:ctr-text-gray-200 visited:ctr-text-gray-300" href="<?php ctr_print_full_start_url(); ?><?php echo $vehicle_type  . ctr_get_trailing_slash(); ?>" class="ctr-bg-gray-300 ctr-hover:bg-gray-400 ctr-text-gray-800 ctr-font-bold ctr-py-2 ctr-px-4 ctr-rounded inline-flex ctr-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;display:inline-block" class="ctr--mt-1 ctr-mr-5 ctr-fill-white" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        <?php _e('Back to brand selection', 'ctr'); ?>
    </a>
</div>

<div class='ctr-container ctr-mx-auto ctr-footer-seo'>
    <?php echo $seo_text; ?>
</div>


<!-- END TEMPLATE -->