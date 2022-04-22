<?php


namespace Elgg\Jobs\Menus;


/**
 * Hook callbacks for menus
 *
 * @since 4.0
 * @internal
 */
class Site {

	/**
	 * Register item to menu
	 *
	 * @param \Elgg\Hook $hook 'register', 'menu:site'
	 *
	 * @return void|\Elgg\Menu\MenuItems
	 */
	public static function register(\Elgg\Hook $hook) {
		$return = $hook->getValue();
		$return[] = \ElggMenuItem::factory([
			'name' => 'jobs',
			'icon' => 'edit-regular',
			'text' => elgg_echo('collection:object:jobs'),
			'href' => elgg_generate_url('default:object:jobs'),
		]);
	
		return $return;
	}
}
