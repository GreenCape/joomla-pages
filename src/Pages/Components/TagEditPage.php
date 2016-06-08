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
class TagEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabs = ['details', 'publishing', 'attrib-basic', 'images'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Description', 'id' => 'jform_description', 'type' => 'textarea', 'tab' => 'details'],
		['label' => 'Parent', 'id' => 'jform_parent_id', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Note', 'id' => 'jform_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Created Date', 'id' => 'jform_created_time', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created By', 'id' => 'jform_created_user_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Author\'s Alias', 'id' => 'jform_created_by_alias', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified_time', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified By', 'id' => 'jform_modified_user_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Hits', 'id' => 'jform_hits', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Author', 'id' => 'jform_metadata_author', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Alternative Layout', 'id' => 'jform_params_tag_layout', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'CSS Class for tag link.', 'id' => 'jform_params_tag_link_class', 'type' => 'input', 'tab' => 'attrib-basic'],
		['label' => 'Teaser Image.', 'id' => 'jform_images_image_intro', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Float', 'id' => 'jform_images_float_intro', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt', 'id' => 'jform_images_image_intro_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_intro_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Full Image', 'id' => 'jform_images_image_fulltext', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Float', 'id' => 'jform_images_float_fulltext', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt', 'id' => 'jform_images_image_fulltext_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_fulltext_caption', 'type' => 'input', 'tab' => 'images'],
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
	protected $url = 'administrator/index.php?option=com_tags&view=tag&layout=edit';

}

