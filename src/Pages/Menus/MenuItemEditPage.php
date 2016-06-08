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
class MenuItemEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $tabs = [
		'details',
		'attrib-menu-options',
		'attrib-page-options',
		'attrib-metadata',
		'modules',
		'attrib-basic'
	];

	/**
	 * Array of tab labels for this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $tabLabels = ['Details', 'Advanced Options', 'Module Assignment'];

	/**
	 * Array of groups for this page. A group is a collapsable slider inside a tab.
	 *
	 * The format of this array is <tab id> => <group label>. Note that each menu item type has its own options and its own groups.
	 * These are the common ones for almost all core menu item types.
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $groups = [
		'options' => ['Link Type', 'Page Display', 'Metadata'],
	];

	/**
	 * Associative array of expected input fields for the Menu Manager: Add / Edit Menu
	 *
	 * @var   array
	 */
	public $inputFields = [
		['label' => 'Menu Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Menu Item Type', 'id' => 'jform_type', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Link', 'id' => 'jform_link', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Target Window', 'id' => 'jform_browserNav', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Template Style', 'id' => 'jform_template_style_id', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Menu Location', 'id' => 'jform_menutype', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Parent Item', 'id' => 'jform_parent_id', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Default Page', 'id' => 'jform_home', 'type' => 'fieldset', 'tab' => 'details'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Note', 'id' => 'jform_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Link Title Attribute', 'id' => 'jform_params_menu_anchor_title', 'type' => 'input', 'tab' => 'attrib-menu-options'],
		['label' => 'Link CSS Style', 'id' => 'jform_params_menu_anchor_css', 'type' => 'input', 'tab' => 'attrib-menu-options'],
		['label' => 'Link Image', 'id' => 'jform_params_menu_image', 'type' => 'input', 'tab' => 'attrib-menu-options'],
		['label' => 'Add Menu Title', 'id' => 'jform_params_menu_text', 'type' => 'fieldset', 'tab' => 'attrib-menu-options'],
		['label' => 'Browser Page Title', 'id' => 'jform_params_page_title', 'type' => 'input', 'tab' => 'attrib-page-options'],
		['label' => 'Show Page Heading', 'id' => 'jform_params_show_page_heading', 'type' => 'fieldset', 'tab' => 'attrib-page-options'],
		['label' => 'Page Heading', 'id' => 'jform_params_page_heading', 'type' => 'input', 'tab' => 'attrib-page-options'],
		['label' => 'Page Class', 'id' => 'jform_params_pageclass_sfx', 'type' => 'input', 'tab' => 'attrib-page-options'],
		['label' => 'Meta Description', 'id' => 'jform_params_menu_meta_description', 'type' => 'textarea', 'tab' => 'attrib-metadata'],
		['label' => 'Meta Keywords', 'id' => 'jform_params_menu_meta_keywords', 'type' => 'textarea', 'tab' => 'attrib-metadata'],
		['label' => 'Robots', 'id' => 'jform_params_robots', 'type' => 'select', 'tab' => 'attrib-metadata'],
		['label' => 'Secure', 'id' => 'jform_params_secure', 'type' => 'select', 'tab' => 'attrib-metadata'],
		['label' => 'Hide Unassigned Modules', 'id' => 'showmods', 'type' => 'input', 'tab' => 'modules'],
		['label' => 'Show Title', 'id ' => 'jform_params_show_title', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Linked Titles', 'id' => 'jform_params_link_titles', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Intro Text', 'id' => 'jform_params_show_intro', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Position of Article Info', 'id' => 'jform_params_info_block_position', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Category', 'id' => 'jform_params_show_category', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Link Category', 'id' => 'jform_params_link_category', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Parent', 'id' => 'jform_params_show_parent', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Link Parent', 'id' => 'jform_params_link_parent_category', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Author', 'id' => 'jform_params_show_author', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Link Author', 'id' => 'jform_params_link_author', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Create Date', 'id' => 'jform_params_show_create', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Modify Date', 'id' => 'jform_params_show_modify_date', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Publish Date', 'id' => 'jform_params_show_publish_date', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Navigation', 'id' => 'jform_params_show_item_navigation', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Voting', 'id' => 'jform_params_show_vote', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Tags', 'id' => 'jform_params_show_tags', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Icons', 'id' => 'jform_params_show_icons', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Print Icon', 'id' => 'jform_params_show_print_icon', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Email Icon', 'id' => 'jform_params_show_email_icon', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Hits', 'id' => 'jform_params_show_hits', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Show Unauthorised Links', 'id' => 'jform_params_show_noauth', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
		['label' => 'Positioning of the Links', 'id' => 'jform_params_urls_position', 'type' => 'fieldset', 'tab' => 'attrib-basic'],
	];

	/**
	 * @var  array  Menu item types
	 */
	public $menuItemTypes = [
		['group' => 'Articles', 'type' => 'Archived Articles '],
		['group' => 'Articles', 'type' => 'Category Blog '],
		['group' => 'Articles', 'type' => 'Category List '],
		['group' => 'Articles', 'type' => 'Create Article '],
		['group' => 'Articles', 'type' => 'Featured Articles '],
		['group' => 'Articles', 'type' => 'List All Categories '],
		['group' => 'Articles', 'type' => 'Single Article '],
		['group' => 'Configuration Manager', 'type' => 'Display Site Configuration Options '],
		['group' => 'Configuration Manager', 'type' => 'Display Template Options '],
		['group' => 'Contacts', 'type' => 'Featured Contacts '],
		['group' => 'Contacts', 'type' => 'List All Contact Categories '],
		['group' => 'Contacts', 'type' => 'List Contacts in a Category '],
		['group' => 'Contacts', 'type' => 'Single Contact '],
		['group' => 'News Feeds', 'type' => 'List All News Feed Categories '],
		['group' => 'News Feeds', 'type' => 'List News Feeds in a Category '],
		['group' => 'News Feeds', 'type' => 'Single News Feed '],
		['group' => 'Search', 'type' => 'Search Form or Search Results '],
		['group' => 'Smart Search', 'type' => 'Search '],
		['group' => 'System Links', 'type' => 'External URL '],
		['group' => 'System Links', 'type' => 'Menu Heading '],
		['group' => 'System Links', 'type' => 'Menu Item Alias '],
		['group' => 'System Links', 'type' => 'Text Separator '],
		['group' => 'Tags', 'type' => 'Compact list of tagged items '],
		['group' => 'Tags', 'type' => 'List of all tags '],
		['group' => 'Tags', 'type' => 'Tagged Items '],
		['group' => 'Users Manager', 'type' => 'Edit User Profile '],
		['group' => 'Users Manager', 'type' => 'Login Form '],
		['group' => 'Users Manager', 'type' => 'Password Reset '],
		['group' => 'Users Manager', 'type' => 'Registration Form '],
		['group' => 'Users Manager', 'type' => 'User Profile '],
		['group' => 'Users Manager', 'type' => 'Username Reminder Request '],
		['group' => 'Wrapper', 'type' => 'Iframe Wrapper '],
	];

	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//form[@id='item-form']";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php?option=com_menus&view=item&layout=edit';

	/**
	 * function to get field value
	 *
	 * @param   string  $label  stores label
	 *
	 * @return  bool|String
	 */
	public function getFieldValue($label)
	{
		$result = false;

		if (strtolower($label) === 'menu item type')
		{
			$result = $this->getMenuItemType($label);
		}
		elseif (in_array(strtolower($label), ['article', 'contact', 'newsfeed', 'weblink']))
		{
			$result = $this->getRequestVariable($label);
		}
		elseif (strtolower($label) == 'category')
		{
			$result = parent::getSelectValues(['tab' => 'Details', 'id' => 'jform_request_id']);
		}
		else
		{
			$result = parent::getFieldValue($label);
		}

		return $result;
	}

	/**
	 * function to get menu type
	 *
	 * @return  string
	 */
	public function getMenuItemType()
	{
		return $this->driver->findElement(By::xPath("//label[@id='jform_type-lbl']/../..//input"))
		                    ->getAttribute('value');
	}

	/**
	 * function to get request variable
	 *
	 * @return  string
	 */
	public function getRequestVariable()
	{
		return $this->driver->findElement(By::id('jform_request_id_name'))->getAttribute('value');
	}

	/**
	 * function to get all menu types
	 *
	 * @return  array
	 */
	public function getMenuItemTypes()
	{
		$result = [];
		$driver = $this->driver;
		$driver->findElement(By::xPath("//a[contains(@onclick, 'option=com_menus&view=menutypes')]"))->click();
		$element = $driver->waitForElementUntilIsPresent(By::xPath("//iframe[contains(@src, 'option=com_menus&view=menutypes')]"));
		$element = $driver->switchTo()->getFrameByWebElement($element);
		$groups  = $driver->findElements(By::className('accordion-group'));

		foreach ($groups as $group)
		{
			$toggle     = $group->findElement(By::className('accordion-toggle'));
			$toggleName = $toggle->getText();
			$toggle->click();
			$driver->waitForElementUntilIsPresent(By::xPath("//div[contains(@class, 'accordion-body in')]/div/ul/li/a"));
			$menuTypes = $element->findElements(By::xPath("//div[contains(@class, 'accordion-body in')]/div/ul/li/a"));

			foreach ($menuTypes as $menuType)
			{
				$allText       = $menuType->getText();
				$subTextLength = strlen($menuType->findElement(By::tagName('small'))->getText());
				$menuTypeText  = substr($allText, 0, (strlen($allText) - $subTextLength));
				$result[]      = ['group' => $toggleName, 'type' => $menuTypeText];
			}
		}

		return $result;
	}

	/**
	 * function to set value
	 *
	 * @param   string  $label  stores value of label
	 * @param   string  $value  stores value
	 *
	 * @return  $this
	 */
	public function setFieldValue($label, $value)
	{
		if (strtolower($label) === 'menu item type')
		{
			$this->setMenuItemType($value);
		}
		elseif (in_array(strtolower($label), ['article', 'contact', 'newsfeed', 'weblink']))
		{
			$this->setRequestVariable($value);
		}
		elseif (in_array(strtolower($label), ['category']))
		{
			parent::setSelectValues(['tab' => 'Details', 'id' => 'jform_request_id', 'value' => $value]);
		}
		else
		{
			parent::setFieldValue($label, $value);
		}

		return $this;
	}

	/**
	 * function to set menu type
	 *
	 * @param   string  $value  stores value
	 *
	 * @return  $this
	 */
	public function setMenuItemType($value)
	{
		$group = $this->getGroupName($value);
		$d     = $this->driver;
		$d->findElement(By::xPath("//input[@id='jform_title']"))->click();
		$d->findElement(By::xPath("//a[contains(@onclick, 'option=com_menus&view=menutypes')]"))->click();
		$el = $d->waitForElementUntilIsPresent(By::xPath("//iframe[contains(@src, 'option=com_menus&view=menutypes')]"));
		$el = $d->switchTo()->getFrameByWebElement($el);
		$d->waitForElementUntilIsPresent(By::xPath("//a[contains(@class, 'accordion-toggle')][contains(., '" . $group . "')]"), 10);
		$el->findElement(By::xPath("//a[contains(@class, 'accordion-toggle')][contains(., '" . $group . "')]"))
		   ->click();
		$d->waitForElementUntilIsPresent(By::xPath("//div[contains(@class, 'accordion-body in')]/div/ul/li/a"));
		$el->findElement(By::xPath("//div[contains(@class, 'accordion-body in')]//a[contains(text(), '" . $value . "')]"))
		   ->click();
		$d->waitForElementUntilIsNotPresent(By::xPath("//iframe[contains(@src, 'option=com_menus&view=menutypes')]"));
		$d->waitForElementUntilIsPresent(By::id('jform_title'));
		$d->switchTo()->getDefaultFrame();

		return $this;
	}

	/**
	 * function to get the group name
	 *
	 * @param   string  $value  stores value
	 *
	 * @return  string|bool
	 */
	protected function getGroupName($value)
	{
		foreach ($this->menuItemTypes as $array)
		{
			if (strpos($array['type'], $value) !== false)
			{
				return $array['group'];
			}
		}

		return false;
	}

	/**
	 * function to set request variable
	 *
	 * @param   string  $value s tores  value
	 *
	 * @return void
	 */
	public function setRequestVariable($value)
	{
		$this->selectTab('Details');
		$d = $this->driver;
		$d->findElement(By::xPath("//a[contains(@class, 'modal btn')][contains(@rel, 'iframe')]"))->click();
		$frameElement = $d->waitForElementUntilIsPresent(By::xPath("//iframe[contains(@src, 'layout=modal')]"));
		$d->switchTo()->getFrameByWebElement($frameElement);
		$filter = $d->waitForElementUntilIsPresent(By::id('filter_search'));
		$filter->clear();
		$filter->sendKeys($value);
		$d->findElement(By::xPath("//button[@data-original-title = 'Search']"))->click();
		$d->waitForElementUntilIsPresent(By::xPath("//button[@data-original-title = 'Search']"));
		$d->findElement(By::xPath("//a[contains(text(), '" . $value . "')]"))->click();
		$d->waitForElementUntilIsNotPresent(By::xPath("//iframe[contains(@src, 'layout=modal')]"));
		$d->switchTo()->getDefaultFrame();
	}
}
