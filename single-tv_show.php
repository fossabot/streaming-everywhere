<?php /*The template for displaying all Tv-Shows posts. */get_header();?>
<?php if (have_posts()) :while ( have_posts()) : the_post(); ?>
<div id="tm-media-section">
   <div class="uk-container uk-container-center uk-width-8-10">
      <div class="media-container  uk-container-center">
      </div>
      <div class="uk-grid">
         <div class="uk-width-medium-3-10">
            <div class="media-cover">
               <?php the_post_thumbnail(); ?>
            </div>
         </div>
         <div class="uk-width-medium-7-10">
            <div>
               <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                  <li class="uk-width-medium-1-3 uk-active"><a href="">Description</a></li>
                  <li class="uk-width-medium-1-3"><a href="">Episodes</a></li>
                  <li class="uk-width-medium-1-3"><a href="">Watch</a></li>
                  <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true">
                     <a>Active</a>
                     <div class="uk-dropdown uk-dropdown-small uk-dropdown-up">
                        <ul class="uk-nav uk-nav-dropdown"></ul>
                     </div>
                  </li>
               </ul>
            </div>
            <ul id="media-tabs" class="uk-switcher">
               <li>
                  <h2 class="uk-text-contrast uk-margin-large-top"><?php the_title(); ?></h2>
                  <ul class="uk-subnav uk-subnav-line">
                     <li>
                        <svg viewBox="0 0 55.9 55.9" width="16" height="16">
                           <path d="M55.8 21.6c-0.1-0.4-0.4-0.6-0.8-0.7L36.9 18.3 28.8 1.9c-0.2-0.3-0.5-0.6-0.9-0.6s-0.7 0.2-0.9 0.6l-8.1 16.4 -18.1 2.6c-0.4 0.1-0.7 0.3-0.8 0.7 -0.1 0.4 0 0.8 0.3 1l13.1 12.8 -3.1 18c-0.1 0.4 0.1 0.8 0.4 1 0.3 0.2 0.7 0.3 1.1 0.1l16.2-8.5 16.2 8.5c0.1 0.1 0.3 0.1 0.5 0.1 0.2 0 0.4-0.1 0.6-0.2 0.3-0.2 0.5-0.6 0.4-1l-3.1-18 13.1-12.8C55.8 22.3 55.9 21.9 55.8 21.6z" fill="#FFFFFF" />
                        </svg>
                        <?php echo get_post_meta(get_the_ID(), '_rating_tv', true);?>
                     </li>
                     <li>
                        <svg viewBox="0 0 300 300" width="16" height="16">
                           <path d="M150 0C67.2 0 0 67.2 0 150s67.2 150 150 150 150-67.2 150-150S232.8 0 150 0zM214.8 178.5H151.3c-0.2 0-0.4-0.1-0.6-0.1 -0.2 0-0.4 0.1-0.6 0.1 -5.7 0-10.4-4.6-10.4-10.4V62.2c0-5.7 4.6-10.4 10.4-10.4s10.4 4.6 10.4 10.4v95.5h54.5c5.7 0 10.4 4.6 10.4 10.4C225.2 173.9 220.6 178.5 214.8 178.5z" fill="#FFFFFF" />
                        </svg>
                        <?php echo get_post_meta(get_the_ID(),'_tv_duration',true);?>
                     </li>
                     <li>
                        <svg viewBox="0 0 60 60" width="16" height="16">
                           <path d="M57 4h-7V1c0-0.6-0.4-1-1-1h-7c-0.6 0-1 0.4-1 1v3H19V1c0-0.6-0.4-1-1-1h-7c-0.6 0-1 0.4-1 1v3H3C2.4 4 2 4.4 2 5v11 43c0 0.6 0.4 1 1 1h54c0.6 0 1-0.4 1-1V16 5C58 4.4 57.6 4 57 4zM43 2h5v3 3h-5V5 2zM12 2h5v3 3h-5V5 2zM4 6h6v3c0 0.6 0.4 1 1 1h7c0.6 0 1-0.4 1-1V6h22v3c0 0.6 0.4 1 1 1h7c0.6 0 1-0.4 1-1V6h6v9H4V6zM4 58V17h52v41H4zM38 23h-7 -2 -7 -2 -9v9 2 7 2 9h9 2 7 2 7 2 9v-9 -2 -7 -2 -9h-9H38zM31 25h7v7h-7V25zM38 41h-7v-7h7V41zM22 34h7v7h-7V34zM22 25h7v7h-7V25zM13 25h7v7h-7V25zM13 34h7v7h-7V34zM20 50h-7v-7h7V50zM29 50h-7v-7h7V50zM38 50h-7v-7h7V50zM47 50h-7v-7h7V50zM47 41h-7v-7h7V41zM47 25v7h-7v-7H47z" fill="#FFFFFF" />
                        </svg>
                        <?php echo get_post_meta(get_the_ID(), '_tv_date', true);?>
                     </li>
                  </ul>
                  <hr>
                  <p class="uk-text-muted uk-h4"><?php the_content();?></p>
                  <dl class="uk-description-list-horizontal uk-margin-top">
                     <dt>Starring</dt>
                     <dd>
                        <ul class="uk-subnav">
                           <?php $strings = get_post_meta(get_the_ID(), '_tv_starring', true);
                              $array1 = explode (',', $strings);
                              foreach($array1 as $item):
                              ?>
                           <li><?php echo $item; ?></li>
                           <?php endforeach; ?>
                        </ul>
                     </dd>
                     <dt>Genres</dt>
                     <dd>
                        <ul class="uk-subnav">
                           <?php $genar1 = get_post_meta(get_the_ID(),'_tv_genres', true);
                              $genars = explode (',', $genar1);
                              foreach ($genars as $genar) : ?>
                           <li><?php echo $genar; ?></li>
                           <?php endforeach;?>
                        </ul>
                     </dd>
                     <dt>Languages</dt>
                     <dd>
                        <ul class="uk-subnav">
                           <?php $lang1 = get_post_meta(get_the_ID(), '_tv_languages', true);
                              $langs = explode(',', $lang1);
                              foreach($langs as $lang) : ?>
                           <li><?php echo $lang; ?></li>
                           <?php endforeach; ?>
                        </ul>
                     </dd>
                  </dl>
               </li>
               <li>
                  <?php $episodes = get_post_meta(get_the_ID(), '_group_fields_', true);foreach($episodes as $episode) :?>
                  <button class="accordion"><?php echo $episode['_series_title_']; ?></button>
                  <div class="panel">
                     <ul id="myUL">
                        <?php $title_links = $episode['_epi_link_'];$titlee = $episode['_epi_title_'];if(is_array($title_links)):foreach($title_links as $key => $title_link) : ?>
                        <li><a target="_blank" href="<?php echo $title_link; ?>"> <?php echo $titlee[$key]; ?></a></li>
                        <?php endforeach;endif;?>
                     </ul>
                  </div>
                  <?php endforeach;?>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<?php endwhile;  wp_reset_query(); endif;?>
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
<div class="uk-block ">
   <div class="uk-container-center uk-container uk-margin-large-bottom">
      <h3 class="uk-margin-large-bottom uk-text-contrast">You might also like</h3>
      <div class="uk-margin" data-uk-slideset="{small: 2, medium: 4, large: 6}">
         <div class="uk-slidenav-position uk-margin">
            <ul class="uk-slideset uk-grid uk-flex-center">
               <?php $query_argss = array( 'post_type' => 'post', 'category' => '5', ); $the_query1 = new WP_Query($query_argss); if ($the_query1->have_posts()) : ?>
               <?php while ($the_query1->have_posts()) : $the_query1->the_post(); ?>
               <li><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a></li>
               <?php endwhile;endif;wp_reset_query();?>
            </ul>
         </div>
         <ul class="uk-slideset-nav uk-dotnav uk-dotnav-contrast uk-flex-center uk-margin-top"></ul>
      </div>
   </div>
</div>
<?php get_footer();?>
