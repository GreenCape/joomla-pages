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
 */
class ControlPanelPage extends AdminPage
{
	/**
	 * @var  array  Array of Control Panel icon text and links
	 */
	public $expectedIconArray = [
		'Add New Article'      => 'administrator/index.php?option=com_content&task=article.add',
		'Article Manager'      => 'administrator/index.php?option=com_content',
		'Category Manager'     => 'administrator/index.php?option=com_categories&extension=com_content',
		'Media Manager'        => 'administrator/index.php?option=com_media',
		'Menu Manager'         => 'administrator/index.php?option=com_menus',
		'User Manager'         => 'administrator/index.php?option=com_users',
		'Module Manager'       => 'administrator/index.php?option=com_modules',
		'Global Configuration' => 'administrator/index.php?option=com_config',
		'Template Manager'     => 'administrator/index.php?option=com_templates',
		'Language Manager'     => 'administrator/index.php?option=com_languages',
		'Install Extensions'   => 'administrator/index.php?option=com_installer',
	];

	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//h1[contains(., 'Control Panel')]";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php';

	/**
	 * Gets information about all control panel icons on the screen
	 *
	 * @return  stdClass[]  array of stdClass objects
	 */
	public function getControlPanelIcons()
	{
		$container = $this->driver->findElement(By::xpath("//div[contains(@class, 'quick-icons')]"));
		$elements  = $container->findElements(By::tagName('a'));
		$return    = [];
		foreach ($elements as $element)
		{
			$object       = new stdClass();
			$object->text = $element->getText();
			$object->href = $element->getAttribute('href');
			$return[]     = $object;
		}

		return $return;
	}

	/**
	 * Gets the titles of modules in sliders
	 *
	 * @return  stdClass[]  array of stdClass objects
	 */
	public function getModuleTitles()
	{
		$container = $this->driver->findElement(By::id('panel-sliders'));
		$elements  = $container->findElements(By::tagName('h3'));
		$return    = [];
		foreach ($elements as $element)
		{
			$object       = new stdClass();
			$object->text = $element->getText();
			$return[]     = $object;
		}

		return $return;
	}

	/**
	 * Clears post-installation messages by navigating to that screen and back
	 *
	 * @return  void
	 */
	public function clearInstallMessages()
	{
		/** @var PostinstallPage $installPage */
		$installPage = $this->clickMenu('Post-installation Messages', 'PostinstallPage');
		$installPage->clearInstallMessages();
		$installPage->clickMenu('Control Panel', 'ControlPanelPage');
	}
}
