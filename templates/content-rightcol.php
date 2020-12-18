<!-- <div class="col-lg-5 col-md-12 pl-md-2" id="rightcol">
  <?php if(have_posts()) : while( have_posts()): the_post(); ?>

<?php get_template_part('content',get_post_format()); ?>

<?php endwhile ?>
<?php endif;?>
</div> -->

<?php 
$wpb_all_query= new WP_Query(array('post_type'=>'post','post_status'=>'publish','posts_per_page'=>-1)); ?>

<?php if($wpb_all_query->have_posts()) : ?>

<ul>
  <?php while($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink();?>"><?php the_title()l?></a>
    </li>
  <?php endwhile ?>
</ul>
  <?php wp_reset_postdata();?>
  <?php else :?>
    <p><?php __e('Sorry,no posts matched your criteria');?></p>
  <?php endif; ?>