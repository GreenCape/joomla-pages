<?php
/**
 * @package     Joomla.Test
 * @subpackage  Webdriver
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

use Facebook\WebDriver\WebDriverBy as By;

/**
 * Page class for the back-end component weblink menu.
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.2
 */
class WeblinkManagerPage extends AdminManagerPage
{
	/**
	 * Array of filter id values for this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $filters = [
		'Select Status'   => 'filter_state',
		'Select Category' => 'filter_category_id',
		'Select Access'   => 'filter_access',
		'Select Language' => 'filter_language',
		'Select Tag'      => 'filter_tag',
	];

	/**
	 * Array of toolbar id values for this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $toolbar = [
		'New'         => 'toolbar-new',
		'Edit'        => 'toolbar-edit',
		'Publish'     => 'toolbar-publish',
		'Unpublish'   => 'toolbar-unpublish',
		'Archive'     => 'toolbar-archive',
		'Check In'    => 'toolbar-check-in',
		'Trash'       => 'toolbar-trash',
		'Empty Trash' => 'toolbar-delete',
		'Batch'       => 'toolbar-batch',
		'Options'     => 'toolbar-options',
		'Help'        => 'toolbar-help',
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//ul/li/a[@href='index.php?option=com_weblinks']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = 'administrator/index.php?option=com_weblinks';

	/**
	 * Add a new Weblink item in the Weblink Manager: Component screen.
	 *
	 * @param   string $name   Test Weblink Name
	 * @param   string $url
	 * @param   array  $fields associative array of fields in the form label => value.
	 *
	 * @return WeblinkManagerPage
	 */
	public function addWeblink($name = 'Test Weblink', $url, $fields)
	{
		$this->clickButton('toolbar-new');
		$contactEditPage = $this->test->getPageObject('WeblinkEditPage');
		$contactEditPage->setFieldValues(['Title' => $name, 'URL' => $url]);
		if ($fields)
		{
			$contactEditPage->setFieldValues($fields);
		}
		$contactEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('WeblinkManagerPage');
	}

	/**
	 * Edit a Weblink item in the Weblink Manager: Weblink Items screen.
	 *
	 * @param   string  $name    Weblink Title field
	 * @param   array   $fields  Associative array of fields in the form label => value.
	 *
	 * @return  void
	 */
	public function editWeblink($name, $fields)
	{
		$this->clickItem($name);
		$contactEditPage = $this->test->getPageObject('WeblinkEditPage');
		$contactEditPage->setFieldValues($fields);
		$contactEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('WeblinkManagerPage');
		$this->searchFor();
	}

	/**
	 * Get state  of a Weblink item in the Weblink Manager: Weblink Items screen.
	 *
	 * @param   string  $name  Weblink Title field
	 *
	 * @return  string  State of the Weblink ('published' or 'unpublished')
	 */
	public function getState($name)
	{
		$result = false;
		$row    = $this->getRowNumber($name);
		$text   = $this->driver->findElement(By::xpath("//tbody/tr[" . $row . "]/td[3]//a"))->getAttribute('onclick');
		if (strpos($text, 'weblinks.unpublish') > 0)
		{
			$result = 'published';
		}
		if (strpos($text, 'weblinks.publish') > 0)
		{
			$result = 'unpublished';
		}

		return $result;
	}

	/**
	 * Change state of a Weblink item in the Weblink Manager: Weblink Items screen.
	 *
	 * @param   string  $name   Weblink Title field
	 * @param   string  $state  State of the Weblink
	 *
	 * @return  void
	 */
	public function changeWeblinkState($name, $state = 'published')
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
}
