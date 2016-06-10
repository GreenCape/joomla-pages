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
 * Page class for front end login page
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.2
 */
class SiteLoginPage extends SitePage
{
	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//button[@class='btn btn-primary']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = '/index.php/login';

	/**
	 * Function to click on logout button
	 *
	 * @return  void
	 */
	public function SiteLogoutUser()
	{
		$driver = $this->driver;
		$driver->findElement(By::xpath("//button[contains(text(), 'Log out')]"))->click();
		$driver->clearCurrentCookies();
	}

	/**
	 * Function to enter Username Password
	 *
	 * @param   string  $username  Username of the user
	 * @param   string  $password  Password of the user
	 *
	 * @return  void
	 */
	public function SiteLoginUser($username, $password)
	{
		$driver = $this->driver;
		$driver->findElement(By::xpath("//input[@id='username']"))->sendKeys($username);
		$driver->findElement(By::xpath("//input[@id='password']"))->sendKeys($password);
		$driver->findElement(By::xpath("//button[contains(text(), 'Log in')]"))->click();
	}
}
