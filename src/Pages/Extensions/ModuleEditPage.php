<?php
/**
 * @package     Joomla.Tests
 * @subpackage  Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use SeleniumClient\By;

/**
 * Class for the back-end control panel screen.
 *
 * @since  joomla 3.0
 */
class ModuleEditPage extends AdminEditPage
{
	/**
	 * @var array expected id values for tab div elements
	 */
	public $tabs = ['general', 'assignment', 'permissions', 'attrib-advanced'];

	/**
	 * Array of groups for this page. A group is a collapsable slider inside a tab.
	 * The format of this array is <tab id> => <group label>. Note that each menu item type has its own options and its own groups.
	 * These are the common ones for almost all core menu item types.
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $groups = [
		'options' => ['Basic Options', 'Advanced Options'],
	];

	/**
	 * Associative array of expected input fields for the Account Details and Basic Settings tabs
	 * Assigned User Groups tab is omitted because that depends on the groups set up in the sample data
	 *
	 * @var  array
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Parent Category', 'id' => 'jform_params_parent', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Category Descriptions', 'id' => 'jform_params_show_description', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Show Number of Articles', 'id' => 'jform_params_numitems', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Show Subcategories', 'id' => 'jform_params_show_children', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => '# First Subcategories', 'id' => 'jform_params_count', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Maximum Level Depth', 'id' => 'jform_params_maxlevel', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Show Title', 'id' => 'jform_showtitle', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Position', 'id' => 'jform_position', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Start Publishing', 'id' => 'jform_publish_up', 'type' => 'input', 'tab' => 'general'],
		['label' => 'Finish Publishing', 'id' => 'jform_publish_down', 'type' => 'input', 'tab' => 'general'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Ordering', 'id' => 'jform_ordering', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Note', 'id' => 'jform_note', 'type' => 'input', 'tab' => 'general'],
		['label' => 'Module Assignment', 'id' => 'jform_menus', 'type' => 'div', 'tab' => 'assignment'],
		['label' => 'Alternative Layout', 'id' => 'jform_params_layout', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Heading style', 'id' => 'jform_params_item_heading', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Module Class Suffix', 'id' => 'jform_params_moduleclass_sfx', 'type' => 'textarea', 'tab' => 'attrib-advanced'],
		['label' => 'Caching', 'id' => 'jform_params_owncache', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Cache Time', 'id' => 'jform_params_cache_time', 'type' => 'input', 'tab' => 'attrib-advanced'],
		['label' => 'Module Tag', 'id' => 'jform_params_module_tag', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Bootstrap Size', 'id' => 'jform_params_bootstrap_size', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Header Tag', 'id' => 'jform_params_header_tag', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Header Class', 'id' => 'jform_params_header_class', 'type' => 'input', 'tab' => 'attrib-advanced'],
		['label' => 'Module Style', 'id' => 'jform_params_style', 'type' => 'select', 'tab' => 'attrib-advanced'],
		['label' => 'Select Menu', 'id' => 'jform_params_menutype', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Base Item', 'id' => 'jform_params_base', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Start Level', 'id' => 'jform_params_startLevel', 'type' => 'select', 'tab' => 'general'],
		['label' => 'End Level', 'id' => 'jform_params_endLevel', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Show Sub-menu Items', 'id' => 'jform_params_showAllChildren', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Menu Tag ID', 'id' => 'jform_params_tag_id', 'type' => 'input', 'tab' => 'attrib-advanced'],
		['label' => 'Menu Class Suffix', 'id' => 'jform_params_class_sfx', 'type' => 'input', 'tab' => 'attrib-advanced'],
		['label' => 'Target Position', 'id' => 'jform_params_window_open', 'type' => 'input', 'tab' => 'attrib-advanced'],
	];

	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//form[@id='module-form']";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php?option=com_users&view=module&layout=edit';

	/**
	 * Checks for Type and calls special method for this field.
	 * Otherwise, just calls parent::getFieldValue()
	 *
	 * @see AdminEditPage::getFieldValue()
	 */
	public function getFieldValue($label)
	{
		if ($label == 'Type')
		{
			return $this->getModuleType();
		}
		else
		{
			return parent::getFieldValue($label);
		}
	}

	/**
	 * function to get module type
	 *
	 * @return  bool
	 */
	protected function getModuleType()
	{
		$elements = $this->driver->findElements(By::xPath("//span[@class = 'label']"));

		if (count($elements) >= 2)
		{
			return $elements[1]->getText();
		}
		else
		{
			return false;
		}
	}

	/**
	 * function to get tab IDs
	 *
	 * @return  array
	 */
	public function getTabIds()
	{
		$tabs = $this->driver->findElements(By::xPath("//div[@class='tab-content'][@id='myTabContent']/div"));
		$return = [];

		foreach ($tabs as $tab)
		{
			$return[] = $tab->getAttribute('id');
		}

		return $return;
	}
}
