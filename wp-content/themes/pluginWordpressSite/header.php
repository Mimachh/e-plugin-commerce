<!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <?php wp_head(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="<?php bloginfo('charset'); ?>" >
        <meta name="description" content="<?php Description(); ?>"/>
        <meta name="keywords" content="<?php Keywords(); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    </head>
    <body <?php body_class(); ?> class="relative">
    <header class="">
            <div>
                <a href="<?php echo home_url('/'); ?>">
                    <?php
                        if(has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo bloginfo('title');
                        }
                    ?>
                </a>
            </div>

            <!-- Desktop Nav -->
            <nav class="nav-desktop nav-links">
               <ul>
                    <li><a href="<?php echo esc_url(site_url()) ?>" 
                        <?php if (is_front_page()) echo 'class="active"' ?>
                        >Home</a>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('boutique')) ?>" 
                        <?php if ( get_post_type() == 'product') echo 'class="active"' ?>
                        >Shop</a>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('blog')) ?>" <?php if (get_post_type() == 'post') echo 'class="active"' ?>>Doc</a></li>
                    <?php 
                        if(is_user_logged_in()) { ?>
                            <li>
                                <a href="<?php echo esc_url(site_url('mon-compte')) ?>"
                                <?php if (is_page('mon-compte') OR wp_get_post_parent_id(0) == 23) echo 'class="active"' ?>
                                >
                                    My Account
                                </a>  
                            </li>   
                        <?php }
                    ?>
                    <li>
                        <?php if(class_exists("WooCommerce")) { ?> 
                            <?php 
                            if(is_user_logged_in()) { ?>
                                <a href="<?php echo wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                <span><?php echo get_avatar(get_current_user_id(), 20); ?></span>
                                <span>Log out</span>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                                <?php if (is_page(get_option('woocommerce_myaccount_page_id'))) echo 'class="active"' ?>
                                >Se connecter</a>

                            <?php }
                            ?>
                        <?php } ?>
                    </li>
                    <li class=" js-search-trigger"><a href="<?php echo esc_url(site_url('/recherche')); ?>"><i class="fa fa-search" aria-hidden="true"></i></a></li>
               </ul>
            </nav>

            <!-- Mobile Nav -->
            <nav class="nav-mobile">
                <ul>
                    <li><a href="esc_url(site_url())">Home</a></li>
                    
                    <li><a href="<?php echo esc_url(site_url('boutique')) ?>" 
                        <?php if ( get_post_type() == 'product') echo 'class="active"' ?>
                        >Shop</a>
                    </li>

                    <li><a href="<?php echo esc_url(site_url('blog')) ?>" <?php if (get_post_type() == 'post') echo 'class="active"' ?>>Doc</a></li>

                    <?php 
                        if(is_user_logged_in()) { ?>
                            <li>
                                <a href="<?php echo esc_url(site_url('mon-compte')) ?>"
                                <?php if (is_page('mon-compte') OR wp_get_post_parent_id(0) == 23) echo 'class="active"' ?>
                                >
                                    My Account
                                </a>  
                            </li>   
                        <?php }
                    ?>

                    <li>
                        <?php if(class_exists("WooCommerce")) { ?> 
                            <?php 
                            if(is_user_logged_in()) { ?>
                                <a href="<?php echo wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                <span><?php echo get_avatar(get_current_user_id(), 20); ?></span>
                                <span>Log out</span>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                                <?php if (is_page(get_option('woocommerce_myaccount_page_id'))) echo 'class="active"' ?>
                                >Se connecter</a>

                            <?php }
                            ?>
                        <?php } ?>
                    </li>

                    <li><a href="<?php echo esc_url(site_url('/recherche')); ?>"><i class="fa fa-search js-search-trigger mobile-search" aria-hidden="true"></i></a></li>
               </ul>
            </nav>


            <i class="toggle-hamburger fa-solid fa-bars"></i>
    </header>