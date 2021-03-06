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
 */
abstract class AdminManagerPage extends AdminPage
{
	/**
	 * @var  array  Toolbar
	 */
	public $toolbar = [];

	/**
	 * @var  AdminEditPage
	 */
	public $editItem = null;

	/**
	 * @var  array  Associative array as label => id for filter select element
	 */
	public $filters = [];

	/**
	 * Returns an array of field values from an edit screen.
	 *
	 * @param   string $className
	 * @param   string $itemName   Name of item (user name, article title, and so on)
	 * @param   array  $fieldNames Array of field labels to get values of.
	 *
	 * @return array
	 * @throws \Facebook\WebDriver\Exception\NoSuchElementException
	 */
	public function getFieldValues($className, $itemName, $fieldNames)
	{
		$this->clickItem($itemName);
		$this->editItem = $this->test->getPageObject($className);
		$result         = [];
		if (is_array($fieldNames))
		{
			foreach ($fieldNames as $name)
			{
				$result[] = $this->editItem->getFieldValue($name);
			}
		}
		$this->editItem->saveAndClose();
		$this->searchFor();

		return $result;
	}

	/**
	 * Click item
	 *
	 * @param   string  $name  Name
	 *
	 * @return  void
	 */
	public function clickItem($name)
	{
		$this->searchFor($name);
		$this->driver->findElement(By::xpath("//tbody/tr/td//a[contains(text(), '" . $name . "')]"))->click();
	}

	/**
	 * Enter a string into the search field
	 *
	 * @param   string  $search  The search term
	 *
	 * @return  AdminPage
	 */
	public function searchFor($search = '')
	{
		if ($search)
		{
			$el = $this->driver->findElement(By::id('filter_search'));
			$el->clear();
			$el->sendKeys($search);

			// In some cases we have to click the button twice since using bootstrap tooltips. (Not sure why.)
			$this->driver->findElement(By::xpath("//button[@data-original-title='Search' or @title='Search']"))
			             ->click();
		}
		else
		{
			$this->driver->findElement(By::xpath("//button[@title='Clear' or @title='Reset' or @data-original-title='Reset' or @data-original-title='Clear']"))
			             ->click();
		}

		return $this->test->getPageObject(get_class($this));
	}

	/**
	 * Get filters
	 *
	 * @return  array  Filters
	 */
	public function getFilters()
	{
		$container = $this->driver->findElement(By::xpath("//div[contains(@class, 'filter-select') or contains(@class, 'js-stools')]"));
		$elements  = $container->findElements(By::tagName('select'));
		$result    = [];
		// @var WebdriverElement $el
		foreach ($elements as $el)
		{
			$result[] = $el->getAttribute('id');
		}

		return $result;
	}

	/**
	 * Get toolbar elements
	 *
	 * @return  \Facebook\WebDriver\WebDriverElement[]
	 */
	public function getToolbarElements()
	{
		return $this->driver->findElements(By::xpath("//div[@id='toolbar']/div[contains(@id, 'toolbar-')]"));
	}

	/**
	 * Get submenu list
	 *
	 * @return  \Facebook\WebDriver\WebDriverElement
	 */
	public function getSubMenuList()
	{
		return $this->driver->findElement(By::id('submenu'));
	}

	/**
	 * Get row text
	 *
	 * @param   string  $name  Name
	 *
	 * @return  string|bool
	 */
	public function getRowText($name)
	{
		$result      = false;
		$rowElements = $this->driver->findElement(By::xpath("//tbody"))->findElements(By::tagName('tr'));
		$count       = count($rowElements);
		for ($i = 0; $i < $count; $i++)
		{
			$rowText = $rowElements[$i]->getText();
			if (strpos($rowText, $name) !== false)
			{
				$result = $rowText;
				break;
			}
		}

		return $result;
	}

	/**
	 * Get order and row numbers
	 *
	 * @param   integer[]  $orderings  Orderings
	 * @param   string[]   $rows       Rows
	 *
	 * @return  array[]
	 */
	public function orderAndGetRowNumbers($orderings, $rows)
	{
		$result = [];

		foreach ($orderings as $order)
		{
			$result[$order] = [];

			// Check to see whether there is a separate sort direction list control
			$directionTable = $this->driver->findElements(By::id('directionTable_chzn'));
			if (count($directionTable) == 0)
			{
				$this->setOrder($order . ' ascending');
			}
			else
			{
				$this->setOrder($order);
			}

			foreach ($rows as $row)
			{
				$result[$order]['ascending'][] = $this->getRowNumber($row);
			}

			if (count($directionTable) == 0)
			{
				$this->setOrder($order . ' descending');
			}
			else
			{
				$this->setOrderDirection('Descending');
			}

			foreach ($rows as $row)
			{
				$result[$order]['descending'][] = $this->getRowNumber($row);
			}
		}

		return $result;
	}

	/**
	 * Set order
	 *
	 * @param   string  $value  Value
	 *
	 * @return  AdminPage
	 */
	public function setOrder($value)
	{
		$container = $this->driver->findElement(By::xpath("//div[@id='list_fullordering_chzn' or @id='sortTable_chzn']/a"));
		$container->click();
		$el = $this->driver->findElement(By::xpath("//div[@id='list_fullordering_chzn' or @id='sortTable_chzn']//ul[@class='chzn-results']/li[contains(.,'" . $value . "')]"));
		// Make sure the container is opened. Not sure why we need this, but sometimes the $el is not displayed after the first click. This seems to fix it.
		while (!$el->isDisplayed())
		{
			$container->click();
		}
		$el->click();
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));

		return $this->test->getPageObject(get_class($this));
	}

	/**
	 * Checks a table for a row containing the desired text
	 *
	 * @param   string  $name  Text that identifies the desired row
	 *
	 * @return  mixed  row that contains the text or false if row not found
	 */
	public function getRowNumber($name)
	{
		$result        = false;
		$tableElements = $this->driver->findElements(By::xpath("//tbody"));
		if (isset($tableElements[0]))
		{
			$rowElements = $this->driver->findElement(By::xpath("//tbody"))->findElements(By::tagName('tr'));
			$count       = count($rowElements);
			for ($i = 0; $i < $count; $i++)
			{
				$rowText = $rowElements[$i]->getText();
				if (strpos(strtolower($rowText), strtolower($name)) !== false)
				{
					$result = $i + 1;
					break;
				}
			}
		}

		return $result;
	}

	/**
	 * Set order direction
	 *
	 * @param   string  $value  Value
	 *
	 * @return  AdminPage
	 */
	public function setOrderDirection($value)
	{
		$this->driver->findElement(By::xpath("//div[@id='directionTable_chzn']/a/div/b"))->click();
		$el              = $this->driver->findElement(By::xpath("//div[@id='directionTable_chzn']//ul[@class='chzn-results']/li[contains(.,'" . $value . "')]"));
		$container       = $this->driver->findElement(By::xpath("//div[@id='directionTable_chzn']/a"));
		while (!$el->isDisplayed())
		{
			$container->click();
		}
		$el->isDisplayed();
		$el->click();
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));

		return $this->test->getPageObject(get_class($this));
	}

	/**
	 * Trash and delete
	 *
	 * @param   string  $name  Name
	 *
	 * @return  void
	 */
	public function trashAndDelete($name)
	{
		$this->setFilter('Status', 'All');
		$this->searchFor($name);
		$this->checkAll();
		$this->clickButton('toolbar-trash');
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		$this->searchFor();
		$this->setFilter('Status', 'Trashed');
		$this->checkAll();
		$this->clickButton('Empty trash');
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		$this->setFilter('Status', 'Select Status');
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
	}

	/**
	 * Set filter
	 *
	 * @param   string  $idOrLabel  ID or label
	 * @param   string  $value      Value
	 *
	 * @return  AdminPage|bool
	 */
	public function setFilter($idOrLabel, $value)
	{
		$el = $this->driver->findElements(By::xpath("//button"));
		foreach ($el as $element)
		{
			if ($element->getAttribute('data-original-title') == 'Filter the list items.')
			{
				$element->click();
				if ($value == 'Select Status')
				{
					$element->click();
				}
			}
		}
		$filters   = array_change_key_case($this->filters, CASE_LOWER);
		$idOrLabel = strtolower($idOrLabel);
		$filterId  = '';

		if (in_array($idOrLabel, $filters))
		{
			$filterId = $idOrLabel;
		}
		else
		{
			foreach ($filters as $label => $id)
			{
				if (stripos($label, $idOrLabel) !== false)
				{
					$filterId = $id;
					break;
				}
			}
		}

		if ($filterId)
		{
			$el = $this->driver->findElement(By::xpath("//div[@id='" . $filterId . "_chzn']/a"));
			if (!$el->isDisplayed())
			{
				$elements = $this->driver->findElements(By::xpath("//button[contains(., 'Search tools')]"));
				if (isset($elements[0]))
				{
					while (!$el->isDisplayed())
					{
						$elements[0]->click();
						sleep(2);
					}
				}
			}

			// Open and close the list to create the li elements on the page
			$el   = $this->driver->findElement(By::xpath("//div[@id='" . $filterId . "_chzn']/a/div/b"));
			$el->click();
			sleep(2);
			$selectElementArray = $this->driver->findElements(By::xpath("//div[@id='" . $filterId . "_chzn']//ul[@class='chzn-results']/li[contains(.,'" . $value . "')]"));

			if (count($selectElementArray) == 1)
			{
				$selectElement = $selectElementArray[0];
			}
			else
			{
				return false;
			}

			while (!$selectElement->isDisplayed())
			{
				sleep(2);
				$el->click();
			}

			$selectElement->click();
			$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		}

		return $this->test->getPageObject(get_class($this));
	}

	/**
	 * Check all
	 *
	 * @return  void
	 */
	public function checkAll()
	{
		$el = $this->driver->findElement(By::xpath("//thead//input[@name='checkall-toggle' or @name='toggle']"));

		// Work-around for intermittant bug with click() on checkboxes -- click until checked
		while (!$el->isSelected())
		{
			$el->click();
		}
	}

	/**
	 * Delete
	 *
	 * @param   string  $name  Name
	 *
	 * @return  void
	 */
	public function delete($name)
	{
		$this->searchFor($name);
		$el = $this->driver->findElement(By::name("checkall-toggle"));
		while (!$el->isSelected())
		{
			$el->click();
		}
		$this->driver->findElement(By::id("filter_search"))->click();
		sleep(2);
		$this->clickButton('toolbar-delete');
		$this->driver->waitForElementUntilIsPresent(By::xpath($this->waitForXpath));
		$this->searchFor();
	}
}
