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
 *
 * @since  Joomla 3.0
 */
class UserEditPage extends AdminEditPage
{
	/**
	 * Array of tabs
	 *
	 * @var array expected id values for tab div elements
	 */
	public $tabs = ['details', 'groups', 'settings'];
	public $tabLabels = ['Account Details', 'Assigned User Groups', 'Basic Settings'];
	/**
	 * Associative array of expected input fields for the Account Details and Basic Settings tabs
	 * Assigned User Groups tab is omitted because that depends on the groups set up in the sample data
	 *
	 * @var array
	 */
	public $inputFields = [
		['label' => 'Name', 'id' => 'jform_name', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Login Name', 'id' => 'jform_username', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Password', 'id' => 'jform_password', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Confirm Password', 'id' => 'jform_password2', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Email', 'id' => 'jform_email', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Registration Date', 'id' => 'jform_registerDate', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Last Visit Date', 'id' => 'jform_lastvisitDate', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Last Reset Date', 'id' => 'jform_lastResetTime', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Password Reset Count', 'id' => 'jform_resetCount', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Receive System Emails', 'id' => 'jform_sendEmail', 'type' => 'fieldset', 'tab' => 'details'],
		['label' => 'Block this User', 'id' => 'jform_block', 'type' => 'fieldset', 'tab' => 'details'],
		[
			'label' => 'Require Password Reset',
			'id'    => 'jform_requireReset',
			'type'  => 'fieldset',
			'tab'   => 'details'
		],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'details'],
		[
			'label' => 'Backend Template Style',
			'id'    => 'jform_params_admin_style',
			'type'  => 'select',
			'tab'   => 'settings'
		],
		[
			'label' => 'Backend Language',
			'id'    => 'jform_params_admin_language',
			'type'  => 'select',
			'tab'   => 'settings'
		],
		['label' => 'Frontend Language', 'id' => 'jform_params_language', 'type' => 'select', 'tab' => 'settings'],
		['label' => 'Editor', 'id' => 'jform_params_editor', 'type' => 'select', 'tab' => 'settings'],
		['label' => 'Help Site', 'id' => 'jform_params_helpsite', 'type' => 'select', 'tab' => 'settings'],
		['label' => 'Time Zone', 'id' => 'jform_params_timezone', 'type' => 'select', 'tab' => 'settings'],
	];
	protected $waitForXpath = "//form[@id='user-form']";
	protected $url = 'administrator/index.php?option=com_users&view=user&layout=edit';

	/**
	 * function to get the value of the groups
	 *
	 * @return array
	 */
	public function getGroups()
	{
		$result = [];
		$this->selectTab('Groups');
		$elements = $this->driver->findElements(By::xpath("//div[@id='groups']//input[@checked='checked']/../../label"));

		foreach ($elements as $el)
		{
			$result[] = str_replace(['|', '—'], '', $el->getText());
		}

		return $result;
	}

	/**
	 * function to set the value of the groups
	 *
	 * @param   array $groupNames title of the group
	 *
	 * @return void
	 */
	public function setGroups(array $groupNames)
	{
		if (count($groupNames) == 0)
		{
			return;
		}

		$this->selectTab('Groups');

		// Uncheck any checked boxes

		$elements = $this->driver->findElements(By::xpath("//div[@id='groups']//input[@checked='checked']"));

		foreach ($elements as $el)
		{
			$el->click();
		}

		foreach ($groupNames as $name)
		{
			$this->driver->findElement(By::xpath("//div[@id='groups']//label[contains(., '$name')]"))->click();
		}
	}
}
