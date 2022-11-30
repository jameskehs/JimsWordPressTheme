<?php

function jimsTheme_theme_support(){
//Adds dynamic title tag support
add_theme_support("title-tag");
add_theme_support("custom-logo");
add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "jimsTheme_theme_support");

function jimsTheme_menus(){
    $locations = array(
        "primary" => "Desktop Primary Left Sidebar",
        "footer" => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', "jimsTheme_menus");

 function jimsTheme_register_styles(){
    $version = wp_get_theme()-> get('Version');
    wp_enqueue_style("jimstheme-style", get_template_directory_uri() . "/style.css", array("jimstheme-bootstrap"), $version, 'all');
    wp_enqueue_style("jimstheme-bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style("jimstheme-fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
};

add_action('wp_enqueue_scripts', "jimsTheme_register_styles");

function jimsTheme_register_scripts(){
    wp_enqueue_script( "jimstheme-jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1",true);
    wp_enqueue_script("jimstheme-popper","https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true);
    wp_enqueue_script("jimtheme-bootstrapJS", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true);
    wp_enqueue_script("jimstheme-mainJS", get_template_directory_uri() . "/assets/javascript/main.js", array(), "1.0", true);
};
add_action('wp_enqueue_scripts', "jimsTheme_register_scripts");


function jimsTheme_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title'=>'',
            'before_widget'=> '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget'=>'</ul>',
            'name'=>'Sidebar Area',
            'id'=>'sidebar-1',
            'description'=>'Sidebar Widget Area'
        ),
        );

        register_sidebar(
            array(
                'before_title' => '',
                'after_title'=>'',
                'before_widget'=> '',
                'after_widget'=>'',
                'name'=>'Footer Area',
                'id'=>'footer-1',
                'description'=>'Footer Widget Area'
            ),
            );
}

add_action('widgets_init', 'jimsTheme_widget_areas');
?>