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
class ContactEditPage extends AdminEditPage
{
	/**
	 * Array of tabs present on this page
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $tabs = ['details', 'misc', 'publishing', 'attrib-display', 'attrib-email'];

	/**
	 * Array of all the field Details of the Edit page, along with the ID and tab value they are present on
	 *
	 * @var    array
	 * @since  3.2
	 */
	public $inputFields = [
		['label' => 'Name', 'id' => 'jform_name', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Alias', 'id' => 'jform_alias', 'type' => 'input', 'tab' => 'header'],
		['label' => 'Linked User', 'id' => 'jform_user_id', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Image', 'id' => 'jform_image', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Position', 'id' => 'jform_con_position', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Email', 'id' => 'jform_email_to', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Address', 'id' => 'jform_address', 'type' => 'textarea', 'tab' => 'details'],
		['label' => 'City or Suburb', 'id' => 'jform_suburb', 'type' => 'input', 'tab' => 'details'],
		['label' => 'State or Province', 'id' => 'jform_state', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Postal/ZIP Code', 'id' => 'jform_postcode', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Country', 'id' => 'jform_country', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Telephone', 'id' => 'jform_telephone', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Mobile', 'id' => 'jform_mobile', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Fax', 'id' => 'jform_fax', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Website', 'id' => 'jform_webpage', 'type' => 'input', 'tab' => 'details'],
		['label' => 'First Sort Field', 'id' => 'jform_sortname1', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Second Sort Field', 'id' => 'jform_sortname2', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Third Sort Field', 'id' => 'jform_sortname3', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Status', 'id' => 'jform_published', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Category', 'id' => 'jform_catid', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Featured', 'id' => 'jform_featured', 'type' => 'fieldset', 'tab' => 'details'],
		['label' => 'Access', 'id' => 'jform_access', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Language', 'id' => 'jform_language', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Tags', 'id' => 'jform_tags', 'type' => 'select', 'tab' => 'details'],
		['label' => 'Version Note', 'id' => 'jform_version_note', 'type' => 'input', 'tab' => 'details'],
		['label' => 'Miscellaneous Information', 'id' => 'jform_misc', 'type' => 'textarea', 'tab' => 'misc'],
		['label' => 'Start Publishing', 'id' => 'jform_publish_up', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Finish Publishing', 'id' => 'jform_publish_down', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created Date', 'id' => 'jform_created', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created By', 'id' => 'jform_created_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Created By Alias', 'id' => 'jform_created_by_alias', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified Date', 'id' => 'jform_modified', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Modified By', 'id' => 'jform_modified_by', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Revision', 'id' => 'jform_version', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Hits', 'id' => 'jform_hits', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'ID', 'id' => 'jform_id', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Meta Description', 'id' => 'jform_metadesc', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Meta Keywords', 'id' => 'jform_metakey', 'type' => 'textarea', 'tab' => 'publishing'],
		['label' => 'Robots', 'id' => 'jform_metadata_robots', 'type' => 'select', 'tab' => 'publishing'],
		['label' => 'Rights', 'id' => 'jform_metadata_rights', 'type' => 'input', 'tab' => 'publishing'],
		['label' => 'Show Category', 'id' => 'jform_params_show_contact_category', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show Contact List', 'id' => 'jform_params_show_contact_list', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Display Format', 'id' => 'jform_params_presentation_style', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show Tags', 'id' => 'jform_params_show_tags', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Name', 'id' => 'jform_params_show_name', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Contact\'s Position', 'id' => 'jform_params_show_position', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Email', 'id' => 'jform_params_show_email', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Street Address', 'id' => 'jform_params_show_street_address', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'City or Suburb', 'id' => 'jform_params_show_suburb', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'State or County', 'id' => 'jform_params_show_state', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Postal Code', 'id' => 'jform_params_show_postcode', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Country', 'id' => 'jform_params_show_country', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Telephone', 'id' => 'jform_params_show_telephone', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Mobile Phone', 'id' => 'jform_params_show_mobile', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Fax', 'id' => 'jform_params_show_fax', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Webpage', 'id' => 'jform_params_show_webpage', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Misc. Information', 'id' => 'jform_params_show_misc', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Image', 'id' => 'jform_params_show_image', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'vCard', 'id' => 'jform_params_allow_vcard', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show User Articles', 'id' => 'jform_params_show_articles', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => '# Articles to List', 'id' => 'jform_params_articles_display_num', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show Profile', 'id' => 'jform_params_show_profile', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show Links', 'id' => 'jform_params_show_links', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Link A Label', 'id' => 'jform_params_linka_name', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link A URL', 'id' => 'jform_params_linka', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link B Label', 'id' => 'jform_params_linkb_name', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link B URL', 'id' => 'jform_params_linkb', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link C Label', 'id' => 'jform_params_linkc_name', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link C URL', 'id' => 'jform_params_linkc', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link D Label', 'id' => 'jform_params_linkd_name', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link D URL', 'id' => 'jform_params_linkd', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link E Label', 'id' => 'jform_params_linke_name', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Link E URL', 'id' => 'jform_params_linke', 'type' => 'input', 'tab' => 'attrib-display'],
		['label' => 'Alternative Layout', 'id' => 'jform_params_contact_layout', 'type' => 'select', 'tab' => 'attrib-display'],
		['label' => 'Show Contact Form', 'id' => 'jform_params_show_email_form', 'type' => 'select', 'tab' => 'attrib-email'],
		['label' => 'Send Copy to Submitter', 'id' => 'jform_params_show_email_copy', 'type' => 'select', 'tab' => 'attrib-email'],
		['label' => 'Banned Email', 'id' => 'jform_params_banned_email', 'type' => 'textarea', 'tab' => 'attrib-email'],
		['label' => 'Banned Subject', 'id' => 'jform_params_banned_subject', 'type' => 'textarea', 'tab' => 'attrib-email'],
		['label' => 'Banned Text', 'id' => 'jform_params_banned_text', 'type' => 'textarea', 'tab' => 'attrib-email'],
		['label' => 'Session Check', 'id' => 'jform_params_validate_session', 'type' => 'select', 'tab' => 'attrib-email'],
		['label' => 'Custom Reply', 'id' => 'jform_params_custom_reply', 'type' => 'select', 'tab' => 'attrib-email'],
		['label' => 'Contact Redirect', 'id' => 'jform_params_redirect', 'type' => 'input', 'tab' => 'attrib-email'],
	];

	/**
	 * XPath string used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $waitForXpath = "//form[@id='contact-form']";

	/**
	 * URL used to uniquely identify this page
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $url = 'administrator/index.php?option=com_contact&view=contact&layout=edit';

}

