<?php
defined('JPATH_BASE') or die;
class VmVirtueMart {
	static function loadVMLanguage($currentLang) {
		defined('DS') or define('DS', DIRECTORY_SEPARATOR);
		defined ('VMPATH_ADMIN') or define ('VMPATH_ADMIN', JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart' );
		$basePath = VMPATH_ADMIN;
		$name='com_virtuemart_install';
		$lang = JFactory::getLanguage();
		$testpath = $basePath.DS.'language'.DS.'en-GB'.DS.'en-GB.'.$name.'.ini';

		if(file_exists($testpath))
		{
			$lang->load($name, $basePath, 'en-GB', true);
		}
		$testpath = $basePath.DS.'language'.DS.$currentLang.DS.$currentLang.'.'.$name.'.ini';

		if(file_exists($testpath))
		{
			$lang->load($name, $basePath, $currentLang, true);
		}
	}
}