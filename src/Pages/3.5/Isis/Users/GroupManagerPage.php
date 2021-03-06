<?php
/**
 * @package     Joomla.Tests
 * @subpackage  Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Class for the back-end control panel screen.
 *
 * @since  Joomla 3.0
 */
class GroupManagerPage extends AdminManagerPage
{
	/**
	 *
	 * @var GroupManagerPage
	 */
	public $groupManagerPage = null;
	public $toolbar = [
		'toolbar-new',
		'toolbar-edit',
		'toolbar-delete',
		'toolbar-options',
		'toolbar-help'
	];
	public $submenu = [
		'option=com_users&view=users',
		'option=com_users&view=groups',
		'option=com_users&view=levels',
		'option=com_users&view=notes',
		'option=com_categories&extension=com_users'
	];
	protected $waitForXpath = "//ul/li/a[@href='index.php?option=com_users&view=groups']";
	protected $url = 'administrator/index.php?option=com_users&view=groups';

	/**
	 * function to add a group
	 *
	 * @param   string $name   title of group
	 * @param   string $parent parent of group
	 *
	 * @return void
	 */
	public function addGroup($name = 'Test Group', $parent = 'Public')
	{
		$this->clickButton('toolbar-new');
		$editGroupPage = $this->test->getPageObject('GroupEditPage');
		$editGroupPage->setFieldValues(['Group Title' => $name, 'Group Parent' => $parent]);
		$editGroupPage->clickButton('toolbar-save');
		$this->groupManagerPage = $this->test->getPageObject('GroupManagerPage');
	}

	/**
	 * function to edit group
	 *
	 * @param   String $name   title of the group to b edited
	 * @param   array  $fields Input fields
	 *
	 * @return void
	 */
	public function editGroup($name, $fields)
	{
		$this->clickItem($name);
		$editGroupPage = $this->test->getPageObject('GroupEditPage');
		$editGroupPage->setFieldValues($fields);
		$editGroupPage->clickButton('toolbar-save');
		$this->groupManagerPage = $this->test->getPageObject('GroupManagerPage');
	}
}
