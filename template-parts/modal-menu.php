<?php
/**
 * Template part for displaying modal menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SacchaOne
 */

?>
<div class="saccha-sm-menu-modal modal fade" id="site-navigation-mobile" tabindex="-1" aria-hidden="true">
	<div class="saccha-sm-menu-inner modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn btn-outline-primary saccha-btn-close" data-dismiss="modal" aria-label="Close">
					<span class="fa fa-times"></span>
					<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
						<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
					</svg> -->
				</button>
			</div>
			<div class="modal-body">
			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'depth'           => 4,
						'container'       => 'div',
						'container_class' => 'main-navigation mobile',
						// 'container_id'    => 'navbar-collapse',
						'menu_class'      => 'nav nav-menu',
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'walker'          => new Stylish_Walker_Menu(),
					)
				);
			else :
				wp_page_menu(
					array(
						'container'  => 'div',
						// 'menu_id' => 'main-navigation',
						'menu_class' => 'main-navigation mobile',
						'before'     => '<ul class="nav nav-menu">',
						'walker'          => new Stylish_Walker_Page(),
					)
				);
			endif;
			?>
			</div>
		</div>
	</div>
</div>
