<?php

/**
 * @package Unlimited Elements
 * @author UniteCMS http://unitecms.net
 * @copyright Copyright (c) 2016 UniteCMS
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

//no direct accees
defined ('UNLIMITED_ELEMENTS_INC') or die ('restricted aceess');

class UniteCreatorPodsIntegrate{
	
	private static $objPodsIntegrate;
	const PREFIX = "cf_";
	const TYPE_FILE = "file";
	const TYPE_PICK = "pick";
	
	
	/**
	 * get acf integrate object
	 */
	public static function getObjPodsIntegrate(){
		
		if(empty(self::$objPodsIntegrate))
			self::$objPodsIntegrate = new UniteCreatorPodsIntegrate();
		
		
		return(self::$objPodsIntegrate);
	}

	/**
	 * get image title
	 */
	private function getImageFieldTitle($post){
		
		$title = UniteFunctionsUC::getVal($post, "post_title");
		$filename = UniteFunctionsUC::getVal($post, "guid");
		
		if(empty($title))
			$title = $filename;
		
		$info = pathinfo($title);
		$name = UniteFunctionsUC::getVal($info, "filename");
		
		if(!empty($name))
			$title = $name;
		
		return($title);
	}
	
	
	/**
	 * get image data from image
	 */
	private function getImageData($post, $fieldName, $arrValues){
		
		$imageID = UniteFunctionsUC::getVal($post, "ID");
		if(empty($imageID))
			return(null);
		
		$title = $this->getImageFieldTitle($post);
		
		$arrSizes = UniteFunctionsWPUC::getArrThumbSizes();
		
		$urlFull = UniteFunctionsWPUC::getUrlAttachmentImage($imageID);
		
		$urlThumbMedium = UniteFunctionsWPUC::getUrlAttachmentImage($imageID, UniteFunctionsWPUC::THUMB_MEDIUM);
		$urlThumbLarge = UniteFunctionsWPUC::getUrlAttachmentImage($imageID, UniteFunctionsWPUC::THUMB_LARGE);
		
		$arrValues[$fieldName] = $urlFull;
		$arrValues[$fieldName."_title"] = $title;
		$arrValues[$fieldName."_thumb"] = $urlThumbMedium;
		$arrValues[$fieldName."_thumb_large"] = $urlThumbLarge;
		
		return($arrValues);		
	}
	
	
	/**
	 * get file data from post
	 */
	private function getFileData($post, $fieldName, $arrValues){
		
		$filepath = UniteFunctionsUC::getVal($post, "guid");
		$title = $this->getImageFieldTitle($post);

		$arrValues[$fieldName] = $filepath;
		$arrValues[$fieldName."_title"] = $title;
		
		
		return($arrValues);
	}

	
	/**
	 * get file data from post
	 */
	private function getPickData($data, $fieldName, $arrValues){
				
		if(is_string($data) == true){
			$arrValues[$fieldName] = $data;
			return($arrValues);
		}
		
		if(is_array($data) == false){
			$arrValues[$fieldName] = "";
			
			return($arrValues);
		}
		
		//only if array
		
		$isFirst = false;
		foreach($data as $name => $value){
			
			if(is_array($value) || is_object($value))
				continue;
			
			if($isFirst == false){
				$isFirst = true;
				$arrValues[$fieldName] = $value;
			}
			
			$name = strtolower($name);
			
			$arrValues[$fieldName."_".$name] = $value;
		}
		
		
		return($arrValues);
	}
	
	
	/**
	 * get file field data
	 */
	private function getFileFieldData($post, $fieldName, $arrValues){
		
		$postID = UniteFunctionsUC::getVal($post, "ID");
		
		if(empty($postID)){
			
			$arrValues[$fieldName] = "";
			return($arrValues);
		}
		
		$postType = UniteFunctionsUC::getVal($post, "post_type");
		if($postType != "attachment"){
			
			$arrValues[$fieldName] = "";
			return($arrValues);
		}
		
		
		$mimeType = UniteFunctionsUC::getVal($post, "post_mime_type");
		
		$isImage = false;
		if(strpos($mimeType, "image/") === 0)
			$isImage = true;	
		
		if($isImage == true)
			$arrValues = $this->getImageData($post, $fieldName, $arrValues);
		else
			$arrValues = $this->getFileData($post, $fieldName, $arrValues);
		
				
		return($arrValues);
	}
	
	/**
	 * modify data by type
	 */
	private function addFieldDataByType($type, $data, $fieldName, $arrValues){

		
		switch($type){
			case self::TYPE_FILE:
				
				$arrValues = $this->getFileFieldData($data, $fieldName, $arrValues);
				
			break;
			case self::TYPE_PICK:
				$arrValues = $this->getPickData($data, $fieldName, $arrValues);
			break;
			default:
				if(is_string($data))
					$arrValues[$fieldName] = $data;
				else
					$arrValues[$fieldName] = "";
				
			break;
		}
		
		
		return($arrValues);
	}
	
	
	/**
	 * get pods fields for post
	 * if not fields - return null
	 */
	public function getPodsFields($postID, $addPrefix = true){
		
		$post = get_post($postID);
		
		if(empty($post))
			return(null);
		
		if(function_exists("is_pod") == false)
			return(null);
		
		$postType = $post->post_type;
			
		$objPod = pods($postType, $postID);
		if(empty($objPod))
			return(null);
		
		if(is_object($objPod) == false)
			return(null);
		
		if(method_exists($objPod, "fields") == false)
			return(null);
		
		$arrFields = $objPod->fields();
		
		if(empty($arrFields))
			return(null);
		
		$arrValues = array();
		foreach($arrFields as $name => $field){
			
			$fieldName = $name;
			if($addPrefix == true)
				$fieldName = self::PREFIX.$fieldName;	
			
			$type = UniteFunctionsUC::getVal($field, "type");
			
			$data = $objPod->field($name);
			
			$arrValues = $this->addFieldDataByType($type, $data, $fieldName, $arrValues);
		}
		
		
		return($arrValues);
	}
	
	
	/**
	 * check if pods exists
	 */
	public static function isPodsExists(){
		
		$isPodsExists = function_exists("pods");
		
		return($isPodsExists);
	}
	
	
}