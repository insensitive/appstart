<?php
class ModuleImageGallery1_ConfigController extends Zend_Controller_Action {
	public function init() {
		/* Initialize action controller here */
	}
	public function installAction() {
		$this->_helper->layout ()->disableLayout ();
		$this->_helper->viewRenderer->setNoRender ( true );
		
		$db = Standard_Functions::getDefaultDbAdapter ();
		try {
			// Create Table Home Wallpaper If Not Exsist
			$sql = "CREATE TABLE `module_image_gallery_1` (
					  `module_image_gallery_1_id` int(11) NOT NULL AUTO_INCREMENT,
					  `module_image_gallery_category_1_id` int(11) DEFAULT NULL,
					  `customer_id` int(11) DEFAULT NULL,
					  `status` tinyint(4) DEFAULT NULL,
					  `order` int(11) DEFAULT NULL,
					  `last_updated_by` int(11) DEFAULT NULL,
					  `last_updated_at` datetime DEFAULT NULL,
					  `created_by` int(11) DEFAULT NULL,
					  `created_at` datetime DEFAULT NULL,
					  PRIMARY KEY (`module_image_gallery_1_id`),
					  KEY `fk_mig_category` (`module_image_gallery_category_1_id`),
					  KEY `fk_mig_created` (`created_by`),
					  KEY `fk_img_customer` (`customer_id`),
					  KEY `fk_img_updated` (`last_updated_by`),
					  CONSTRAINT `module_image_gallery_1_ibfk_1` FOREIGN KEY (`module_image_gallery_category_1_id`) REFERENCES `module_image_gallery_category_1` (`module_image_gallery_category_1_id`)
					) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;";
			
			$db->query ( $sql );
			
			// Create Table Home Wallpaper Detail If Not Exsist
			$sql = "CREATE TABLE `module_image_gallery_detail_1` (
					  `module_image_gallery_detail_1_id` int(11) NOT NULL AUTO_INCREMENT,
					  `module_image_gallery_1_id` int(11) DEFAULT NULL,
					  `language_id` int(11) DEFAULT NULL,
					  `title` varchar(60) DEFAULT NULL,
					  `description` varchar(250) DEFAULT NULL,
					  `image_path` varchar(256) DEFAULT NULL,
					  `keywords` varchar(256) DEFAULT NULL,
					  `size` int(11) DEFAULT NULL,
					  PRIMARY KEY (`module_image_gallery_detail_1_id`),
					  KEY `fk_migd_id` (`module_image_gallery_1_id`),
					  CONSTRAINT `module_image_gallery_detail_1_ibfk_1` FOREIGN KEY (`module_image_gallery_1_id`) REFERENCES `module_image_gallery_1` (`module_image_gallery_1_id`)
					) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;";
			
			$db->query ( $sql );
			
			// Create Table Home Wallpaper Detail If Not Exsist
			$sql = "CREATE TABLE `module_image_gallery_category_1` (
					  `module_image_gallery_category_1_id` int(11) NOT NULL AUTO_INCREMENT,
					  `customer_id` int(11) DEFAULT NULL,
					  `status` tinyint(4) DEFAULT NULL,
					  `order` int(11) DEFAULT NULL,
					  `last_updated_by` int(11) DEFAULT NULL,
					  `last_updated_at` datetime DEFAULT NULL,
					  `created_by` int(11) DEFAULT NULL,
					  `created_at` datetime DEFAULT NULL,
					  PRIMARY KEY (`module_image_gallery_category_1_id`),
					  KEY `fk_migc_created` (`created_by`),
					  KEY `fk_migc_customer` (`customer_id`),
					  KEY `fk_migc_updated` (`last_updated_by`)
					) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;";
			
			$db->query ( $sql );
			
			// Create Table Home Wallpaper Detail If Not Exsist
			$sql = "CREATE TABLE `module_image_gallery_category_detail_1` (
					  `module_image_gallery_category_detail_1_id` int(11) NOT NULL AUTO_INCREMENT,
					  `module_image_gallery_category_1_id` int(11) DEFAULT NULL,
					  `language_id` int(11) DEFAULT NULL,
					  `title` varchar(60) DEFAULT NULL,
					  `last_updated_by` int(11) DEFAULT NULL,
					  `last_updated_at` datetime DEFAULT NULL,
					  `created_by` int(11) DEFAULT NULL,
					  `created_at` datetime DEFAULT NULL,
					  PRIMARY KEY (`module_image_gallery_category_detail_1_id`),
					  KEY `fk_migcd_created` (`created_by`),
					  KEY `fk_migcd_category` (`module_image_gallery_category_1_id`),
					  KEY `fk_migcd_language` (`language_id`),
					  KEY `fk_migcd_updated` (`last_updated_by`),
					  CONSTRAINT `module_image_gallery_category_detail_1_ibfk_1` FOREIGN KEY (`module_image_gallery_category_1_id`) REFERENCES `module_image_gallery_category_1` (`module_image_gallery_category_1_id`)
					) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;";
			
			$db->query ( $sql );
			
			// Create Resource Dir
			mkdir ( Standard_Functions::getResourcePath () . "module-image-gallery-1", 0777 );
			mkdir ( Standard_Functions::getResourcePath () . "module-image-gallery-1/images", 0777 );
			mkdir ( Standard_Functions::getResourcePath () . "module-image-gallery-1/thumb", 0777 );
			echo "Success";
		} catch ( Exception $ex ) {
			echo $ex->getMessage ();
		}
	}
	public function indexAction() {
		// action body
	}
}

