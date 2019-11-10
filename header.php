<?php /* The header for our theme. */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name=viewport content="width=device-width, initial-scale=1">
      <meta name=description content="<?php the_meta_description(); ?>">
      <?php wp_head();?>
   </head>
   <body>
      <nav id="tm-header"  class="uk-navbar">
         <div class="uk-container">
            <a class="uk-navbar-brand uk-hidden-small" href="<?php echo site_url();?>">
               <svg width="32" height="32" viewBox="0 0 408.2 408.2" xml:space="preserve">
                  <path d="M204.1 0C91.4 0 0 91.4 0 204.1c0 112.7 91.4 204.1 204.1 204.1 112.7 0 204.1-91.4 204.1-204.1C408.2 91.4 316.8 0 204.1 0zM286.5 230l-126.4 72.5c-17 9.8-30.8 1.8-30.8-17.8V140c0-19.6 13.8-27.6 30.8-17.8l126.4 72.5C303.6 204.4 303.6 220.2 286.5 230z" fill="#FFFFFF" />
               </svg>
               <?php bloginfo('name'); ?>
            </a>
            <form action="<?php echo site_url(); ?>" class="uk-search uk-margin-small-top uk-margin-left uk-hidden-small" method="GET">
               <svg viewBox="0 0 451 451" width="16" height="16">
                  <path d="M447.1 428l-109.6-109.6c29.4-33.8 47.2-77.9 47.2-126.1C384.7 86.2 298.4 0 192.4 0 86.3 0 0.1 86.3 0.1 192.3s86.3 192.3 192.3 192.3c48.2 0 92.3-17.8 126.1-47.2L428.1 447c2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4C452.3 441.8 452.3 433.2 447.1 428zM27 192.3c0-91.2 74.2-165.3 165.3-165.3 91.2 0 165.3 74.2 165.3 165.3s-74.1 165.4-165.3 165.4C101.2 357.7 27 283.5 27 192.3z" fill="#FFFFFF" />
               </svg>
               <input class="uk-search-field" placeholder="Search..." autocomplete="off" name="s" id="tags">
               <div class="uk-dropdown uk-dropdown-flip uk-dropdown-search" aria-expanded="false"></div>
            </form>
            <div class="uk-navbar-flip uk-fhidden-small"></div>
         </div>
         <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small " data-uk-offcanvas>
            <svg width="32" height="32" viewBox="0 0 558 558" xml:space="preserve">
               <path d="M67.3 153.9h423.3c37.2 0 67.3-30.1 67.3-67.3 0-37.2-30.2-67.3-67.3-67.3H67.3C30.2 19.2 0 49.4 0 86.6 0 123.8 30.2 153.9 67.3 153.9zM67.3 52.1c19.1 0 34.5 15.4 34.5 34.5s-15.4 34.5-34.5 34.5c-19.1 0-34.5-15.4-34.5-34.5C32.9 67.5 48.3 52.1 67.3 52.1zM490.6 211.6H67.3c-37.2 0-67.3 30.1-67.3 67.3 0 37.2 30.2 67.3 67.3 67.3h423.3c37.2 0 67.3-30.1 67.3-67.3C558 241.8 527.8 211.6 490.6 211.6zM67.3 313.5c-19.1 0-34.5-15.4-34.5-34.5 0-19 15.4-34.5 34.5-34.5 19.1 0 34.5 15.4 34.5 34.5C101.8 298 86.4 313.5 67.3 313.5zM490.6 404H67.3C30.2 404 0 434.2 0 471.4c0 37.2 30.2 67.3 67.3 67.3h423.3c37.2 0 67.3-30.1 67.3-67.3C558 434.2 527.8 404 490.6 404zM67.3 505.9c-19.1 0-34.5-15.4-34.5-34.5 0-19 15.4-34.5 34.5-34.5 19.1 0 34.5 15.4 34.5 34.5C101.8 490.4 86.4 505.9 67.3 505.9z" fill="#FFFFFF"/>
            </svg>
         </a>
         <div class="uk-navbar-flip uk-visible-small">
         </div>
         <a class="uk-navbar-brand uk-navbar-center uk-visible-small" href="<?php echo site_url();?>">
            <svg width="32" height="32" viewBox="0 0 408.2 408.2" xml:space="preserve">
               <path d="M204.1 0C91.4 0 0 91.4 0 204.1c0 112.7 91.4 204.1 204.1 204.1 112.7 0 204.1-91.4 204.1-204.1C408.2 91.4 316.8 0 204.1 0zM286.5 230l-126.4 72.5c-17 9.8-30.8 1.8-30.8-17.8V140c0-19.6 13.8-27.6 30.8-17.8l126.4 72.5C303.6 204.4 303.6 220.2 286.5 230z" fill="#FFFFFF" />
            </svg>
         </a>
      </nav>
