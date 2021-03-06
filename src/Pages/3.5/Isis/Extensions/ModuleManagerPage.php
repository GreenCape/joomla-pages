<?php
/**
 * @package     Joomla.Tests
 * @subpackage  Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Facebook\WebDriver\WebDriverBy as By;

/**
 * Class for the back-end control panel screen.
 *
 * @since  joomla 3.0
 */
class ModuleManagerPage extends AdminManagerPage
{
	/**
	 * @var  array  Filters
	 */
	public $filters = [
		'Site'     => 'filter_client_id',
		'Status'   => 'filter_state',
		'Position' => 'filter_position',
		'Type'     => 'filter_module',
		'Access'   => 'filter_access',
		'Language' => 'filter_language',
	];

	/**
	 * @var  array  Toolbar
	 */
	public $toolbar = [
		'New'         => 'toolbar-new',
		'Edit'        => 'toolbar-edit',
		'Duplicate'   => 'toolbar-copy',
		'Publish'     => 'toolbar-publish',
		'Unpublish'   => 'toolbar-unpublish',
		'Check In'    => 'toolbar-checkin',
		'Trash'       => 'toolbar-trash',
		'Empty Trash' => 'toolbar-delete',
		'Batch'       => 'toolbar-batch',
		'Options'     => 'toolbar-options',
		'Help'        => 'toolbar-help',
	];

	/**
	 * @var  array  Submenu
	 */
	public $submenu = [
		'option=com_modules&filter_client_id=0',
		'option=com_modules&filter_client_id=1',
	];

	/**
	 * @var  array  Module types
	 */
	public $moduleTypes = [
		['client' => 'site', 'name' => 'Articles - Archived'],
		['client' => 'site', 'name' => 'Articles - Categories'],
		['client' => 'site', 'name' => 'Articles - Category'],
		['client' => 'site', 'name' => 'Articles - Latest'],
		['client' => 'site', 'name' => 'Articles - Most Read'],
		['client' => 'site', 'name' => 'Articles - Newsflash'],
		['client' => 'site', 'name' => 'Articles - Related'],
		['client' => 'site', 'name' => 'Banners'],
		['client' => 'site', 'name' => 'Breadcrumbs'],
		['client' => 'site', 'name' => 'Custom HTML'],
		['client' => 'site', 'name' => 'Feed Display'],
		['client' => 'site', 'name' => 'Footer'],
		['client' => 'site', 'name' => 'Language Switcher'],
		['client' => 'site', 'name' => 'Latest Users'],
		['client' => 'site', 'name' => 'Login'],
		['client' => 'site', 'name' => 'Menu'],
		['client' => 'site', 'name' => 'Random Image'],
		['client' => 'site', 'name' => 'Search'],
		['client' => 'site', 'name' => 'Smart Search'],
		['client' => 'site', 'name' => 'Statistics'],
		['client' => 'site', 'name' => 'Syndication Feeds'],
		['client' => 'site', 'name' => 'Tags - Popular'],
		['client' => 'site', 'name' => 'Tags - Similar'],
		['client' => 'site', 'name' => 'Who\'s Online'],
		['client' => 'site', 'name' => 'Wrapper'],
		['client' => 'administrator', 'name' => 'Admin Sub-Menu'],
		['client' => 'administrator', 'name' => 'Administrator Menu'],
		['client' => 'administrator', 'name' => 'Articles - Latest'],
		['client' => 'administrator', 'name' => 'Custom HTML'],
		['client' => 'administrator', 'name' => 'Feed Display'],
		['client' => 'administrator', 'name' => 'Joomla! Version Information'],
		['client' => 'administrator', 'name' => 'Logged-in Users'],
		['client' => 'administrator', 'name' => 'Login Form'],
		['client' => 'administrator', 'name' => 'Multilingual Status'],
		['client' => 'administrator', 'name' => 'Popular Articles'],
		['client' => 'administrator', 'name' => 'Quick Icons'],
		['client' => 'administrator', 'name' => 'Statistics'],
		['client' => 'administrator', 'name' => 'Title'],
		['client' => 'administrator', 'name' => 'Toolbar'],
		['client' => 'administrator', 'name' => 'User Status'],
	];

	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//ul/li/a[@href='index.php?option=com_modules']";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php?option=com_modules';

	/**
	 * functioon to add a module
	 *
	 * @param   string  $title        name of the module
	 * @param   string  $client       client of the module
	 * @param   string  $type         type of the module
	 * @param   null    $otherFields  values of other input fields
	 *
	 * @return  void
	 */
	public function addModule($title = 'Test Module', $client = 'Site', $type = 'Articles - Archived', $otherFields = null)
	{
		$this->setFilter('filter_client_id', $client);
		$this->clickButton('toolbar-new');
		$this->driver->waitForElementUntilIsPresent(By::xpath("//a/strong[contains(., '" . $type . "')]"))->click();
		$moduleEditPage = $this->test->getPageObject('ModuleEditPage');
		$moduleEditPage->setFieldValues(['Title' => $title]);

		if (is_array($otherFields))
		{
			$moduleEditPage->setFieldValues($otherFields);
		}

		$moduleEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('ModuleManagerPage');
	}

	/**
	 * function to change the state of the module
	 *
	 * @param   string  $name   name of the module
	 * @param   string  $state  state of the module
	 *
	 * @return  void
	 */
	public function changeModuleState($name, $state = 'published')
	{
		$this->searchFor($name);
		$this->checkAll();

		if (strtolower($state) == 'published')
		{
			$this->clickButton('toolbar-publish');
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}
		elseif (strtolower($state) == 'unpublished')
		{
			$this->clickButton('toolbar-unpublish');
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}

		$this->searchFor();
	}

	public function editModule($name, $fields)
	{
		$this->clickItem($name);
		$moduleEditPage = $this->test->getPageObject('ModuleEditPage');
		$moduleEditPage->setFieldValues($fields);
		$moduleEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('ModuleManagerPage');
		$this->searchFor();
	}

	/**
	 * Gets the modules field values. In turn calls getFieldValues of AdminManagerPage after selecting module client.
	 *
	 * @param   string  $title       name of the module
	 * @param   string  $client      client of the module
	 * @param   array   $fieldNames  values of the input fields
	 *
	 * @return  array
	 */
	public function getModuleFieldValues($title, $client, $fieldNames = [])
	{
		$this->setFilter('filter_client_id', $client);

		return $this->getFieldValues('ModuleEditPage', $title, $fieldNames);
	}

	/**
	 * Gets all module types available
	 *
	 * @return  array  Associative array of 'site' or 'administrator' => module name
	 */
	public function getModuleTypes()
	{
		$result  = [];
		$clients = ['Site', 'Administrator'];

		foreach ($clients as $client)
		{
			$this->setFilter('filter_client_id', $client);
			$this->clickButton('toolbar-new');
			$this->driver->waitForElementUntilIsPresent(By::xpath("//h2[contains(., 'Select a Module Type')]"));
			$el             = $this->driver->findElement(By::id('new-modules-list'));
			$moduleElements = $el->findElements(By::xpath("//a/strong"));

			foreach ($moduleElements as $element)
			{
				$result[] = ['client' => strtolower($client), 'name' => $element->getText()];
			}

			$this->driver->findElement(By::xpath("//button[contains(., 'Cancel')]"))->click();
			$this->test->getPageObject('ModuleManagerPage');
		}

		return $result;
	}

	/**
	 * function to get the state of the module
	 *
	 * @param   string  $title  name of the module
	 *
	 * @return  bool|string
	 */
	public function getState($title)
	{
		$result = false;
		$this->searchFor($title);
		$text = $this->driver->findElement(By::xpath("//tbody/tr//a[contains(@onclick, 'listItemTask')]"))->getAttribute('onclick');

		if (strpos($text, 'modules.publish') > 0)
		{
			$result = 'unpublished';
		}
		elseif (strpos($text, 'modules.unpublish') > 0)
		{
			$result = 'published';
		}

		$this->searchFor();

		return $result;
	}
}
