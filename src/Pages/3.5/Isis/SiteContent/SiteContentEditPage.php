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
class SiteContentEditPage extends SitePage
{
	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//textarea[@id='jform_articletext']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = '?view=form&layout=edit&a_id=';

	/**
	 * Function which changes the articles texts and returns back to the siteContentFeaturedPage after saving the changes
	 *
	 * @param   string  $articleText  Stores article text
	 *
	 * @return  null
	 */
	public function editArticle($articleText)
	{
		$d         = $this->driver;
		$guiEditor = $this->driver->findElement(By::xpath("//a[contains(@onclick, 'mceToggleEditor')]"));
		$guiEditor->click();
		$d->findElement(By::xpath("//textarea[@id='jform_articletext']"))->clear();
		$d->findElement(By::xpath("//textarea[@id='jform_articletext']"))->sendKeys($articleText);
		$d->findElement(By::xpath("//button[@type='button'][@class='btn btn-primary']"))->click();
	}
}
