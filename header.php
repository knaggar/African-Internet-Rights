<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Header Template
 **/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  	<meta http-equiv="content-type" content="text/html" charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1" />
  	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="all" />
    <!-- <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1510048652626152',
          xfbml      : true,
          version    : 'v2.5'
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script> -->
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php if(!is_front_page()): ?>
  <header class="expand">
    <div class="clearfix container col12">
      <div class="logo v-center">
        <a class="first" href="<?php echo esc_url( home_url( '/' ) ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>African<br>Declaration</a>
        <a class="second" href="<?php echo esc_url( home_url( '/' ) ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>On Internet<br>Rights and Freedoms</a>
      </div>
      <div class="menu v-center right">
        <div class="show-menu-m"><span></span><span></span><span></span></div>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu-row menu-mob')); ?>
      </div>
    </div>
  </header>
  <main>
<?php endif; ?>
