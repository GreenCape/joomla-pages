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
class GroupEditPage extends AdminEditPage
{
	/**
	 * Associative array of expected input fields for the Account Details and Basic Settings tabs
	 * Assigned User Groups tab is omitted because that depends on the groups set up in the sample data
	 *
	 * @var array
	 */
	public $inputFields = [
		['label' => 'Group Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Group Parent', 'id' => 'jform_parent_id', 'type' => 'select', 'tab' => 'header'],
	];
	protected $waitForXpath = "//form[@id='group-form']";
	protected $url = 'administrator/index.php?option=com_users&view=group&layout=edit';
}
