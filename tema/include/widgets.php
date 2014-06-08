<?php
register_sidebar(array(
    'name' => 'Right sidebar',
    'id'   => 'rightsidebar',
    'description' => 'this is right sidebar',
    'before_widget' => '<div class="right_sidebar" style="background-color:red">',
    'after_widget'  => '</div>',
));

register_sidebar(array(
    'name' => 'Left sidebar',
    'id'   => 'leftsidebar',
    'description' => 'this is left sidebar',
    'before_widget' => '<div class="left_sidebar" style="background-color:yellow">',
    'after_widget'  => '</div>',

));
