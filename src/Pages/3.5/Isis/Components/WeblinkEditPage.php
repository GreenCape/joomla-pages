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
 * @since       3.2
 */
class WeblinkEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $tabs = ['details', 'images', 'publishing', 'attrib-jbasic'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'URL', 'id' => 'jform_url', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Description', 'id' => 'jform_description', 'type' => 'textarea', 'tab' => 'details'],
		['label' => 'Category', 'id' => 'jform_catid', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Tags', 'id' => 'jform_tags', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Status', 'id' => 'jform_state', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'First image', 'id' => 'jform_images_image_first', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_first', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt text', 'id' => 'jform_images_image_first_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_first_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Second image', 'id' => 'jform_images_image_second', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_second', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt text', 'id' => 'jform_images_image_second_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_second_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Start Publishing', 'id' => 'jform_publish_up', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Finish Publishing', 'id' => 'jform_publish_down', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created Date', 'id' => 'jform_created', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created by', 'id' => 'jform_created_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Author\'s Alias', 'id' => 'jform_created_by_alias', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified by', 'id' => 'jform_modified_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Revision', 'id' => 'jform_version', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Hits', 'id' => 'jform_hits', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'External Reference', 'id' => 'jform_xreference', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Content Rights', 'id' => 'jform_metadata_rights', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Target', 'id' => 'jform_params_target', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Width', 'id' => 'jform_params_width', 'type' => 'input', 'tab' => 'attrib-jbasic'],
		['label' => 'Height', 'id' => 'jform_params_height', 'type' => 'input', 'tab' => 'attrib-jbasic'],
		['label' => 'Count Clicks', 'id' => 'jform_params_count_clicks', 'type' => 'select', 'tab' => 'attrib-jbasic'],
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//form[@id='weblink-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = 'administrator/index.php?option=com_weblinks&view=weblink&layout=edit';

}

