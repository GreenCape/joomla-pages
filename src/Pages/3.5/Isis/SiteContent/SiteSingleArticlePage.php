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
 * Getting Started Front End Page Class
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.2
 */
class SiteSingleArticlePage extends SitePage
{
	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//input[@id='mod-search-searchword']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = '/index.php/';

	/**
	 * Function which checks if an Article is visible or not
	 *
	 * @param   string  $articleTitle  stores title of the Article
	 *
	 * @return  True or Flase
	 */
	public function isArticlePresent($articleTitle)
	{
		$arrayElement = $this->driver->findElements(By::xpath("//h2[contains(., '" . $articleTitle . "')]"));

		if (count($arrayElement) > 0)
		{
			return true;
		}

		return false;
	}

	/**
	 * Function which checks of edit icon is ppresent on the page or not
	 *
	 * @return True or Flase
	 */
	public function isEditPresent()
	{
		$arrayElement = $this->driver->findElements(By::xpath("//a[contains(text(), 'Edit')]"));

		if (count($arrayElement) > 0)
		{
			return true;
		}

		return false;
	}
}
