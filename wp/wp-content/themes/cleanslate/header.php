<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * boilerplate_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" /> 
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/application.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<script type="text/javascript">
			Guru = new Object();
			Guru.Url = '<?php bloginfo( 'url' ); ?>';
			Guru.TemplateUrl = '<?php bloginfo('template_directory'); ?>';
			Guru.isFrontPage = <?php if(is_front_page()) { echo 'true'; }else{ echo 'false'; } ?>;
			Guru.wpVersion = '<?php echo trim(get_bloginfo("version")); ?>';
			Guru.postID = '<?php echo get_the_ID(); ?>';
		</script>

		<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>

		<script type="text/javascript">
			Modernizr.load([
				{ load : ['//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'],
				    complete: function () { if ( !window.jQuery ){ Modernizr.load(Guru.TemplateUrl+'/js/jquery.js'); } }
				},
				{ test: window.JSON, nope: Guru.TemplateUrl+'/js/json2.js' },
				{ load: 'http://code.jquery.com/ui/1.10.1/jquery-ui.js' },
				/* plugins.js & common.js fordevelopment */
				{ load : Guru.TemplateUrl+'/js/plugins.js' },
				{ load : Guru.TemplateUrl+'/js/common.js' }
				/* concatenate and optimize seperate script files for deployment using google closure compiler (compiler.jar) in js folder */
				//{ load : Guru.TemplateUrl+'/js/theme.js' }
			]);
		</script>
		
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();		
?>
	</head>
	<body <?php body_class(); ?>>
		<header id="header" role="banner">
			
			<div class="container">
				
				<?php if (is_front_page()) { echo '<h1>'; } else { echo '<h2>'; } ?>
				<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php if (is_front_page()) { echo '</h1>'; } else { echo '</h2>'; } ?>
				
				<?php echo guru_get_social_nav(); ?>
			</div>
		</header>
		
		<?php get_template_part('nav','primary'); ?>
		
		<section id="content" role="main">
			<div class="container">