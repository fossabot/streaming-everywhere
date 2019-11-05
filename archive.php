<?php /* The template for displaying archive pages. */ get_header(); ?>
<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
   <div class="uk-grid">
      <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">
         <div class="uk-panel">
            <?php wp_nav_menu( array('theme_location' => 'primary','menu_class'     => 'uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom','fallback_cb' => 'default_main_menu',) );?>
         </div>
      </div>
      <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10" data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}"  style="margin-top:1px;">
         <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter: 20}">
            <?php if (is_category()) :while(have_posts()) : the_post(); ?>
            <div>
               <div class="uk-overlay uk-overlay-hover">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a>
               </div>
               <div class="uk-panel">
                  <h5 class="uk-panel-title"><?php the_title();?></h5>
               </div>
            </div>
            <?php endwhile; endif; ?>
         </div>
         <div class="uk-margin-large-top uk-margin-bottom" style="margin: 0 auto;">
            <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);} ?>
         </div>
      </div>
   </div>
</div>
<div id="offcanvas" class="uk-offcanvas">
   <div class="uk-offcanvas-bar">
      <div class="uk-panel">
         <form action="<?php echo site_url(); ?>"  method="GET">
            <input id="prestador" class="uk-search-field" type="text" placeholder="Search..." autocomplete="off" name="s">
            <div class="uk-dropdown uk-dropdown-flip uk-dropdown-search" aria-expanded="false"></div>
         </form>
      </div>
      <?php wp_nav_menu( array('theme_location' => 'primary','menu_class'     => 'uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom','fallback_cb' => 'default_main_menu',) );?>
   </div>
</div>
<?php get_footer();?>
