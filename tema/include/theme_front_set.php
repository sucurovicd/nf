<?php
function cc_header_image(){
    $option_name = 'cc_theme_options';

    $options = get_option( $option_name );
    return "<img src='".esc_url($options['header'])."' alt='header image'>";

}
function bg_cc(){
    $option_name = 'cc_theme_options';

    $options = get_option( $option_name );



    if(isset($options['bg'])){
        $style = "<style type='text/css'>
        #wrapper{
        background-image:url( ".esc_url($options['bg']).");
        background-size: cover;


        }


        </style>";
    }

    if($options['bg'] == "" && isset($options['color'])){

        $style = "<style type='text/css'>
        #wrapper{
        background-color: ".esc_attr($options['color']).";


        }


        </style>";

    }
    if($options['bg'] == "" && $options['color'] == ""){
        $style = "<style type='text/css'>
        #wrapper{
        background-color: #ffffff;
            }
        </style>";
    }

    return $style;
}