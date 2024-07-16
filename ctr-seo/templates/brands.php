<?php
/**
 * Brands template
 *
 * This template can be overridden by copying it to yourtheme/chiptuningreseller/brands.php.
 *
 * @package     ChiptuningReseller\Templates
 * @version     6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Changing SEO variables by ctr-seo plugin
global $seo_h1, $seo_text;
if( $seo_h1 ) { $title = $seo_h1; } 
?>
<!-- START TEMPLATE -->

    <section
        class="stages-section-header elementor-section elementor-top-section elementor-element elementor-element-4262a99 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="4262a99" data-element_type="section"
        data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f2b6da5"
                data-id="f2b6da5" data-element_type="column"
                data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                        class="elementor-section elementor-inner-section elementor-element elementor-element-46809fe elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="46809fe" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-394d931"
                                data-id="394d931" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-1bdbe21 elementor-widget elementor-widget-text-editor"
                                        data-id="1bdbe21" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-7f5dbe0 elementor-widget elementor-widget-heading"
                                        data-id="7f5dbe0" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="elementor-heading-title elementor-size-default">
                                              Selecteer een merk
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

<div class="ctr-container ctr-mx-auto">
<?php if( $title ) { ?>
    <h1><?php echo $title; ?></h1>
<?php } ?>


    <div class="ctr-grid ctr-grid-cols-2 md:ctr-grid-cols-4 lg:ctr-grid-cols-6 ctr-pl-8 ctr-pr-8 ">
    <?php foreach($brands as $brand) { ?>
        <div class="col ctr-m-5 ctr-transition ctr-grayscale hover:ctr-grayscale-0 hover:ctr-bg-gray-200 ctr-py-2 ctr-border-gray-50 ctr-border-2">
            <a href="<?php echo $brand['url']; ?>" class="ctr-basis-1/8 ctr-md:ctr-basis-1/4 ctr-sm:ctr-basis-1/2 ctr-text-gray-600 ctr-text-center">
            <img class="ctr-h-24 ctr-w-24 ctr-mx-auto ctr-mb-2" loading="lazy" data-src="<?php echo $brand['image_url']; ?>"  src="<?php echo $brand['image_url']; ?>" alt="<?php echo $brand['name']; ?>" title="<?php echo $brand['name']; ?>">
                <div><?php echo $brand['name']; ?></div>
            </a>
        </div>
    <?php } ?>
</div>
<div class="ctr-text-center ctr-mt-10 ctr-mb-10">
    <a class="ctr-px-6 ctr-py-3 ctr-text-gray-100 ctr-no-underline ctr-bg-gray-500 ctr-rounded hover:ctr-bg-gray-600 hover:ctr-text-gray-200 visited:ctr-text-gray-300" href="<?php ctr_print_full_start_url(); ?>" class="ctr-bg-gray-300 ctr-hover:bg-gray-400 ctr-text-gray-800 ctr-font-bold ctr-py-2 ctr-px-4 ctr-rounded inline-flex ctr-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;display:inline-block" class="ctr--mt-1 ctr-mr-5 ctr-fill-white" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        <?php _e('Back to vehicle type selection', 'ctr'); ?>
    </a>
</div>
</div>
<!-- END TEMPLATE -->
brands