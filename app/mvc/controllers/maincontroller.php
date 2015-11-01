<?php

/**
 * The controller for the main category
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

class MainController extends Controller {

    /**
     * Sets up the variables for the page to build its content
     *
     * @param string $file      the file targeted (example: index.php)
     * @param string $urlPrefix the prefix needed to build links
     * @param string $uriQuery  the url parameters which need to follow the visitor
     *                          during their navigation
     * @param string $key       the parameters used to validate the type of visitor
     * @access public
     */
	function display($file = null, $urlPrefix = null, $uriQuery = null, $key = null) {
	    $pageCategory = 'main';
		$this->set('browserTitle', 'PHP MVC - vincentperrin.com');
		$this->set('pageTitle',    'Home page');
		$this->set('pageCategory', $pageCategory);
		
		$this->set('file',         $file);
		$this->set('urlPrefix',    $urlPrefix);
		$this->set('key',          $key); //
		
		$validationNeeded = false;
		/*
	    $keyValidated = $this->keyValidation($validationNeeded, $key, $uriQuery, $urlPrefix);
	    // remove the key if the validation failed
	    if ($keyValidated === false) {
	        $uriQuery = '';
	    }*/
	    $this->buildMenus($pageCategory, $urlPrefix, $file, $uriQuery);
	}
}

?>