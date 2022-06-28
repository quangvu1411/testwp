<?php
// ! Menu walker
class Default_Walker extends Walker_Nav_Menu
{
	public $tree_type = array('post_type', 'taxonomy', 'custom');
	public $db_fields = array(
		'parent' => 'menu_item_parent',
		'id'     => 'db_id',
	);
	public function start_lvl(&$output, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);
		$classes = array('sub-menu');
		$class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		$output .= "{$n}{$indent}<ul$class_names>{$n}";
	}
	public function end_lvl(&$output, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent  = str_repeat($t, $depth);
		$output .= "$indent</ul>{$n}";
	}
	public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
	{
		$menu_item = $data_object;
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ($depth) ? str_repeat($t, $depth) : '';
		$classes   = empty($menu_item->classes) ? array() : (array) $menu_item->classes;
		$classes[] = 'menu-item-' . $menu_item->ID;
		$args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);
		$class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
		$sub_custom_class = '';
		$description = $menu_item->description;
		if ($description) {
			$sub_custom_class = ' menu-item-has-children has-sub-block';
		}
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . $sub_custom_class . '"' : '';
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '<li' . $id . $class_names . '>';
		$atts           = array();
		$atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
		$atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
		if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $menu_item->xfn;
		}
		$atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
		$atts['aria-current'] = $menu_item->current ? 'page' : '';
		$atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);
		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (is_scalar($value) && '' !== $value && false !== $value) {
				$value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$title = apply_filters('the_title', $menu_item->title, $menu_item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);
		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		if ($description) {
			$item_output .= '<div class="sub-menu-block"><div class="container">' . do_shortcode($description) . '</div></div>';
		}
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
	}
	public function end_el(&$output, $data_object, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
	}
}