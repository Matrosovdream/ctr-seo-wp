<?php
class CTR_posttypes {

    public function __construct() {
        add_action( 'init', [$this, 'cptui_register_my_cpts'] );
        add_action( 'add_meta_boxes', [$this, 'custom_metafields_brands'] );
        add_action( 'save_post', [$this, 'custom_metafields_brands_save_postdata'] );
    }

    public function cptui_register_my_cpts() {

        /**
        * Post Type: Brands.
        */
   
       $labels = [
           "name" => esc_html__( "Brands", "custom-post-type-ui" ),
           "singular_name" => esc_html__( "Brand", "custom-post-type-ui" ),
       ];
   
       $args = [
           "label" => esc_html__( "Brands", "custom-post-type-ui" ),
           "labels" => $labels,
           "description" => "",
           "public" => true,
           "publicly_queryable" => true,
           "show_ui" => true,
           "show_in_rest" => true,
           "rest_base" => "",
           "rest_controller_class" => "WP_REST_Posts_Controller",
           "rest_namespace" => "wp/v2",
           "has_archive" => false,
           "show_in_menu" => true,
           "show_in_nav_menus" => true,
           "delete_with_user" => false,
           "exclude_from_search" => false,
           "capability_type" => "post",
           "map_meta_cap" => true,
           "hierarchical" => false,
           "can_export" => false,
           "rewrite" => [ "slug" => "brands", "with_front" => true ],
           "query_var" => true,
           "supports" => [ "title", "editor", "thumbnail" ],
           "show_in_graphql" => false,
       ];
       register_post_type( "brands", $args );

    }

    public function custom_metafields_brands() {
        $screens = array( 'brands' );
        add_meta_box( 'custom_metafields_brands_settings', 'Brand settings', [$this, 'custom_metafields_brands_callback'], $screens, "advanced", "high" );
        add_meta_box( 'custom_metafields_brands_seo', 'SEO settings', [$this, 'custom_metafields_brands_seo_callback'], $screens, "advanced", "high" );
    }

    public function custom_metafields_brands_callback( $post, $meta ) {
        $screens = $meta['args'];

        // Nonce for verification
        wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

        echo $this->display_meta_input( 'brand_name', 'Brand title', $post->ID );
        echo $this->display_meta_input( 'model_name', 'Model title (optional)', $post->ID );
        echo $this->display_meta_input( 'year_name', 'Model year (optional)', $post->ID );

    }

    public function custom_metafields_brands_seo_callback( $post, $meta ) {
        $screens = $meta['args'];

        // Nonce for verification
        wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

        echo "<p><b>Use variables:</b></p>";
        echo "<p style='margin: 0;'>{brand} - Brand title</p>";
        echo "<p style='margin: 0;'>{model} - Model title</p>";
        echo "<p style='margin: 0;'>{year} - Model year</p>";
        echo "<p style='margin: 0;'>{engine} - Engine title</p>";

        echo "<br/>";
        echo $this->display_meta_input( 'seo_title', 'Title', $post->ID, array('width' => '100%') );
        echo $this->display_meta_input( 'seo_description', 'Description', $post->ID, array('width' => '100%') );
        //echo $this->display_meta_input( 'seo_keywords', 'Keywords', $post->ID, array('width' => '100%') );
        echo $this->display_meta_input( 'seo_h1', 'H1', $post->ID, array('width' => '100%') );

    }

    public function custom_metafields_brands_save_postdata( $post_id ) {
        // Check nonce
        if ( ! isset( $_POST['myplugin_noncename'] ) || ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) ) {
            return;
        }

        // Decline auto-save
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
            return;
        }

        // Check the user's permissions
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Update fields
        $fields = ['brand_name', 'model_name', 'year_name', 'seo_title', 'seo_description', 'seo_keywords', 'seo_h1'];
        foreach( $fields as $field ) {
            if( isset( $_POST[$field] ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
            }
        }

        // Slugs of titles
        update_post_meta( $post_id, 'brand_name_slug', sanitize_title( $_POST['brand_name'] ) );
        update_post_meta( $post_id, 'model_name_slug', sanitize_title( $_POST['model_name'] ) );
        update_post_meta( $post_id, 'year_name_slug', sanitize_title( $_POST['year_name'] ) );


    }

    public function display_meta_input( $metakey, $metaname, $post_id, $styles=[] ) {

        $value = get_post_meta( $post_id, $metakey, true );
        $styles = implode(';', array_map(function($key, $value) { return $key . ':' . $value; }, array_keys($styles), $styles) );

        $str .= '<label for="'. $metakey .'">'. $metaname .'</label><br/>';
        $str .= '<input type="text" id="'. $metakey .'" name="'. $metakey .'" value="'. esc_attr( $value ) .'" size="25" style="'.$styles.'" />';
        $str .= "<br/><br/>";
        return $str;
    }

}

new CTR_posttypes();