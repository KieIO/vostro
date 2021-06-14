<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hbpro
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<?php wp_head(); ?>
<script type="text/javascript">
	
   if(window.innerWidth <= 800 && window.innerHeight <= 600) {
	var is_mobile = true;
   } else {
	   var is_mobile = false;
   }   
  
   var siteURL = '<?php echo site_url()?>';
</script>

</head>

<body <?php body_class(); ?>>

<header class="header">
      <div class="header-small">
        <div class="header-top">
          <p class="top-text">READ OUR LATEST ARTICLE</p>
        </div>
        <div class="header-bottom">
          <div class="header-logo">
            <a href="/">
              <img src="<?= FVN_THEME_URL ?>assets/images/Logo.svg">
            </a>
          </div>
          <div class="hamburger">
            <div class="hamburger-icon" onclick="toogleSidebar()">
              <div class="bar-1"></div>
              <div class="bar-2"></div>
              <div class="bar-3"></div>
            </div>
          </div>
        </div>
        <div class="header-sidebar">
		<?php wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             =>  2,
					'container'         => 'ul',
					'container_class'   => '',
					'menu_id' 			=> '',
					'menu_class'        => ''
					));
			   ?>
          <ul>
            <li>Your Portal</li>
            <li>Your Portfolio</li>
          </ul>
          <ul>
            <li>hello@vostroprivate.com.au</li>
            <li>Phone. 03 9867 4345</li>
          </ul>
        </div>
      </div>
      <div class="header-large">
        <div class="header-top">
          <p class="top-text">READ OUR LATEST ARTICLE</p>
        </div>
        <div class="header-bottom">
          <div class="header-logo">
            <a href="/">
              <img src="<?= FVN_THEME_URL ?>assets/images/Logo.svg">
            </a>
          </div>
          <div class="header-right">
            <div class="header-category">

			<?php wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             =>  2,
					// 'container'         => '',
					// 'container_class'   => 'header-category-list', 
					'menu_id' 			=> '',
					'menu_class'        => 'header-category-list',
					'add_li_class'  => 'header-category-item'
					// 'items_wrap' => '',
					// 'walker'            => new hbpro_bootstrap_navwalker()
					));
			   ?>
            </div>
            <div class="header-btn">
              <button class="u-button u-button-ghost">Your Portal</button>
              <button class="u-button u-button-ghost">Your Porfolio</button>
            </div>
          </div>
        </div>
      </div>
	</header>
	
