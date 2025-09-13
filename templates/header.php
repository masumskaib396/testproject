<?php
/**
 * @Packge     : Quanto
 * @Version    : 1.0
 * @Author     : Mirrortheme
 * @Author URI : https://mirrortheme.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $quanto_post_id = get_the_ID();

            // Get the page settings manager
            $quanto_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $quanto_page_settings_model = $quanto_page_settings_manager->get_model( $quanto_post_id );

            // Retrieve the color we added before
            $quanto_header_style = $quanto_page_settings_model->get_settings( 'quanto_header_style' );
            $quanto_header_builder_option = $quanto_page_settings_model->get_settings( 'quanto_header_builder_option' );

            if( $quanto_header_style == 'header_builder'  ) {

                if( !empty( $quanto_header_builder_option ) ) {
                    $quantoheader = get_post( $quanto_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $quantoheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $quanto_header_builder_trigger = quanto_opt('quanto_header_options');
                if( $quanto_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $quanto_global_header_select = get_post( quanto_opt( 'quanto_header_select_options' ) );
                    $header_post = get_post( $quanto_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    quanto_global_header_option();
                }
            }
        } else {
            $quanto_header_options = quanto_opt('quanto_header_options');
            if( $quanto_header_options == '1' ) {
                quanto_global_header_option();
            } else {
                $quanto_header_select_options = quanto_opt('quanto_header_select_options');
                $quantoheader = get_post( $quanto_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $quantoheader->ID );
                echo '</header>';
            }
        }
    } else {
        quanto_global_header_option();
    }