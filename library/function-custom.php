<?php
/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* Copyright
/––––––––––––––––––––––––*/
function copyright() {
    return ' <span class="copyright-site-name">' . get_bloginfo('name') . '</span> &copy; ' . date('Y') .' all rights reserved' ;
  }
  add_shortcode('copyright', 'copyright');
