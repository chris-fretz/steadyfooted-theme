<?php
function global_phone_shortcode($attr,$content) {
	ob_start(); 
		$phone = get_field('phone_number', 'options');
	?>
		<a href="tel:<?php echo $phone; ?>" style="margin-right: -4px; white-space: nowrap;"><?php echo $phone; ?></a>
	<?php return ob_get_clean();
}
add_shortcode('phone', 'global_phone_shortcode');

function replace_phone_in_menu_items($items) {
    $phone = get_field('phone_number', 'options');

    foreach ($items as &$item) {
        if (strpos($item->url, '[phone]') !== false) {
			$item->url = esc_url('tel:' . $phone);
        }

        if (strpos($item->title, '[phone]') !== false) {
            $item->title = str_replace('[phone]', $phone, $item->title);
        }
    }

    unset($item);
    
    return $items;
}
add_filter('wp_nav_menu_objects', 'replace_phone_in_menu_items', 10, 2);

add_filter('wp_nav_menu_items', 'do_shortcode');