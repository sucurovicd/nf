<?php get_header(); ?>


<div class="row">
    <div class="col-md-3 "><?php dynamic_sidebar( 'leftsidebar' ); ?></div>
    <div class="col-md-6" id="content-post" style="background-color:greenyellow">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <a href="<?php the_permalink() ?>"> <h1><?php the_title(); ?></h1></a>
            <p><?php the_content()?></p>
            <?php comments_template(); ?> 
  <?php  ?>

<?php endwhile; endif; ?>
    </div>
    <div class="col-md-3"><?php dynamic_sidebar( 'rightsidebar' ); ?></div>

</div>



<?php get_footer(); ?>



