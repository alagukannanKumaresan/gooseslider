<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Alagukannan Kumaresan <alagukannan83@yahoo.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */
#require_once(PATH_tslib . 'class.tslib_pibase.php');

/**
 * Plugin 'Goose Slider' for the 'goose_slider' extension.
 *
 * @author	Alagukannan Kumaresan <alagukannan83@yahoo.de>
 * @package	TYPO3
 * @subpackage	tx_gooseslider
 */
class tx_gooseslider_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin {

	var $prefixId = 'tx_gooseslider_pi1';  // Please give same name of class name
	var $scriptRelPath = 'pi1/class.tx_gooseslider_pi1.php'; 
	var $extKey = 'goose_slider'; // Typo3 extension key.
	var $pi_checkCHash = true;

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		$content = "";
		$this->upload = "uploads/tx_gooseslider/";
		foreach ($GLOBALS['TSFE']->rootLine as $page) {

			$images = $page["tx_gooseslider_sliderimages"];
			if ($images != "") {

				$images_array = explode(",", $images);


				if (count($images_array) > 0) {
					$content .= '<div class="rslides_container">
								<ul class="rslides centered-btns centered-btns1" id="mainslider">';
					foreach ($images_array AS $image_single) {
						$content .= '<li>';
						$imgTSConfig['img'] = 'IMAGE';
						$imgTSConfig['img.'] = $this->conf['img.'];
						$imgTSConfig['img.']['file'] = $this->upload . $image_single;
						#$imgTSConfig['img.']['file.']['maxW'] = "1500";
						#$imgTSConfig['img.']['file.']['maxH'] = "575c";
						if (!isset($imgTSConfig['img.']['file.']['width'])) {
							$imgTSConfig['img.']['file.']['width'] = "1920c";
						}
						if (!isset($imgTSConfig['img.']['file.']['height'])) {
							$imgTSConfig['img.']['file.']['height'] = "595c";
						}
						$imgTSConfig['img.']['format'] = 'jpg';
						#$imgTSConfig['img.']['altText'] = "www.yourwebsite.com";
						#$imgTSConfig['img.']['titleText'] = "www.yourwebsite.com";
						$bild_img = $this->cObj->IMAGE($imgTSConfig['img.']);

						//print_r($imgTSConfig);

						$content .= $bild_img;
						$content .= '</li>';
					}
					$content .= '</ul></div>';
				}


				break;
			}
		}


		return $content;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/goose_slider/pi1/class.tx_gooseslider_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/goose_slider/pi1/class.tx_gooseslider_pi1.php']);
}
?>