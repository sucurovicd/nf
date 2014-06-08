<!DOCTYPE html>

<html>
<head>
    <title><?php wp_title('-', 'true', 'right'). bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
    <?php echo bg_cc(); ?>
</head>
<body>
    <div id="wrapper" class="col-md-12 center-block" >
    <div id="header_image_wrapper" class="text-center">
        <a href="<?php echo home_url()?>"><?php echo cc_header_image(); ?></a>
    </div>
        
        <div class="col-md-3"></div>
                    <div class="col-md-6">

            <?php main_nav_menu();?>
                    </div>
        <div class="col-md-3">
            </div>
    <div id="content" class="col-md-12" style="background-color:white">
