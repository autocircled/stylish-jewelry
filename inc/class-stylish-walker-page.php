<?php
/**
 * Custom page walker for this theme.
 *
 * @package SacchaOne
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Stylish_Walker_Page' ) ) {
	/**
	 * CUSTOM PAGE WALKER
	 * A custom walker for pages.
	 *
	 * @since 1.0
	 */
	class Stylish_Walker_Page extends Walker_Page {
		/**
		 * Outputs the beginning of the current element in the tree.
		 *
		 * @see Walker::start_el()
		 * @since 2.1.0
		 * @since 5.9.0 Renamed `$page` to `$data_object` and `$current_page` to `$current_object_id`
		 *              to match parent class for PHP 8 named parameter support.
		 *
		 * @param string  $output            Used to append additional content. Passed by reference.
		 * @param WP_Post $data_object       Page data object.
		 * @param int     $depth             Optional. Depth of page. Used for padding. Default 0.
		 * @param array   $args              Optional. Array of arguments. Default empty array.
		 * @param int     $current_object_id Optional. ID of the current page. Default 0.
		 */
		public function start_el( &$output, $data_object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			// Restores the more descriptive, specific name for use within this method.
			$page            = $data_object;
			$current_page_id = $current_object_id;

			if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
				$t = "\t";
				$n = "\n";
			} else {
				$t = '';
				$n = '';
			}
			if ( $depth ) {
				$indent = str_repeat( $t, $depth );
			} else {
				$indent = '';
			}

			$css_class = array( 'page_item', 'page-item-' . $page->ID );

			if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
				$css_class[] = 'page_item_has_children';
			}

			if ( ! empty( $current_page_id ) ) {
				$_current_page = get_post( $current_page_id );

				if ( $_current_page && in_array( $page->ID, $_current_page->ancestors, true ) ) {
					$css_class[] = 'current_page_ancestor';
				}

				if ( $page->ID == $current_page_id ) {
					$css_class[] = 'current_page_item';
				} elseif ( $_current_page && $page->ID === $_current_page->post_parent ) {
					$css_class[] = 'current_page_parent';
				}
			} elseif ( get_option( 'page_for_posts' ) == $page->ID ) {
				$css_class[] = 'current_page_parent';
			}

			/**
			 * Filters the list of CSS classes to include with each page item in the list.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_list_pages()
			 *
			 * @param string[] $css_class       An array of CSS classes to be applied to each list item.
			 * @param WP_Post  $page            Page data object.
			 * @param int      $depth           Depth of page, used for padding.
			 * @param array    $args            An array of arguments.
			 * @param int      $current_page_id ID of the current page.
			 */
			$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page_id ) );
			$css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

			if ( '' === $page->post_title ) {
				/* translators: %d: ID of a post. */
				$page->post_title = sprintf( __( '#%d (no title)', 'sacchaone' ), $page->ID );
			}

			$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
			$args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

			$atts                 = array();
			$atts['href']         = get_permalink( $page->ID );
			$atts['aria-current'] = ( $page->ID == $current_page_id ) ? 'page' : '';
			$atts['class']        = 'page_link';

			/**
			 * Filters the HTML attributes applied to a page menu item's anchor element.
			 *
			 * @since 4.8.0
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $href         The href attribute.
			 *     @type string $aria-current The aria-current attribute.
			 * }
			 * @param WP_Post $page            Page data object.
			 * @param int     $depth           Depth of page, used for padding.
			 * @param array   $args            An array of arguments.
			 * @param int     $current_page_id ID of the current page.
			 */
			$atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page_id );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$span = $button = '';
			if( sacchaone_page_has_children( $page->ID ) ){
				$span = '<span role="presentation" class="dropdown-menu-toggle"><span class="sone-icon icon-arrow"><svg class="sone-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="26px" height="16.043px" viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
                </svg></span></span>';
				$button = '<button class="sone-menu-toggle" aria-expanded="false"><span class="screen-reader-text">Menu Toggle</span><span class="sone-icon icon-arrow"><svg class="sone-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="26px" height="16.043px" viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
                </svg></span></button>';
			}

			$output .= $indent . sprintf(
				'<li%s><a%s>%s%s%s%s</a>%s',
				$css_classes,
				$attributes,
				$args['link_before'],
				/** This filter is documented in wp-includes/post-template.php */
				apply_filters( 'the_title', $page->post_title, $page->ID ),
				$span,
				$args['link_after'],
				$button
			);

			if ( ! empty( $args['show_date'] ) ) {
				if ( 'modified' === $args['show_date'] ) {
					$time = $page->post_modified;
				} else {
					$time = $page->post_date;
				}

				$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
				$output     .= ' ' . mysql2date( $date_format, $time );
			}
		}
		
	}
}
