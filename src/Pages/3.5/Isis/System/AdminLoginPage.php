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
 * Class for the back-end login screen
 *
 */
class AdminLoginPage extends AdminPage
{
	/**
	 * @var  string  XPath string used to uniquely identify this page
	 */
	protected $waitForXpath = "//input[@id='mod-login-username']";

	/**
	 * @var  string  URL used to uniquely identify this page
	 */
	protected $url = 'administrator/index.php';

	/**
	 * Login with valid credentials
	 * 
	 * @param   string  $userName  Username
	 * @param   string  $password  Password
	 *
	 * @return  AdminPage
	 */
	public function loginValidUser($userName, $password)
	{
		$this->executeLogin($userName, $password);

		return $this->test->getPageObject('ControlPanelPage');
	}

	/**
	 * Perform the login
	 * 
	 * @param   string  $userName  Username
	 * @param   string  $password  Password
	 */
	private function executeLogin($userName = null, $password = null)
	{
		$webElement = $this->driver->findElement(By::id("mod-login-username"));
		$webElement->clear();
		$webElement->sendKeys(is_null($userName) ? $this->cfg->username : $userName);
		$webElement = $this->driver->findElement(By::id("mod-login-password"));
		$webElement->clear();
		$webElement->sendKeys(is_null($password) ? $this->cfg->password : $password);
		//access button
		$this->driver->findElement(By::xpath("//button[contains(., 'Log in')]"))->click();
	}
}
