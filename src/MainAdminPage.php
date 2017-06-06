<?php
namespace WppbAdminPage;

/**
 * Class RegisterAdminPage
 *
 * @package WppbAdminPage
 * @since 1.0.0
 */
class MainAdminPage extends AbstractAdminPage {

	/**
	 * The html title tag "Title".
	 *
	 * @var string
	 */
	protected $pageTitle = 'Wppb Admin Menu';

	/**
	 * The Menu Text pointing to this page.
	 *
	 * @var string
	 */
	protected $title = 'Wppb Admin Page';

	/**
	 * The wp capability needed to view this page.
	 *
	 * @var string
	 */
	protected $capability = 'manage_options';

	/**
	 * The unique slug attached to this admin page.
	 *
	 * @var string
	 */
	protected static $slug = 'wppb_admin_menu';

	/**
	 * The icon to show next to the title in the menu.
	 *
	 * @var string
	 */
	protected $icon = 'dashicons-welcome-widgets-menus';

	/**
	 * RegisterAdminPage constructor.
	 *
	 * @param $pluginVersion
	 * @param $pluginSlug
	 */
	function __construct( $pluginVersion, $pluginSlug ) {

		$this->pluginVersion = $pluginVersion;
		$this->pluginSlug    = $pluginSlug;

	}

	/**
	 * Callback method to build the admin page content.
	 *
	 * @since 1.0.0
	 */
	public function pageHtml() {
		echo '<h2>WE DID IT ERRYBODDY</h2>';
		echo 'Running version: ' . $this->pluginVersion;
	}

}