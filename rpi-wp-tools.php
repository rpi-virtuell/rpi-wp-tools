<?php

/**
 * Plugin Name: RPI Wordpress Tools
 * Plugin URI: https://github.com/rpi-virtuell/rpi-wp-tools
 * Description: RPI Tools stellen Shortcode & andere Funktionen zur Verfügung
 * Version: 1.0
 * Author: Daniel Reintanz
 * License: GPLv2
 */

// Sicherstellen, dass das Plugin nicht direkt aufgerufen wird
defined('ABSPATH') or die('Direkter Zugriff auf Skripte ist nicht erlaubt.');

class RpiWpTools
{
    public function __construct()
    {
        add_shortcode('link_with_post_id_to', array($this, 'display_link_with_post_id_to'));

    }

    function display_link_with_post_id_to($atts = [])
    {
        if (!empty(get_the_ID()) && !empty($atts)) {
            ob_start();
            ?>
            <a class="button"
               href="<?php echo add_query_arg('post_id', get_the_ID(), $atts['link']) ?>"
                <?php echo $atts['new_tab'] ? 'target="_blank" rel="noopener noreferrer' : '' ?>>
                <?php echo $atts['text'] ?></a>
            <?php
            return ob_get_clean();
        }
        return 'ERROR: NO POST ID FOUND or Attributes missing. Atts given : '. var_export($atts) ;
    }

}

new RpiWpTools();