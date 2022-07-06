<?php
// Web Component Library Navigation
class ucla_header_menu_walker extends Walker_Nav_Menu {
  /**
   * @see Walker::display_element()
   * @since 2.5.0
	 *
	 * @param object $element           Data object.
	 * @param array  $children_elements List of elements to continue traversing (passed by reference).
	 * @param int    $max_depth         Max depth to traverse.
	 * @param int    $depth             Depth of current element.
	 * @param array  $args              An array of arguments.
	 * @param string $output            Used to append additional content (passed by reference).
   */
  function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output)
  {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Menu item data object.
   * @param int $depth Depth of menu item. Used for padding.
   * @param int $current_page Menu item ID.
   * @param object $args
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( $args->has_children && $depth == 0 ) {
      $item->classes[] = 'nav-primary__link--has-children';
    } elseif ($args->has_children && $depth == 1) {
      $item->classes[] = 'nav-primary__link-2--has-children';
    }
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'nav-primary__item menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    $output .= $indent . '<li' . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="nav-primary__link' . (in_array("current_page_item", $item->classes) || in_array("current-menu-parent", $item->classes) ? ' nav-primary__link--current-page' : '') . ($args->has_children ? ' menu-item-has-children--link' : '') . '"';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    if ( $args->has_children && $depth == 0 ) {
      $item_output .= '<button class="nav-primary__toggle has-child--button" aria-label="toggle"></button>';
    } elseif ($args->has_children && $depth == 1) {
      $item_output .= '<button class="nav-primary__toggle-2 has-child--button" aria-label="toggle"></button>';
    }
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

  /**
   * @see Walker::start_lvl()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    if ($depth === 1) {
      $output .= "\n<ul class=\"nav-primary__sublist-2\">$indent</li>\n";
    } else {
      $output .= "\n<ul class=\"nav-primary__sublist\">$indent</li>\n";
    }
  }

  /**
   * @see Walker::end_lvl()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
   */
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  /**
   * @see Walker::end_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Page data object. Not used.
   * @param int $depth Depth of page. Not Used.
   */
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}