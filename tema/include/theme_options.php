<?php
/*
 * Slider scripts for upload images
 *
 *
 */


add_action('admin_enqueue_scripts', 'cc_admin_scripts');

function cc_admin_scripts() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script(
        'iris',
        admin_url( 'js/iris.min.js' ),
        array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
        false,
        1
    );

    wp_enqueue_media();

    wp_enqueue_script("jquery");

}


/*
 *
 *
 * Mechanic for back-end
 *
 *
 *
 *
 */

function cc_theme_menu()
{
    add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'cc_theme_options.php', 'cc_theme_page');
}
add_action('admin_menu', 'cc_theme_menu');

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */
function cc_theme_page()
{
    $option_name = 'cc_theme_options';

    $options = get_option( $option_name );
    ?>
    <div class="wrap">
    <h1>Theme options</h1>
        <p>
            <img width="200px" src="<?php echo $options['header'] ?>" alt="header image" title="Header image" />
            <img width="200px" src="<?php echo $options['bg'] ?>" alt="background image" title="Background image" />


        </p>
        <p>On this options page you can choose header image, bg image, bg color. If you want to have bg-image upload it, but color field you mast left blank. In case that you want color just do oposite.</p>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('cc_theme_options');

        do_settings_sections('cc_theme_options.php');
        ?>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
    <script>





            //button1 upload options
            jQuery('#headerbutton1').click(function(e) {
                var custom_uploader;

                e.preventDefault();

                //If the uploader object has already been created, reopen the dialog
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }

                //Extend the wp.media object
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });

                //When a file is selected, grab the URL and set it as the text field's value
                custom_uploader.on('select', function() {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    jQuery('#header').val(attachment.url);

                });

                //Open the uploader dialog
                custom_uploader.open();

            });












        jQuery('#bgbutton').click(function(e) {
            var custom_uploader;

            e.preventDefault();

            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            //Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function() {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                jQuery('#bg').val(attachment.url);

            });

            //Open the uploader dialog
            custom_uploader.open();

        });
            jQuery(document).ready(function(){
                jQuery('.color-picker').iris();
            });

    </script>

    <p>Created by CodeCrew team</p>
    </div>
<?php
}
/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'cc_register_settings' );

/**
 * Function to register the settings
 */
function cc_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'cc_theme_options', 'cc_theme_options', 'cc_validate_settings' );

    // Add settings section
    add_settings_section( 'cc_text_section','Settings for CCtheme', 'cc_display_section', 'cc_theme_options.php' );

    // Create textbox field
    $header = array(
        'type'      => 'text',
        'id'        => 'header',
        'name'      => 'header',
        'desc'      => 'URL for header image',
        'std'       => '',
        'label_for' => 'Header image ',
        'class'     => 'widefat'
    );
    $header_button = array(
        'type'      => 'button',
        'id'        => 'headerbutton1',
        'name'      => 'headerbutton1',
        'desc'      => '',
        'std'       => '',
        'label_for' => '',
        'value'     => 'Add image',
        'class'     => 'button-primary'
    );
    $color= array(
        'type'      => 'text',
        'id'        => 'color',
        'name'      => 'color',
        'desc'      => 'Choose color for background',
        'std'       => '',
        'label_for' => 'color',
        'class'     => 'widefat'
    );


    $bg_image = array(
        'type'      => 'text',
        'id'        => 'bg',
        'name'      => 'bg',
        'desc'      => 'URL for background image',
        'std'       => '',
        'label_for' => 'bg',
        'class'     => 'widefat'
    );
    $bg_button = array(
        'type'      => 'button',
        'id'        => 'bgbutton',
        'name'      => 'bgbutton',
        'desc'      => '',
        'std'       => '',
        'label_for' => '',
        'value'     => 'Add image',
        'class'     => 'button-primary'
    );


    add_settings_field( 'header_image', 'Header image', 'cc_display_setting', 'cc_theme_options.php', 'cc_text_section', $header );
    add_settings_field( 'header_button', '', 'cc_display_setting', 'cc_theme_options.php', 'cc_text_section', $header_button );
    add_settings_field( 'bg_color', 'Background color(hex)', 'cc_display_setting', 'cc_theme_options.php', 'cc_text_section', $color );
    add_settings_field( 'bg_image', 'Background image', 'cc_display_setting', 'cc_theme_options.php', 'cc_text_section', $bg_image );
    add_settings_field( 'bg_button', '', 'cc_display_setting', 'cc_theme_options.php', 'cc_text_section', $bg_button );

}
/**
 * Function to add extra text to display on each section
 */
function cc_display_section($section){

}
function cc_display_setting($args)
{
    extract( $args );

    $option_name = 'cc_theme_options';

    $options = get_option( $option_name );


    switch ( $type ) {
        case 'text':
            $options[$id] = stripslashes($options[$id]);
            $options[$id] = esc_attr( $options[$id]);
            if($id == "color"){
               echo  "<input type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' class='color-picker'  /> ";
            }else{
            echo "<input class='$class' type='text'  id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            }
            break;
        case 'button':
            $options[$id] = stripslashes($options[$id]);
            $options[$id] = esc_attr( $options[$id]);
            echo "<button class='button-primary' type='button' id='$id'>Add image</button>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
            break;
    }
}
/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function cc_validate_settings($input)
{
    foreach($input as $k => $v)
    {
        $newinput[$k] = trim($v);

        // Check the input is a letter or a number

    }

    return $newinput;
}