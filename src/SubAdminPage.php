<?php
namespace WppbAdminPage;


class SubAdminPage extends AbstractAdminPage {

	/**
	 * The html title tag "Title".
	 *
	 * @var string
	 */
	protected $pageTitle = 'Wppb Sub Admin';

	/**
	 * The Menu Text pointing to this page.
	 *
	 * @var string
	 */
	protected $title = 'Wppb Sub Page';

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
	protected static $slug = 'wppb_sub_admin_menu';


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
		echo '<h2>WE MADE A SUB PAGE</h2>';
		echo 'Running version: ' . $this->pluginVersion;
	}

}