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
class ArticleEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $tabs = ['general', 'publishing', 'images', 'permissions', 'attrib-basic', 'editor'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.0
	 */
	public $inputFields = [
		['label' => 'Title', 'id' => 'jform_title', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Category', 'id' => 'jform_catid', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Tags', 'id' => 'jform_tags', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Status', 'id' => 'jform_state', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Featured', 'id' => 'jform_featured', 'type' => 'fieldset', 'tab' => 'general'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'general'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'general'],
		['label' => 'articletext', 'id' => 'jform_articletext', 'type' => 'textarea', 'tab' => 'general'],
		['label' => 'Start Publishing', 'id' => 'jform_publish_up', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Finish Publishing', 'id' => 'jform_publish_down', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created Date', 'id' => 'jform_created', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created by', 'id' => 'jform_created_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created by alias', 'id' => 'jform_created_by_alias', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified by', 'id' => 'jform_modified_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Revision', 'id' => 'jform_version', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Hits', 'id' => 'jform_hits', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Key Reference', 'id' => 'jform_xreference', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Author', 'id' => 'jform_metadata_author', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Content Rights', 'id' => 'jform_metadata_rights', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'External Reference', 'id' => 'jform_metadata_xreference', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Intro Image', 'id' => 'jform_images_image_intro', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_intro', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt text', 'id' => 'jform_images_image_intro_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_intro_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Full article image', 'id' => 'jform_images_image_fulltext', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Image Float', 'id' => 'jform_images_float_fulltext', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Alt text', 'id' => 'jform_images_image_fulltext_alt', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Caption', 'id' => 'jform_images_image_fulltext_caption', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Link A', 'id' => 'jform_urls_urla', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Link A Text', 'id' => 'jform_urls_urlatext', 'type' => 'input', 'tab' => 'images'],
		['label' => 'URL Target Window', 'id' => 'jform_urls_targeta', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Link B', 'id' => 'jform_urls_urlb', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Link B Text', 'id' => 'jform_urls_urlbtext', 'type' => 'input', 'tab' => 'images'],
		['label' => 'URL Target Window', 'id' => 'jform_urls_targetb', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Link C', 'id' => 'jform_urls_urlc', 'type' => 'input', 'tab' => 'images'],
		['label' => 'Link C Text', 'id' => 'jform_urls_urlctext', 'type' => 'input', 'tab' => 'images'],
		['label' => 'URL Target Window', 'id' => 'jform_urls_targetc', 'type' => 'select', 'tab' => 'images'],
		['label' => 'Show Title', 'id' => 'jform_attribs_show_title', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Linked Titles', 'id' => 'jform_attribs_link_titles', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Tags', 'id' => 'jform_attribs_show_tags', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Intro Text', 'id' => 'jform_attribs_show_intro', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Position of Article Info', 'id' => 'jform_attribs_info_block_position', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Category', 'id' => 'jform_attribs_show_category', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Link Category', 'id' => 'jform_attribs_link_category', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Parent', 'id' => 'jform_attribs_show_parent_category', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Link Parent', 'id' => 'jform_attribs_link_parent_category', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Author', 'id' => 'jform_attribs_show_author', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Link Author', 'id' => 'jform_attribs_link_author', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Create Date', 'id' => 'jform_attribs_show_create_date', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Modify Date', 'id' => 'jform_attribs_show_modify_date', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Publish Date', 'id' => 'jform_attribs_show_publish_date', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Navigation', 'id' => 'jform_attribs_show_item_navigation', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Icons', 'id' => 'jform_attribs_show_icons', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Print Icon', 'id' => 'jform_attribs_show_print_icon', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Email Icon', 'id' => 'jform_attribs_show_email_icon', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Voting', 'id' => 'jform_attribs_show_vote', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Hits', 'id' => 'jform_attribs_show_hits', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Unauthorised Links', 'id' => 'jform_attribs_show_noauth', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Positioning of the Links', 'id' => 'jform_attribs_urls_position', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Read More Text', 'id' => 'jform_attribs_alternative_readmore', 'type' => 'input', 'tab' => 'attrib-basic'],
		['label' => 'Alternative Layout', 'id' => 'jform_attribs_article_layout', 'type' => 'select', 'tab' => 'attrib-basic'],
		['label' => 'Show Publishing Options', 'id' => 'jform_attribs_show_publishing_options', 'type' => 'select', 'tab' => 'editor'],
		['label' => 'Show Article Options', 'id' => 'jform_attribs_show_article_options', 'type' => 'select', 'tab' => 'editor'],
		['label' => 'Administrator Images and Links', 'id' => 'jform_attribs_show_urls_images_backend', 'type' => 'select', 'tab' => 'editor'],
		['label' => 'Frontend Images and Links', 'id' => 'jform_attribs_show_urls_images_frontend', 'type' => 'select', 'tab' => 'editor'],
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
	protected $url = 'administrator/index.php?option=com_content&view=article&layout=edit';

	/**
	 * function to set the field values
	 *
	 * @param   array  $array  Array stores the value of the different input fields
	 *
	 * @return  void
	 */
	public function setFieldValues($array)
	{
		if (isset($array['text']))
		{
			$this->addArticleText($array['text']);
			unset($array['text']);
		}

		if (count($array) > 0)
		{
			parent::setFieldValues($array);
		}
	}

	/**
	 * function to add test to the article\
	 *
	 * @param   string  $text  Text to be writen in the article
	 *
	 * @return  void
	 */
	public function addArticleText($text)
	{
		$values = ['id' => 'jform_articletext', 'value' => $text];
		$this->setTextAreaValues($values);
	}
}
