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
class MenuManagerPage extends AdminManagerPage
{
	/**
	 * @var  array  Filters
	 */
	public $filters = [];

	/**
	 * @var  array  Toolbar
	 */
	public $toolbar = [
		'New'     => 'toolbar-new',
		'Edit'    => 'toolbar-edit',
		'Delete'  => 'toolbar-delete',
		'Rebuild' => 'toolbar-refresh',
		'Options' => 'toolbar-options',
		'Help'    => 'toolbar-help',
	];

	/**
	 * @var  array  Sub menu
	 */
	public $submenu = [
		'option=com_menus&view=items',
	];

	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//ul/li/a[@href='index.php?option=com_menus&view=menus']";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php?option=com_menus&view=menus';

	/**
	 * function to add a menu
	 *
	 * @param   string  $title        stores value of title
	 * @param   string  $type         stores value of menu type
	 * @param   string  $description  stores value of description
	 *
	 * @return  AdminPage
	 */
	public function addMenu($title = 'Test Menu', $type = 'testMenu', $description = 'This is a test menu.')
	{
		$this->clickButton('toolbar-new');
		$menuEditPage = $this->test->getPageObject('MenuEditPage');
		$menuEditPage->setFieldValues(['Title' => $title, 'Menu type' => $type, 'Description' => $description]);
		$menuEditPage->clickButton('toolbar-save');

		return $this->test->getPageObject('MenuManagerPage');
	}

	/**
	 * function to delete menu
	 *
	 * @param   string  $title  stores value of title
	 *
	 * @return  void
	 */
	public function deleteMenu($title)
	{
		if ($this->getRowText($title))
		{
			$this->checkBox($title);
			$this->clickButton('toolbar-delete');
			$this->driver->acceptAlert();
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}
	}

	/**
	 * function to check box
	 *
	 * @param   string  $title s tores value of title
	 *
	 * @return  void
	 */
	public function checkBox($title)
	{
		$this->driver->findElement(By::xpath("//td[contains(., '" . $title . "')]/../td/input"))->click();
	}

	/**
	 * function to edit page
	 *
	 * @param   string  $title   stores value of title
	 * @param   array   $fields  stores value of input fields
	 *
	 * @return  AdminPage
	 */
	public function editMenu($title, $fields)
	{
		$this->checkBox($title);
		$this->clickButton('Edit');

		/* @var $menuEditPage MenuEditPage */
		$menuEditPage = $this->test->getPageObject('MenuEditPage');
		$menuEditPage->setFieldValues($fields);
		$menuEditPage->clickButton('toolbar-save');

		return $this->test->getPageObject('MenuManagerPage');
	}

	/**
	 * Returns an array of field values from an edit screen.
	 *
	 * @param   string $className
	 * @param   string $itemName   Name of item (user name, article title, and so on)
	 * @param   array  $fieldNames Array of field labels to get values of.
	 *
	 * @return string
	 */
	public function getFieldValues($className, $itemName, $fieldNames)
	{
		$this->checkBox($itemName);
		$this->clickButton('Edit');
		/** @var AdminEditPage $editItem */
		$editItem       = $this->test->getPageObject($className);
		$this->editItem = $editItem;
		$result         = [];

		if (is_array($fieldNames))
		{
			foreach ($fieldNames as $name)
			{
				$result[] = $this->editItem->getFieldValue($name);
			}
		}

		$this->editItem->saveAndClose();

		return $result;
	}
}
