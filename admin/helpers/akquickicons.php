<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_akquickicons
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

include_once dirname(__FILE__).'/../includes/core.php';
include_once JPath::clean( AKPATH_BASE . '/proxy.php' ) ;


/**
 * Akquickicons helper.
 */
class AkquickiconsHelper extends AKProxy
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{		
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		$user = JFactory::getUser() ;
		
		if(JVERSION >= 3):
		
			JHtmlSidebar::addEntry(
				JText::_('JCATEGORY'),
				'index.php?option=com_categories&extension=com_akquickicons',
				$vName == 'categories'
			);
			
			$folders = JFolder::folders(JPATH_ADMINISTRATOR.'/components/com_akquickicons/views');
			
			JHtmlSidebar::addEntry(
				JText::_('COM_AKQUICKICONS_TITLE_ICONS'),
				'index.php?option=com_akquickicons&view=icons',
				$vName == 'icons'
			);
			
			if( $user->authorise('image.manage', 'com_akquickicons') ) :
				JHtmlSidebar::addEntry(
					JText::_('COM_AKQUICKICONS_TITLE_IMAGES'),
					'index.php?option=com_akquickicons&view=images',
					$vName == 'images'
				);
			endif;
			
		else:
			
			JSubMenuHelper::addEntry(
				JText::_('JCATEGORY'),
				'index.php?option=com_categories&extension=com_akquickicons',
				$vName == 'categories'
			);
			
			$folders = JFolder::folders(JPATH_ADMINISTRATOR.'/components/com_akquickicons/views');
			
			JSubMenuHelper::addEntry(
				JText::_('COM_AKQUICKICONS_TITLE_ICONS'),
				'index.php?option=com_akquickicons&view=icons',
				$vName == 'icons'
			);
			
			if( $user->authorise('image.manage', 'com_akquickicons') ) :
				JSubMenuHelper::addEntry(
					JText::_('COM_AKQUICKICONS_TITLE_IMAGES'),
					'index.php?option=com_akquickicons&view=images',
					$vName == 'images'
				);
			endif;
			
		endif;
		
	}
	
	
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($option = null)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_akquickicons';

		$actions = array(
			'core.admin', 
			'core.manage', 
			'core.create', 
			'core.edit', 
			'core.edit.own', 
			'core.edit.state', 
			'core.delete',
			'image.manage'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
	
	
	/*
	 * function getVersion
	 * @param 
	 */
	
	public static function getVersion()
	{
		return JVERSION ;
	}
	
}
