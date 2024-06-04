<?php $meta_data = ctr_process_engine_metadata($metadata); ?>
<div class="ctr-grid ctr-grid-cols-4 md:ctr-grid-cols-6 md:ctr-gap-4 ctr-text-center">
    <?php if(count($meta_data) > 1) { ?>
<div class="ctr-col-span-6 md:ctr-text-lg ctr-text-center"><?php _e('Engine details', 'ctr'); ?></div>
<?php } if(isset($meta_data['cylinder_content'])) { ?>
    <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
        <img src="<?php echo ctr_get_assets_url(); ?>cylinder-content-icon.png" class="ctr-mx-auto ctr-w-24 ctr-h-24">
        <?php echo $meta_data['cylinder_content']; ?>
    </div>
<?php } ?>
<?php if(isset($meta_data['bore_x_stroke'])) { ?>
    <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
        <img src="<?php echo ctr_get_assets_url(); ?>bore-x-stroke-icon.svg" class="ctr-mx-auto ctr-w-24 ctr-h-24">
        <?php echo $meta_data['bore_x_stroke']; ?>
    </div>
<?php } ?>
<?php if(isset($meta_data['ecu_type'])) { ?>
    <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
        <img src="<?php echo ctr_get_assets_url(); ?>ecu-icon.png" class="ctr-mx-auto ctr-w-24 ctr-h-24">
        <?php echo $meta_data['ecu_type']; ?>
    </div>
<?php } ?>
<?php if(isset($meta_data['code'])) { ?> 
    <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
        <img src="<?php echo ctr_get_assets_url(); ?>engine-code-icon.svg" class="ctr-mx-auto ctr-w-24 ctr-h-24">
        <?php echo $meta_data['code']; ?>
    </div>
<?php } ?>
<?php if(isset($meta_data['compression_ratio'])) { ?> 
    <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
        <img src="<?php echo ctr_get_assets_url(); ?>compression-icon.png" class="ctr-mx-auto ctr-w-24 ctr-h-24">
        <?php echo $meta_data['compression_ratio']; ?>
    </div>
<?php } ?>
</div>
<?php if(isset($meta_data['read_methods']) && count($meta_data['read_methods'])) { ?>
<div class="read_methods ctr-grid md:ctr-grid-cols-4 md:ctr-gap-4">
    <div class="ctr-col-span-4 ctr-text-lg ctr-text-center ctr-pt-5 ctr-border-t-2 ctr-border-gray-200"><?php _e('Read methods', 'ctr'); ?></div>
    <?php foreach($meta_data['read_methods'] as $read_method) { ?>
        <div class="ctr-transition ctr-scale-75 hover:ctr-scale-100 md:ctr-text-lg ctr-text-center">
                <img src="<?php echo ctr_get_assets_url() . 'readmethod_' . $read_method ?>.png" class="ctr-mx-auto ctr-w-75 ctr-h-75">
                </div>
    <?php } ?>
    </div>
<?php } ?>
