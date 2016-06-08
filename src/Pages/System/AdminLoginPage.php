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
	private function executeLogin($userName, $password)
	{
		$webElement = $this->driver->findElement(By::id("mod-login-username"));
		$webElement->clear();
		$webElement->sendKeys($this->cfg->username);
		$webElement = $this->driver->findElement(By::id("mod-login-password"));
		$webElement->clear();
		$webElement->sendKeys($this->cfg->password);
		//access button
		$this->driver->findElement(By::xPath("//button[contains(., 'Log in')]"))->click();
	}
}
