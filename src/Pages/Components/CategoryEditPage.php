<?php
/**
 * @package     Joomla.Test
 * @subpackage  Webdriver
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Page class for the back-end menu items manager screen.
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.0
 */
class CategoryEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabs = ['general', 'publishing', 'rules', 'attrib-basic'];

	/**
	 * Array of tab labels for this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabLabels = [
		'Category Details',
		'Publishing Options',
		'Options',
		'Metadata Options',
		'Category Permissions'
	];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Description', 'id' => 'jform_description', 'type' => 'textarea', 'tab' => 'general'],
		['label' => 'Parent', 'id' => 'jform_parent_id', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Tags', 'id' => 'jform_tags', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Note', 'id' => 'jform_note', 'type' => 'input', 'tab' => 'general'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'general'],
		['label' => 'Created Date', 'id' => 'jform_created_time', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created By', 'id' => 'jform_created_user_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified_time', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified By', 'id' => 'jform_modified_user_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Hits', 'id' => 'jform_hits', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Author', 'id' => 'jform_metadata_author', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Alternative Layout', 'id' => 'jform_params_category_layout', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Image', 'id' => 'jform_params_image', 'type' => 'input', 'tab' => 'attrib-basic'],
		['label' => 'Alt Text', 'id' => 'jform_params_image_alt', 'type' => 'input', 'tab' => 'attrib-basic'],
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $waitForXpath = "//form[@id='item-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $url = 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content';
}
