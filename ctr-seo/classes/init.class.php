<?php
class CTR_seo_init {

    public function __construct() {

        // Include classes
        $this->include_classes();

        // Activate classes
        $this->activate_classes();

        // API endpoints
        //$this->include_rest_api();

        // Hooks
        //$this->include_hooks();

        // Shortcodes
        //$this->include_shortcodes();

    }

    private function include_classes() {

        // Main classes
        require_once CTR_SEO_ABS.'/classes/seo.class.php';

        // Helpers
        require_once CTR_SEO_ABS.'/classes/ctr.helpers.php';

        // Post types
        require_once CTR_SEO_ABS.'/classes/posttypes.class.php';

        // Settings
        require_once( CTR_SEO_ABS.'/classes/settings.admin.php');

        
        /*
        
        
        // API
        require_once( DV_PLUGIN_DIR_ABS.'/classes/morgenlease.api.php');

        // Process XML retrieved from API
        require_once( DV_PLUGIN_DIR_ABS.'/classes/process_xml.class.php');
        require_once( DV_PLUGIN_DIR_ABS.'/classes/process_product.class.php');

        // Logs
        require_once( DV_PLUGIN_DIR_ABS.'/classes/logs.class.php');

        // SEO
        require_once( DV_PLUGIN_DIR_ABS.'/classes/urls.class.php');
        require_once( DV_PLUGIN_DIR_ABS.'/classes/seo.class.php');
        */
    
    }

    public function activate_classes() {

        // Main class
        new CTR_seo_extra();

    }

    private function include_shortcodes() {
        require_once( DV_PLUGIN_DIR_ABS.'/shortcodes/lease_calculator.php');
    }

    private function include_rest_api() {
        require_once( DV_PLUGIN_DIR_ABS.'/classes/endpoints.class.php' );
    }

    private function include_hooks() {
        require_once( DV_PLUGIN_DIR_ABS.'/hooks/product.hooks.php' );
    }

}

new CTR_seo_init();