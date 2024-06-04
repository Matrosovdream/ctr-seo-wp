<?php
class CTR_admin_settings {

    public function __construct() {
        add_action('admin_menu', array($this, 'create_settings_page'));
        add_action('admin_init', array($this, 'setup_sections'));
        add_action('admin_init', array($this, 'setup_fields'));
    }

    public function create_settings_page() {

        add_menu_page('CTR SEO', 'CTR SEO', 'manage_options', 'ctr_seo_settings', array($this, 'settings_page_content'), 'dashicons-groups', 50);

    }

    public function settings_page_content() { ?>
        <div class="wrap">
            <h1>CTR SEO Settings</h1>
            <form method="POST" action="options.php">
                <?php
                settings_fields('ctr_seo_settings');
                do_settings_sections('ctr_seo_settings');
                submit_button();
                ?>
            </form>
        </div> <?php
    }

    public function setup_sections() {
        add_settings_section('ctr_seo_settings_section', 'CTR SEO', false, 'ctr_seo_settings');
    }

    public function setup_fields() {

        // SEO fields
        add_settings_field('ctr_seo_archive_title', 'Page title', array($this, 'archive_title_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');
        add_settings_field('ctr_seo_archive_description', 'Page description', array($this, 'archive_description_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');
        //add_settings_field('ctr_seo_archive_keywords', 'keywords', array($this, 'keywords_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');
        add_settings_field('ctr_seo_archive_h1', 'H1', array($this, 'h1_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');
        add_settings_field('ctr_seo_archive_text', 'Bottom text', array($this, 'text_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');
        add_settings_field('ctr_seo_archive_setlist', 'Modify page SEO for:', array($this, 'setlist_callback'), 'ctr_seo_settings', 'ctr_seo_settings_section');        

        register_setting('ctr_seo_settings', 'ctr_seo_archive_title');
        register_setting('ctr_seo_settings', 'ctr_seo_archive_description');
        register_setting('ctr_seo_settings', 'ctr_seo_archive_keywords');
        register_setting('ctr_seo_settings', 'ctr_seo_archive_h1');
        register_setting('ctr_seo_settings', 'ctr_seo_archive_text');
        register_setting('ctr_seo_settings', 'ctr_seo_archive_setlist');

    }

    public function archive_title_callback() { 
        $value = get_option('ctr_seo_archive_title');
        echo "<input type='text' name='ctr_seo_archive_title' value='" . $value . "' style='width:100%;' >";
        echo "<br/><label>{brand}, {model}, {year}, {engine}</label>";
    }

    public function archive_description_callback() { 
        $value = get_option('ctr_seo_archive_description');
        echo "<textarea name='ctr_seo_archive_description' style='width:100%; height: 100px;'>$value</textarea>";
        echo "<br/><label>{brand}, {model}, {year}, {engine}</label>";
    }

    public function keywords_callback() { 
        $value = get_option('ctr_seo_archive_keywords');
        echo "<input type='text' name='ctr_seo_archive_keywords' value='" . $value . "' style='width:100%;' >";
        echo "<br/><label>{brand}, {model}, {year}, {engine}</label>";
    }

    public function h1_callback() { 
        $value = get_option('ctr_seo_archive_h1');
        echo "<input type='text' name='ctr_seo_archive_h1' value='" . $value . "' style='width:100%;' >";
        echo "<br/><label>{brand}, {model}, {year}, {engine}</label>";
    }

    public function text_callback() { 
        $value = get_option('ctr_seo_archive_text');
        echo wp_editor($value, 'ctr_seo_archive_text', array('textarea_rows' => 10));
        echo "<br/><label>{brand}, {model}, {year}, {engine}</label>";
    }

    public function setlist_callback() { 

        $sets = array(
            "title" => "Title",
            "description" => "Description",
            //"keywords" => "Keywords",
            "H1" => "H1",
            "text" => "Bottom text",
        );

        $value = get_option('ctr_seo_archive_setlist');
        foreach ($sets as $key => $item) {
            echo "
            <input type='checkbox' name='ctr_seo_archive_setlist[]' id='{$ctr_seo_archive_setlist}_{$key}' value='" . $key . "' " . checked(in_array($key, $value), true, false) . "> 
            <label for='{$ctr_seo_archive_setlist}_{$key}'>" . $item . "</label><br>";
        }
    }
    

}

new CTR_admin_settings();
