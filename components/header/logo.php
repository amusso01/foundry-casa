<?php
/**
 * Site logo
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */
 ?>

<figure class="site-header__item site-header__logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link-invisible">
    <?php get_template_part( 'svg-template/svg', 'logo' ) ?>
       
    </a>
</figure>