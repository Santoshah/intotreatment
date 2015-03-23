<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<?php awesome_contact_script(); ?>
		<?php if ( (of_get_option('aw_favicon')) !='' ) { ?>
			<link rel="shortcut icon" href="<?php echo of_get_option('aw_favicon'); ?>" type="image/x-icon" />	
		<?php } ?>
		
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php echo of_get_option('aw_seodesc'); ?>" />
		<meta name="keywords" content="<?php echo of_get_option('aw_seokeywords'); ?>" />	
		<meta name="author" content="" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />		
		
		<?php if (of_get_option('example_colorpicker')) { $scheme = of_get_option('example_colorpicker'); ?>		
			
	<style id="custom-scheme" type="text/css">
		p.tagline,
		.tagline, #single .meta-post a
		{
			color: <?php echo $scheme; ?>;
		}
		.information {
			background: <?php echo $scheme; ?>;
		}
		h2.teaser-title span{
			color:<?php echo $scheme; ?> !important;
		}			
		a.view-portfolio span.inner{
			background:<?php echo $scheme; ?>;
		}			
		.post .more, .aside-date {
			color:<?php echo $scheme; ?>;
		}
		.company-address h4, .prices .price h5, .prices .price p {
			color:<?php echo $scheme; ?>;
		}
		.prices, .price p{
			color:<?php echo $scheme; ?> !important;
		}	
		@media only screen and (max-width: 964px) {
			.mean-container .mean-nav ul li a, .mean-container .mean-nav ul li ul.sub-menu a, .sub-menu a, .sub-menu .sub-menu a, .sub-menu .sub-menu .sub-menu a {
				border-top:1px solid <?php echo $scheme; ?> !important;
			}
		}			
		@media only screen and (max-width: 767px) {
			.header-bottom .container .row{
			background:<?php echo $scheme; ?>;
			}
		}		
		.purchase-teaser h3 a, .member-list .title-member span, .member .member-desc h3, .post .meta-post .category a, .highlight, .post-single a, span.category-visible-mobile a, .category-meta a, .post-single table#wp-calendar a, .sidebar table#wp-calendar td a{
			color:<?php echo $scheme; ?> !important;
		}			
		/* button */
		.about-more .read-more, button.read-more, a.read-more, .sign, button, input[type="button"], input[type="reset"], input[type="submit"], button#submit {
			background:<?php echo $scheme; ?> !important;
		}			
		.about-more .read-more:hover, button.read-more:hover, a.read-more:hover, .sign:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, button#submit:hover {
			opacity:0.8;
		}			
		.post.featured .read-more, .prices .price-detail .sign-up {
			background:<?php echo $scheme; ?> !important;
		}
		.post.featured .read-more:hover, .prices .price-detail .sign-up:hover {			
			opacity:0.8;
		}
		.portfolio-sort li a:hover, .portfolio-sort li a.active {
			background:<?php echo $scheme; ?> !important;
		}	
		.prices.active .price {
			background:<?php echo $scheme; ?> url('<?php echo get_template_directory_uri(); ?>/images/price-circle.png') no-repeat 1px 0;					
		}			
		.ie8 .prices.active .price {	
			background:transparent url('<?php echo get_template_directory_uri(); ?>images/package_active_bg.png') no-repeat;
		}				
		.bypostauthor .comment-avatar img{
			border:1px solid <?php echo $scheme; ?>;
		}			
	</style>
		
		<?php } else {?>	
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/stylesheets/skin/<?php echo of_get_option('select_skin', 'green' ); ?>.css" />			
		<?php } ?>	
		
	<!-- Custom Google fonts family -->
	
	<?php $font = of_get_option('aw_gfont'); ?>
	<style type="text/css">
		.title-content h2, .teaser h2, h2.teaser-title span, .app-detail h4, .member-list .title-member, .prices .price h5, .prices .price p, .box h5, #contact h3, .contact-section h3, .contact-main h3, .quick-contact h3, h1.post-title, .widget h2.widgettitle, ul#tabnav li a, .slideshowText h2,.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6, .box h5, #features h3, .entry h3, #features h4, .entry h4, .post-content-ajax h2.post-title{
			<?php echo  $font; ?>
		}
	</style>
	
	<!-- End of Custom Google fonts family -->				
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons -->
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="header">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="span5">
						
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php if ( (of_get_option('aw_logo')) !='' ) { ?>
									<img src="<?php echo of_get_option('aw_logo'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
									<?php } else {?>
										<h1><?php echo get_bloginfo('name'); ?></h1>
									<?php } ?>
								</a>
							</div>
							<?php 
								$blogdesc = get_bloginfo('description');
								if ( !empty ( $blogdesc ) ) { 
									echo '<p class="tagline">' . $blogdesc . '</p>';
								} ?>
							
						</div>
						<div class="header-right span4">
						
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="search-form">
								<p>
									<input type="text" name="s" placeholder="Search" />
								</p>
							</form>
							<?php if ( of_get_option('aw_twitter') || of_get_option('aw_fb') || of_get_option('aw_flickr') || of_get_option('aw_rss')  ) { ?>
								<ul class="social">
								
								<?php if ( (of_get_option('aw_twitter')) !='' ) { ?>
									<li class="twitter">
										<a href="<?php echo of_get_option('aw_twitter', '' ); ?>" target="_blank">Twitter</a>
										</li>
								<?php } ?>			

								<?php if ( (of_get_option('aw_fb')) !='' ) { ?>							
									<li class="facebook">
										<a href="<?php echo of_get_option('aw_fb', '' ); ?>" target="_blank">facebook</a>
									</li>
								<?php } ?>	
								
								<?php if ( (of_get_option('aw_flickr')) !='' ) { ?>	
									<li class="flickr">
										<a href="<?php echo of_get_option('aw_flickr', '' ); ?>" target="_blank">Flickr</a>
									</li>
								<?php } ?>
								
								<?php if ( (of_get_option('aw_rss')) !='' ) { ?>	
									<li class="rss">
										<a href="<?php echo of_get_option('aw_rss', '' ); ?>" target="_blank">RSS</a>
									</li>
								<?php } ?>
								</ul>
							<?php } ?>	
						</div>
						
						<div id="mobilemenu" class="clearfix"></div>
						
					</div>
				</div>
			</div>
			<div class="header-bottom">
			
				<div class="container">
					<div class="row">
						
						<div class="span8 top-nav">
						
							<?php get_template_part('navmenu'); ?>
							
						</div>
						<?php if ( of_get_option('aw_mailtop') && of_get_option('aw_phonetop') ) { ?>	
						<ul class="information span4">
							<?php if ( (of_get_option('aw_mailtop')) !='' ) { ?>
							<li class="email"><a href="mailto:<?php echo of_get_option('aw_mailtop', '' ); ?>" target="_blank"><?php echo of_get_option('aw_mailtop', '' ); ?></a></li>
							<?php } ?>
							<?php if ( (of_get_option('aw_phonetop')) !='' ) { ?>	
							<li class="phone"><?php echo of_get_option('aw_phonetop', '' ); ?></li>
							<?php } ?>		
						</ul>
						<?php } ?>							
					</div>
				</div>
			</div>
		</div>