<?php
class CTR_seo_helper {

    public function get_brand_seo( $params ) {

        // Get post if exists
        $post = $this->get_brand_post( $params );

        if( $post ) {
            $settings = array(
                'title' => get_post_meta( $post->ID, 'seo_title', true ),
                'description' => get_post_meta( $post->ID, 'seo_description', true ),
                'keywords' => get_post_meta( $post->ID, 'seo_keywords', true ),
                'H1' => get_post_meta( $post->ID, 'seo_h1', true ),
                'text' => get_post( $post->ID )->post_content,
            );
            return $settings;
        }


    }

    public function get_brand_post( $params ) {

        if( trim($params['brand']) == '' ) { return false; }

        /*
        echo "<pre>";
        print_r( get_post_meta(566) );
        echo "</pre>";
        */

        // Lets take just needed params
        $set = array(
            'brand' => $params['brand'],
            'model' => $params['serie'],
            'year' => $params['model'],
        );

        // Let's build WP metaquery
        $metaquery = array('relation' => 'AND');
        foreach( $set as $key=>$value ) {
            if( trim($value) != '' ) {
                $metaquery[] = array(
                    'key' => $key.'_name_slug',
                    'value' => sanitize_title($value), // As a slug
                    'compare' => '='
                );
            } else {
                $metaquery[] = array(
                    'key' => $key.'_name_slug',
                    'value' => NULL,
                    'compare' => "="
                );
            }
        }

        // Retrieve the list
        $posts = get_posts(array(
            'post_type' => 'brands',
            'post_status' => 'publish',
            'meta_query' => $metaquery
        ));
        $post = $posts[0];

        return $post;

        echo "<pre>";
        print_r($metaquery);
        echo "</pre>";

        echo "<pre>";
        print_r($post);
        echo "</pre>";

    }  

    // Takes slugs and return full titles, Transiant cache is used
    public function get_titles_by_slug( $brand, $model=false, $engine=false ) {

        // Obligatory
        $brand = $this->get_brand_by_slug( $brand );

        if( $model ) {
            $model = $this->get_model_by_slug( $model );
        }
        if( $engine ) {
            $engine = $this->get_engine_by_slug( $model );
        }

        return array(
            'brand' => $brand,
            'model' => $model,
            'engine' => $engine
        );

    }

    // Transiant cache is used
    public function get_brand_by_slug( $brand ) {
        return $this->find_in_option( 'transient_ctr_brands', $brand );
    }

    // Transiant cache is used
    public function get_model_by_slug( $model ) {
        return $this->find_in_option( 'transient_ctr_models', $model );
    }

    // Transiant cache is used
    public function get_engine_by_slug( $engine ) {
        return $this->find_in_option( 'transient_ctr_engines', $engine );
    }

    // Transiant cache is used, not a stable solution
    private function find_in_option( $option_name, $option_value ) {

        global $wpdb;

        // Get entity from the database
        $query = "SELECT * FROM $wpdb->options WHERE option_name LIKE '%{$option_name}%' AND option_value LIKE '%{$option_value}%'";
        $res = $wpdb->get_results( $query, ARRAY_A );
        $list = unserialize( $res[0]['option_value'] );

        // Go through the list
        $data = [];
        foreach( $list as $item ) {
            if( $item['slug'] == $option_value ) {
                $data = $item;
                break;
            }
        }

        return $data;

    }

}