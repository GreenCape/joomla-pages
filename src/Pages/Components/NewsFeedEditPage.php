<?php
/**
 * @package     Joomla.Test
 * @subpackage  Webdriver
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Page class for the back-end menu Newsfeed manager screen.
 *
 * @package     Joomla.Test
 * @subpackage  Webdriver
 * @since       3.0
 */
class NewsFeedEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabs = ['details', 'images', 'publishing', 'attrib-jbasic'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_name', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Link', 'id' => 'jform_link', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Description', 'id' => 'jform_description', 'type' => 'textarea', 'tab' => 'details'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Category', 'id' => 'jform_catid', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Tags', 'id' => 'jform_tags', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'First Image', 'id' => 'jform_images_image_first', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_first', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt Text', 'id' => 'jform_images_image_first_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_first_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Second Image', 'id' => 'jform_images_image_second', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_second', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt Text', 'id' => 'jform_images_image_second_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_second_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Start Publishing', 'id' => 'jform_publish_up', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Finish Publishing', 'id' => 'jform_publish_down', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created Date', 'id' => 'jform_created', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created By', 'id' => 'jform_created_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Author\'s Alias', 'id' => 'jform_created_by_alias', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified By', 'id' => 'jform_modified_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Revision', 'id' => 'jform_version', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'External Reference', 'id' => 'jform_xreference', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Content Rights', 'id' => 'jform_metadata_rights', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Number of Articles', 'id' => 'jform_numarticles', 'type' => 'input', 'tab' => 'attrib-jbasic'],
		['label' => 'Cache Time', 'id' => 'jform_cache_time', 'type' => 'input', 'tab' => 'attrib-jbasic'],
		['label' => 'Language Direction', 'id' => 'jform_rtl', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Feed Image', 'id' => 'jform_params_show_feed_image', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Feed Description', 'id' => 'jform_params_show_feed_description', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Feed Content', 'id' => 'jform_params_show_item_description', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Characters Count', 'id' => 'jform_params_feed_character_count', 'type' => 'input', 'tab' => 'attrib-jbasic'],
		['label' => 'Alternative Layout', 'id' => 'jform_params_newsfeed_layout', 'type' => 'select', 'tab' => 'attrib-jbasic'],
		['label' => 'Feed Display Order', 'id' => 'jform_params_feed_display_order', 'type' => 'select', 'tab' => 'attrib-jbasic'],
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $waitForXpath = "//form[@id='newsfeed-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.0
	 */
	protected $url = 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit';

}
