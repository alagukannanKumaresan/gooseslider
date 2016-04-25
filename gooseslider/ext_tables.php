<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array (
	'tx_gooseslider_sliderimages' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:goose_slider/locallang_db.xml:pages.tx_gooseslider_sliderimages',		
		'config' => array (
			'type' => 'group',
			'internal_type' => 'file',
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],	
			'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
			'uploadfolder' => 'uploads/tx_gooseslider',
			'show_thumbs' => 1,	
			'size' => 5,	
			'minitems' => 0,
			'maxitems' => 10,
		)
	),
);


#t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("pages",'tx_gooseslider_sliderimages', '', 'after:nav_title');


#t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:goose_slider/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');
?>