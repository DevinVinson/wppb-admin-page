<?php
namespace WppbAdminPage;

/**
 * Class AbstractAdminPage
 * @package WppbAdminPage
 */
abstract class AbstractAdminPage {

	/**
	 * The text to be displayed in the title tags of the page when the menu is selected.
	 *
	 * @var string
	 */
	protected $pageTitle;

	/**
	 * The text to be used for the menu.
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * The capability required for this menu to be displayed to the user.
	 *
	 * @var string
	 */
	protected $capability;

	/**
	 * The slug name to refer to this menu by (should be unique for this menu).
	 *
	 * @var string
	 */
	protected static $slug;

	/**
	 * The URL to the icon to be used for this menu.
	 *
	 * Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with 'data:image/svg+xml;base64,'.
	 * Pass the name of a Dashicons helper class to use a font icon, e.g. 'dashicons-chart-pie'.
	 * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via
	 *
	 * @var string
	 */
	protected $icon = 'dashicons-dashboard';

	/**
	 * The position in the menu order this one should appear.
	 *
	 * @var int|null
	 */
	protected $position = null;

	/**
	 * The slug name for the parent menu (or the file name of a standard WordPress admin page).
	 *
	 * @var bool|string
	 */
	protected $parent = false;

	/**
	 * The slug of the plugin implementing the final class.
	 *
	 * @var string
	 */
	public $pluginSlug;

	/**
	 * The version of the plugin implementing the final class.
	 *
	 * @var int
	 */
	public $pluginVersion;

	/**
	 * The callback for displaying the admin page content.
	 *
	 * @return mixed
	 */
	abstract public function pageHtml();

	/**
	 * Get the Page Title.
	 *
	 * @return string
	 */
	public function getPageTitle() {
		return $this->pageTitle;
	}

	/**
	 * Get the Menu Title.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Get the menu slug.
	 *
	 * @return string
	 */
	public function getSlug() {
		return static::$slug;
	}

	/**
	 * Get parent slug or false if not a sub menu.
	 *
	 * @return bool|string
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Get the capability needed to view this admin menu page.
	 *
	 * @return string
	 */
	public function getCapability() {
		return $this->capability;
	}

	/**
	 * Get the icon string set to display for the menu item.
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Get the position of menu item if set.
	 *
	 * @return int|null
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * Get the body html passed to the admin page content.
	 *
	 * @return mixed
	 */
	public function getPageHtml() {
		return $this->pageHtml();
	}

	public function runMenuHook(){
		add_action( 'admin_menu', [ $this, 'menuHook' ] );
	}

	public function runSubMenuHook( $parentSlug ){
		$this->parent = $parentSlug;
		add_action( 'admin_menu', [ $this, 'submenuHook' ] );
	}

	/**
	 * Method to load on admin_menu hook for a Menu.
	 */
	public function menuHook() {
		add_menu_page( __( $this->getPageTitle(), $this->pluginSlug), __( $this->getTitle(), $this->pluginSlug ), $this->getCapability(), $this->getSlug(), [$this, 'pageHtml' ], $this->getIcon(), $this->getPosition() );

	}

	/**
	 *  Method to load on admin_menu hook for a Sub Menu.
	 */
	public function submenuHook() {
		add_submenu_page( $this->parent, __( $this->getPageTitle(), $this->pluginSlug), __( $this->getTitle(), $this->pluginSlug ), $this->getCapability(), $this->getSlug(), [ $this, 'pageHtml'] );
	}

}

