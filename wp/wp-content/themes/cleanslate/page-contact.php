<?php
/*
Template Name: Contact
*/

/**
 * The template for displaying the Contact page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php //get_sidebar(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="parent-title">
			<h1 class="entry-title">
				<span class="icon"></span>
				<span><?php the_title(); ?></span>
			</h1>
		</header>
		<div class="entry-content">
			<div id="gMap"></div>
				<?php
					if( has_post_thumbnail() ){														
						$thumbID = get_post_thumbnail_id($post->ID);
						$thumbTitle = get_the_title( $thumbID );
						$thumbSrc = wp_get_attachment_image_src( $thumbID, 'page-thumb' );
						$banner = array(
							'url' => $thumbSrc[0],
							'width' => $thumbSrc[1],
							'height' => $thumbSrc[2]

						);

						echo '<div class="pic">';
							echo '<img src="'.$banner['url'].'" width="'.$banner['width'].'" height="'.$banner['height'].'" />';
							// echo '<div><span>'.$thumbTitle.'</span></div>';
						echo '</div>';
					}
				?>

				<?php $locations = guru_get_locations(); 
					echo guru_make_location_list();
				?>

				<?php the_content(); ?>
			
			<div class="clearfix"></div>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
<?php endwhile; ?>

<div class="clearfix"></div>
<?php get_footer(); ?>