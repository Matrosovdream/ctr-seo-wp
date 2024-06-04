<?php
/**
 * The main displaying template
 *
 * This template can be overridden by copying it to yourtheme/chiptuningreseller/main.php.
 *
 * @package     ChiptuningReseller\Templates
 * @version     6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo body_class();
?>
<div class="ctr-container-md ctr-mx-auto ctr-text-blue-600">
<?php ctr_show_content(); ?>
</div>

<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

