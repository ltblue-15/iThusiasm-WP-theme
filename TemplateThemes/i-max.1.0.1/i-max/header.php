<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage i-max
 * @since i-max 1.0
 */
?>
<?php


$background = of_get_option('itrans_background_style');
$bacground_style = '';

if ($background) {
	
   	if ($background['color']) {		
		$bacground_style .= 'background-color: '.$background['color'].'; ' ;
   	}
		
   	if ($background['image']) {		
		$bacground_style .= 'background-image: URL('.$background['image'].'); ' ;
		foreach ($background as $i=>$param)
		{
        	$bacground_style .= 'background-'.$i .': '.$param.'; ' ;
        }
   	}
}

global $post; 

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php    
    if ( ! function_exists( '_wp_render_title_tag' ) ) :
        function imax_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
        }
        add_action( 'wp_head', 'imax_render_title' );
    endif;    
    ?> 
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="<?php echo $bacground_style; ?>">
	<div id="page" class="hfeed site">
    	
        <?php if ( of_get_option('top_bar_phone') || of_get_option('top_bar_email') || imax_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="ubarinnerwrap">
                <div class="socialicons">
                    <?php echo imax_social_icons(); ?>
                </div>
                <?php if ( of_get_option('top_bar_phone') ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-phone"></i>
                    <?php if ( of_get_option('top_bar_phone') ) : ?>
                        <?php _e('Call us : ','imax'); ?> <?php echo esc_attr(of_get_option('top_bar_phone')); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <?php if ( of_get_option('top_bar_email') ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-mail"></i>
                    <?php if (of_get_option('top_bar_email') ) : ?>
                        <?php _e('Mail us : ','imax'); ?> <?php echo sanitize_email(of_get_option('top_bar_email')); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>                
            </div> 
        </div>
        <?php endif; ?>
        
        <div class="headerwrap">
            <header id="masthead" class="site-header" role="banner">
         		<div class="headerinnerwrap">
					<?php if (of_get_option('itrans_logo_image')) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span><img src="<?php echo of_get_option('itrans_logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></span>
                        </a>
                    <?php else : ?>
                        <span id="site-titlendesc">
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
                            </a>
                        </span>
                    <?php endif; ?>	
        
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php _e( 'Menu', 'imax' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'imax' ); ?>"><?php _e( 'Skip to content', 'imax' ); ?></a>
                            <?php 
								if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									}
									else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								?>
							
                        </nav><!-- #site-navigation -->
                        <div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
        
        <!-- #Banner -->
        <?php
		
		$hide_title = rwmb_meta('imax_hidetitle');
		$show_slider = rwmb_meta('imax_show_slider');
		$other_slider = rwmb_meta('imax_other_slider');
		$custom_title = rwmb_meta('imax_customtitle');
		
		$hide_front_slider = of_get_option('hide_front_slider');
		$other_front_slider = of_get_option('other_front_slider');
		$itrans_slogan = of_get_option('itrans_slogan');
		
		if($other_slider) :
		?>
		
        <div class="other-slider" style="">
	       	<?php echo do_shortcode( $other_slider ) ?>
        </div>
        <?php //elseif ( is_front_page() )  : ?>
		
		<?php	
		elseif ( is_home() && !is_paged() || $show_slider ) : 
		?>
            <?php //imax_ibanner_slider(); ?>
            <?php if (!empty($other_front_slider)) : ?>
            	<?php echo do_shortcode( $other_front_slider ) ?>
        	<?php elseif ( !$hide_front_slider || ( is_front_page() && $show_slider ) ) : ?>
            	<?php imax_ibanner_slider(); ?>
        	<?php else : ?>
            <div class="iheader" style="">
                <div class="titlebar">
                    <h1 class="entry-title">
                        <?php
                            if ($itrans_slogan) {
                                echo esc_attr($itrans_slogan);
                            }
                        ?>	                 
                    </h1>
                </div>
            </div>                                    
        	<?php endif; ?>            
            
        <?php 
		elseif(!$hide_title) : 
		?>
        
        <div class="iheader" style="">
        	<div class="titlebar">
            	
                <?php
					if( is_archive() )
					{
						echo '<h1 class="entry-title">';
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'imax' ), get_the_date() );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'imax' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'imax' ) ) );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'imax' ), get_the_date( _x( 'Y', 'yearly archives date format', 'imax' ) ) );
							elseif ( is_category() ) :	
								printf( __( 'Category Archives: %s', 'imax' ), single_cat_title( '', false ) );		
							else :
								_e( 'Archives', 'imax' );
							endif;                						
						echo '</h1>';
					} elseif ( is_search() )
					{
						echo '<h1 class="entry-title">';
							printf( __( 'Search Results for: %s', 'imax' ), get_search_query() );					
						echo '</h1>';
					} else
					{
						if ( !empty($custom_title) )
						{
							echo '<h1 class="entry-title">'.esc_attr($custom_title).'</h1>';
						}
						else
						{
							echo '<h1 class="entry-title">';
							the_title();
							echo '</h1>';
						}						
					}
					
					//echo rwmb_meta('imax_customtitle');

					/**/
            	?>
				<?php 
				
					$hide_breadcrumb = rwmb_meta('imax_hide_breadcrumb');
					
                    if(function_exists('bcn_display') && !$hide_breadcrumb )
                    {
				?>
                	<div class="nx-breadcrumb">
                <?php
                        bcn_display();
				?>
                	</div>
                <?php		
                    } 
                ?>               
            	
            </div>
        </div>
        
		<?php endif; ?>
		<div id="main" class="site-main">

