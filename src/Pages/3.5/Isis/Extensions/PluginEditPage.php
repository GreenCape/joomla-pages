<?php
/**
 * @package     Joomla.Test
 * @subpackage  Webdriver
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Page class for the back-end menu Plugin manager screen.
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.0
 */
class PluginEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabs = ['general'];

	/**
	 * Array of tab labels for this page
	 *
	 * Basic Options screen would be present in some plugins and in some plugins the screen would not be present
	 * 
	 * @var    array
	 * @since  3.0
	 */
	public $tabLabels = ['Details', 'Basic Options'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $inputFields = [
		['label' => 'Status', 'id' => 'jform_enabled', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Ordering', 'id' => 'jformordering', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Check category deletion', 'id' => 'jform_params_check_categories', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Email on new site article', 'id' => 'jform_params_email_new_fe', 'type' => 'fieldset', 'tab' => 'general'],
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $waitForXpath = "//form[@id='style-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $url = 'administrator/index.php?option=com_plugins&view=plugin&layout=edit';
}
