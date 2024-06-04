<?php
/**
 * The main displaying template
 *
 * This template can be overridden by copying it to yourtheme/chiptuningreseller/vehicle_types.php.
 *
 * @package     ChiptuningReseller\Templates
 * @version     6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if(isset($vehicle_types)) {
?>
<!-- START TEMPLATE -->
vehicle_types.php
<div class="ctr-container ctr-mx-auto">
<?php ctr_get_template('partials/breadcrumbs.php', []); ?>
    <p class="ctr-text-lg ctr-text-center"><?php _e('Select a vehicle type', 'ctr'); ?></p>
    <div class="ctr-grid ctr-grid-flow-col md:ctr-grid-cols-max lg:ctr-grid-cols-max ctr-pl-8 ">
    <?php foreach($vehicle_types as $vehicle_type) { ?>
        <div class="col ctr-m-5 ctr-transition ctr-grayscale hover:ctr-grayscale-0 hover:ctr-bg-gray-200 ctr-py-2 ctr-border-gray-50 ctr-border-2">
            <a href="<?php echo strtolower($vehicle_type['url']) ?>" class="ctr-basis-1/8 ctr-md:ctr-basis-1/4 ctr-text-gray-600 ctr-text-center">
            <img class="ctr-h-24 ctr-w-24 ctr-mx-auto" loading="lazy" data-src="<?php echo ctr_get_assets_url() . $vehicle_type['slug']; ?>.png"  src="<?php echo ctr_get_assets_url() . $vehicle_type['slug']; ?>.png" alt="<?php echo $vehicle_type['name']; ?>" title="<?php echo $vehicle_type['name']; ?>">
                <div><?php echo $vehicle_type['name']; ?></div>
            </a>
        </div>
    <?php } ?>
</div>
</div>
<!-- END TEMPLATE -->
<?php 
}
?>