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
 * Home Page Class
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.2
 */
class SiteConfigurationTemplatePage extends SitePage
{
	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//form[@id='templates-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = 'controller=config.display.templates';

	/**
	 * Function which changes the template color saving the changes
	 *
	 * @param   string  $templateColor  stores the color of the template
	 *
	 * @return  void
	 */
	public function changeTemplateColor($templateColor)
	{
		$driver = $this->driver;

		$driver->findElement(By::xpath("//input[@id='params_templateColor']"))->clear();
		$driver->findElement(By::xpath("//input[@id='params_templateColor']"))->sendKeys($templateColor);
		$driver->findElement(By::xpath("//button[@type='button'][@class='btn btn-primary']"))->click();
	}

	/**
	 * Function which returns Template Color
	 *
	 * @return  string   template color
	 */
	public function getTemplateColor()
	{
		$driver = $this->driver;

		return $driver->findElement(By::xpath("//input[@id='params_templateColor']"))->getAttribute("value");
	}

	/**
	 * Function which changes the Background Color saving the changes
	 *
	 * @param   string  $backgroundColor  stores the background color
	 *
	 * @return  null
	 */
	public function changeBackgroundColor($backgroundColor)
	{
		$driver = $this->driver;

		$driver->findElement(By::xpath("//input[@id='params_templateBackgroundColor']"))->clear();
		$driver->findElement(By::xpath("//input[@id='params_templateBackgroundColor']"))->sendKeys($backgroundColor);
		$driver->findElement(By::xpath("//button[@type='button'][@class='btn btn-primary']"))->click();
		$this->test->getPageObject('SiteConfigurationTemplatePage');
	}

	/**
	 * Function which returns the Background Color
	 *
	 * @return  string   background color
	 */
	public function getBackgroundColor()
	{
		$driver = $this->driver;

		return $driver->findElement(By::xpath("//input[@id='params_templateBackgroundColor']"))->getAttribute("value");
	}
}
