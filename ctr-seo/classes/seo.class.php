<?php
class CTR_seo_extra {

    private $helper;

    public function __construct() {

        // Check if the page is valid
        if (!$this->is_valid()) { return; }

        // Include hooks
        $this->include_hooks();

        // Helpers
        $this->helper = new CTR_seo_helper();
        
    }

    public function include_hooks() {

        add_filter('document_title_parts', [$this, 'ctr_title'], 11, 1);
        add_action('wp_head', [$this, 'ctr_description']);
        add_action('wp_head', [$this, 'ctr_h1']);
        //add_action('get_footer', [$this, 'ctr_footer']); // Footer text right before footer
        add_action('wp_head', [$this, 'ctr_footer_global']); // Footer text set as a global variable

    }

    // Set page title
    public function ctr_title( $title ) {
        $new_title = $this->get_page_seo()['title'];

        if( !$new_title ) { return $title; }
	    return ['title' => $new_title];
    }

    // Set page description
    public function ctr_description() {
        $description = $this->get_page_seo()['description'];
        if( $description ) {
            echo "<meta name='description' content='{$description}' />";
        }
    }

    // Set page H1
    public function ctr_h1() {
        global $seo_h1;
        $seo_h1 = $this->get_page_seo()['H1'];
    }

    // Set footer text
    public function ctr_footer() {
        $text = $this->get_page_seo()['text'];
        if( $text ) {
            echo "<div class='ctr-container ctr-mx-auto ctr-footer-seo'>{$text}</div>";
        }
    }

    // Set footer text as a global variable
    public function ctr_footer_global() {
        global $seo_text;
        $seo_text = $this->get_page_seo()['text'];
    }


    public function get_page_seo() {

        // From the main plugin
        $data = ctr_prepare_data();

        // Collect available values
        $seo_fields['brand'] = $data['brand']['name'];
        $seo_fields['serie'] = $data['serie']['name'];
        $seo_fields['model'] = $data['model']['name'];
        $seo_fields['engine'] = $data['engine']['name'];

        // Get post if exists
        $seo = $this->helper->get_brand_seo( $seo_fields );

        // Get default SEO fields
        $default_params = $this->get_default_seo_fields();

        if( $seo ) {
            $params = $seo;
        } else {
            $params = $default_params;
        }

        // if some of the params is empty then we use default
        foreach( $params as $key=>$value ) {
            if( $value == '' ) {
                $params[$key] = $default_params[$key];
            }
        }

        // Prepare title, description, etc.
        foreach( $params as $key=>$value ) {
            $params[$key] = $this->prepare_seo_title( $value, $seo_fields );
        }

        // Filter params accordingly to selected options by Admin
        $params = $this->filter_params_list( $params );

        return $params;

        echo "<pre>";
        print_r($params);
        echo "</pre>";
        

    }

    private function filter_params_list( $params ) {

        // From Admin settings
        $setlist = get_option('ctr_seo_archive_setlist');

        foreach( $params as $key=>$value ) {
            if( !in_array( $key, $setlist ) ) { unset( $params[$key] ); }
        }

        

        return $params;

    }

    public function is_valid() {

        if (
            strpos($_SERVER['REQUEST_URI'], '/chiptuning/autos/') !== false &&
            $_SERVER['REQUEST_URI'] != '/chiptuning/autos/'
            ) {
            return true;
        }

    }

    public static function prepare_seo_title( $string, $data ) {

        // Replace variables
        foreach( $data as $slug=>$title ) {
            $string = str_replace( '{'.$slug.'}', $title, $string );
        }

        // Remove extra empty symbols
        $string = preg_replace('/\s+/', ' ', $string);

        return $string;

    }

    public function get_default_seo_fields() {

        $params = array(
            'title' => get_option('ctr_seo_archive_title'),
            'description' => get_option('ctr_seo_archive_description'),
            'keywords' => get_option('ctr_seo_archive_keywords'),
            'H1' => get_option('ctr_seo_archive_h1'),
            //'text_header' => $brand_title,
            'text' => get_option('ctr_seo_archive_text')
        );

        return $params;

    }  

}

