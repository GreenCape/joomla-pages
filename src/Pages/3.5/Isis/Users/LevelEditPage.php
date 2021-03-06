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
class LevelEditPage extends AdminEditPage
{
	/**
	 * Associative array of expected input fields for the Account Details and Basic Settings tabs
	 * Assigned User Acesss tab is omitted because that depends on the levels set up in the sample data
	 *
	 * @var array
	 */
	public $inputFields = [
		['label' => 'Level Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header']
	];
	protected $waitForXpath = "//form[@id='level-form']";
	protected $url = 'administrator/index.php?option=com_users&view=level&layout=edit';

	/**
	 * function to get all the input fields
	 *
	 * @param   array $tabIds Stores tab IDs
	 *
	 * @return array
	 */
	public function getAllInputFields($tabIds = [])
	{
		$return = [];
		$labels = $this->driver->findElements(By::xpath("//fieldset/div[@class='control-group']/div/label"));
		$tabId  = 'header';

		foreach ($labels as $label)
		{
			if ($label->getAttribute('class') == 'checkbox')
			{
				continue;
			}

			$return[] = $this->getInputField($tabId, $label);
		}

		return $return;
	}

	/**
	 * function to get all the groups
	 *
	 * @return array
	 */
	public function getGroups()
	{
		$result   = [];
		$elements = $this->driver->findElements(By::xpath("//input[@checked='checked']/../../label"));

		foreach ($elements as $el)
		{
			$result[] = str_replace(['|', '—'], '', $el->getText());
		}

		return $result;
	}

	/**
	 * function to set the group values
	 *
	 * @param   array $groupNames array to store all the group names
	 *
	 * @return void
	 */
	public function setGroups(array $groupNames)
	{
		if (count($groupNames) == 0)
		{
			return;
		}
		// Uncheck any checked boxes
		$elements = $this->driver->findElements(By::xpath("//input[@checked='checked']"));

		foreach ($elements as $el)
		{
			$el->click();
		}

		foreach ($groupNames as $name)
		{
			$this->driver->findElement(By::xpath("//label[contains(., '$name')]"))->click();
		}
	}
}
