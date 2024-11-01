<?php


function do_it_now() {
    ?>
<!-- The structure of the question and answer block -->
<h2>FAQ block</h2>

<div class="accordion">
<?php $loop = new WP_Query( array( 'post_status' => 'publish' , 'post_type' => 'sq-faq', 'posts_per_page' => 20 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                   <!-- this is where you should insert your content of the posts -->
<h3 itemtype="http://schema.org/Question">
    <span class="collapsible-content--icon" aria-hidden="true" data-show-icon="" data-hide-icon=""><span class="screen-reader-text">Click to open the answer</span></span> 
    Question: <?php the_title(); ?>
</h3>
    <div itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" >
    	<?php
    	the_post_thumbnail('thumbnail', ['class' => 'img-responsive alignright']);    	
    	the_content(); ?>

 </div>
                <?php endwhile; ?>
                 <?php wp_reset_query(); ?>
</div>

         <?php
 }
 
 do_it_now();
?>




