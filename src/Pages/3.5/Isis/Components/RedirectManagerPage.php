<?php
/**
 * @package     Joomla.Test
 * @subpackage  Webdriver
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

use Facebook\WebDriver\WebDriverBy as By;

/**
 * Page class for the back-end component newsfeed menu.
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.0
 */
class RedirectManagerPage extends AdminManagerPage
{
	/**
	 * Array of filter id values for this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $filters = [
		'Select Status' => 'filter_state',
	];

	/**
	 * Array of toolbar id values for this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $toolbar = [
		'New'         => 'toolbar-new',
		'Edit'        => 'toolbar-edit',
		'Enable'      => 'toolbar-publish',
		'Disable'     => 'toolbar-unpublish',
		'Archive'     => 'toolbar-archive',
		'Trash'       => 'toolbar-trash',
		'Options'     => 'toolbar-options',
		'Help'        => 'toolbar-help',
		'Empty Trash' => 'toolbar-delete',
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $waitForXpath = "//ul/li/a[@href='index.php?option=com_redirect']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $url = '/administrator/index.php?option=com_redirect';

	/**
	 * Add a new Redirect item in the  Redirect Manager: Component screen.
	 *
	 * @param   string  $srcLink  Test Source Link
	 * @param   string  $desLink  Test Destination Link
	 * @param   string  $status   Status for the Redirect
	 * @param   string  $comment  Comments on the Redirection
	 *
	 * @return  RedirectManagerPage
	 */
	public function addRedirect($srcLink = 'administrator/index.php/dummysrc', $desLink = 'administrator/index.php/dummydest', $status = 'Enabled', $comment = '')
	{
		$this->clickButton('toolbar-new');
		$redirectEditPage = $this->test->getPageObject('RedirectEditPage');
		$redirectEditPage->setFieldValues([
			'Source URL'      => $srcLink,
			'Destination URL' => $desLink,
			'Status'          => $status,
			'Comment'         => $comment
		]);
		$redirectEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('RedirectManagerPage');
	}

	/**
	 * Edit a  Redirect item in the Redirect Manager: Redirect Items screen.
	 *
	 * @param   string  $src     Link Src Field
	 * @param   array   $fields  Associative array of fields in the form label => value.
	 *
	 * @return  void
	 */
	public function editRedirect($src, $fields)
	{
		$this->clickItem($src);
		$redirectEditPage = $this->test->getPageObject('RedirectEditPage');
		$redirectEditPage->setFieldValues($fields);
		$redirectEditPage->clickButton('toolbar-save');
		$this->test->getPageObject('RedirectManagerPage');
		$this->searchFor();
	}

	/**
	 * Get state  of a Redirect in the Redirect Manager: Redirect Items screen.
	 *
	 * @param   string  $src  Redirect Src field
	 *
	 * @return  string  State of the Redirect Link ('published' or 'unpublished')
	 */
	public function getState($src)
	{
		$result = false;
		$row    = $this->getRowNumber($src);
		$text   = $this->driver->findElement(By::xpath("//tbody/tr[" . $row . "]/td[2]/a"))->getAttribute('onclick');
		if (strpos($text, 'links.unpublish') > 0)
		{
			$result = 'published';
		}
		if (strpos($text, 'links.publish') > 0)
		{
			$result = 'unpublished';
		}

		return $result;
	}

	/**
	 * Change state of a Redirect link item in the Redirect Manager: Redirect Items screen.
	 *
	 * @param   string  $src    Redirect link SRC field
	 * @param   string  $state  State of the Link
	 *
	 * @return  void
	 */
	public function changeRedirectState($src, $state = 'published')
	{
		$this->searchFor($src);
		$rowNumber = $this->getRowNumber($src) - 1;
		$this->driver->findElement(By::xpath("//input[@id='cb" . $rowNumber . "']"))->click();
		if (strtolower($state) == 'published')
		{
			$this->clickButton('toolbar-publish');
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}
		elseif (strtolower($state) == 'unpublished')
		{
			$this->clickButton('toolbar-unpublish');
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}
		elseif (strtolower($state) == 'archived')
		{
			$this->clickButton('toolbar-archive');
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}
		$this->searchFor();
	}
}
