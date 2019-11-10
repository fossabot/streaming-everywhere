<?php /* The template for displaying the footer. */ ?>
<footer id="footer" class="uk-block uk-block-secondary">
   <div class="uk-container-center uk-container">
   <div class="uk-grid">
   <div class="uk-width-medium-3-10">
      <div class="copyright-text"><span class="uk-text-bold">&copy;<?php echo the_time('Y'); ?> <?php bloginfo('name'); ?></span>
      </div>
   </div>
   <div class="uk-width-medium-5-10">
      <?php wp_nav_menu( array( 'theme_location'=> 'footer', 'menu_class' => 'uk-subnav', 'fallback_cb' => 'default_foot_menu', ) ); ?>
   </div>
   <div class="uk-width-medium-2-10">
   <div class="uk-float-right">
   <ul class="uk-subnav">
   <a href="<!-- URL-HERE ->" target="_blank">
      <svg viewBox="0 0 491.9 491.9" width="32" height="32">
         <path d="M377.5 225H201.3v58.7H308.8c-16 51-63.7 88.1-120.1 88.1 -69.5 0-125.8-56.3-125.8-125.8 0-69.5 56.3-125.8 125.8-125.8 35 0 66.6 14.3 89.5 37.3l42.6-46.3c-34-33.4-80.6-53.9-132.1-53.9C84.5 57.2 0 141.7 0 245.9s84.5 188.7 188.7 188.7c91.3 0 171.2-64.8 188.7-151v-58.7L377.5 225 377.5 225z" fill="#FFFFFF" />
         <polygon points="491.9 224.9 455.8 224.9 455.8 188.8 424.9 188.8 424.9 224.9 388.9 224.9 388.9 255.7 424.9 255.7 424.9 291.8 455.8 291.8 455.8 255.7 491.9 255.7 " fill="#FFFFFF" />
      </svg>
   </a>
</footer>
<?php wp_footer();?>
</body>
</html>
