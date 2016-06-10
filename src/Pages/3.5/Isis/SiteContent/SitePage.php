<?php
/**
 * @package     Joomla.Tests
 * @subpackage  Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Facebook\WebDriver\WebDriverBy as By;
use Facebook\WebDriver\WebDriver;

/**
 * Page class for front end page
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.2
 */
abstract class SitePage
{
	/**
	 * @var array $toolbar Associative array as label => id for the toolbar buttons
	 */
	public $toolbar = [];

	/**
	 * @var  array of top menu text that is visible in all frontend pages
	 */
	public $visibleMenuText = ['Home', 'Sample Sites', 'Joomla.org'];

	/**
	 * @var WebDriverDecorator  The driver object for invoking driver methods.
	 */
	protected $driver = null;

	/**
	 * @var SeleniumConfig  The configuration object.
	 */
	protected $cfg = null;

	/**
	 * @var string This is the element that we wait for when we load a new page. It should specify something unique about this page.
	 */
	protected $waitForXpath;

	/**
	 * @var JoomlaWebdriverTestCase  The test object for invoking test methods.
	 */
	protected $test = null;

	/**
	 * @var string  This is the URL for this page. We check this when a new page class is loaded.
	 */
	protected $url = null;

	/**
	 * constructor function
	 *
	 * @param   Webdriver                $driver  Driver for this test.
	 * @param   JoomlaWebdriverTestCase  $test    Test class object (needed to create page class objects)
	 * @param   string                   $url     Optional URL to load when object is created. Only use for initial page load.
	 */
	public function __construct(WebDriver $driver, JoomlaWebdriverTestCase $test, $url = null)
	{
		$this->driver = new WebDriverDecorator($driver);
		$this->test = $test;
		$cfg        = new SeleniumConfig;

		// Save current configuration
		$this->cfg = $cfg;

		if ($url)
		{
			$this->driver->get($url);
		}

		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath), 5);

		if (isset($this->url))
		{
			$test->assertContains($this->url, $this->driver->getCurrentURL(), 'URL for page does not match expected value.');
		}
	}

	/**
	 * @return  string  Current URL
	 */
	public function __toString()
	{
		return $this->driver->getCurrentURL();
	}

	/**
	 * Checks for notices on a page.
	 *
	 * @return  bool  true if notices or warnings present on page
	 */
	public function checkForNotices()
	{
		$haystack = strip_tags($this->driver->getPageSource());

		return (bool) (stripos($haystack, "( ! ) Notice") || stripos($haystack, "( ! ) Warning"));
	}

	public function waitForElement(By $locator, $timeout = 10)
	{
		$wait = new \Facebook\WebDriver\WebDriverWait($this->driver, $timeout);
		$wait->until(\Facebook\WebDriver\WebDriverExpectedCondition::presenceOfElementLocated($locator));
	}
}
