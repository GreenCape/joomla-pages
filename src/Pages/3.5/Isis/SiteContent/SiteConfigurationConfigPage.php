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
class SiteConfigurationConfigPage extends SitePage
{
	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//form[@id='application-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = 'controller=config.display.config';

	/**
	 * Function which changes the sitename saving the changes
	 *
	 * @param   string  $siteName  stores the name of the site
	 *
	 * @return  void
	 */
	public function changeSiteName($siteName)
	{
		$driver = $this->driver;

		$driver->findElement(By::xpath("//input[@id='jform_sitename']"))->clear();
		$driver->findElement(By::xpath("//input[@id='jform_sitename']"))->sendKeys($siteName);
		$driver->findElement(By::xpath("//button[@type='button'][@class='btn btn-primary']"))->click();
		$this->test->getPageObject('SiteConfigurationConfigPage');
	}

	/**
	 * Function which returns site name
	 *
	 * @return  string   site name
	 */
	public function getSiteName()
	{
		$driver = $this->driver;

		return $driver->findElement(By::xpath("//span[@class='site-title']"))->getText();
	}

	/**
	 * Function which changes the meta description saving the changes
	 *
	 * @param   string  $metaDescription  store the value of metadescription
	 *
	 * @return  void
	 */
	public function changeMetaDescription($metaDescription)
	{
		$driver = $this->driver;

		$driver->findElement(By::xpath("//textarea[@id='jform_MetaDesc']"))->clear();
		$driver->findElement(By::xpath("//textarea[@id='jform_MetaDesc']"))->sendKeys($metaDescription);
		$driver->findElement(By::xpath("//button[@type='button'][@class='btn btn-primary']"))->click();
		$this->test->getPageObject('SiteConfigurationConfigPage');
	}

	/**
	 * Function which returns the meta description
	 *
	 * @return  string   Meta description
	 */
	public function getMetaDescription()
	{
		$driver = $this->driver;

		return $driver->findElement(By::xpath("//textarea[@id='jform_MetaDesc']"))->getText();
	}
}
