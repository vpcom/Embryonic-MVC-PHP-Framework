<?php

/**
 * The View class gathers HTML parts to diaplay.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

class View {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}

	/* Set Variables */
	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/* Display the View */
    function render() {
		extract($this->variables);

		// Header
		if (file_exists(VIEWS_FOLDER . $this->_controller . DS . 'header.php')) {
			include (VIEWS_FOLDER . $this->_controller . DS . 'header.php');
		} else {
			include (VIEWS_FOLDER . 'header.php');
		}
		
		// Top
		if (file_exists(VIEWS_FOLDER . $this->_controller . DS . 'top.php')) {
			include (VIEWS_FOLDER . $this->_controller . DS . 'top.php');
		} else {
			include (VIEWS_FOLDER . 'top.php');
		}
		
		// Content, mostly the specific content of each page
		if (file_exists(VIEWS_FOLDER . $this->_controller . DS . $this->_action . '.php')) {
		    include (VIEWS_FOLDER . $this->_controller . DS . $this->_action . '.php');
	        if ($this->_action == 'validate') {
			    include (VIEWS_FOLDER . $this->_action . '.php');
	        }
		} else {
			include (VIEWS_FOLDER . $this->_action . '.php');
		}
        	
        // Footer
		if (file_exists(VIEWS_FOLDER . $this->_controller . DS . 'footer.php')) {
			include (VIEWS_FOLDER . $this->_controller . DS . 'footer.php');
		} else {
			include (VIEWS_FOLDER . 'footer.php');
		}
    }

}

?>