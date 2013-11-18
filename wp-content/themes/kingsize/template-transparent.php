<?php
/**
 Template Name: Transparent Page
 **/
$tpl_body_id = 'transparentpage';
get_header(); 
global $data;
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- Main wrap -->
		<div id="main_wrap">  
			  
    		<!-- Main -->
   			<div id="main">
   			 	
      			<?php
              if (is_front_page())
              {?>
              
                <h2 class="section_title"></h2><!-- This is your section title -->
              
              <?php } else { ?>
              
                <h2 class="section_title"><?php the_title(); ?></h2><!-- This is your section title -->
              
              <?php } ?>
 
          
      			
    			<!-- Content has class "content_full_width" to use all the page -->
  				<div id="content" class="content_full_width">
					<?php the_content(); ?>

						
    		  </div>	
      		<!-- Post ends here -->
     			
  			 </div>
  			 <!-- Content ends here -->
			 	
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>
