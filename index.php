<?php

/**
 * This is the starting point of the framework.
 *
 * The file receive all user requests thanks to the .htaccess.
 * The execution of this file allows all the initialisation, the evaluation
 * of the URL and the call of the appropriate method of the appropriate
 * controller which will then drive the rest of the process.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// The application folder containing protected files
define('APP_FOLDER', ROOT . DS . 'app' . DS);

// The core classes and basic functions of the application
define('CORE_FOLDER', APP_FOLDER . 'core' . DS);
define('BASE_FOLDER', CORE_FOLDER . 'base' . DS);
define('STRUCTURE_FOLDER', CORE_FOLDER . 'structure' . DS);

// All the specific Models, Views and Controllers
define('MVC_FOLDER', APP_FOLDER . 'mvc' . DS);
define('MODELS_FOLDER', MVC_FOLDER . 'models' . DS);
define('VIEWS_FOLDER', MVC_FOLDER . 'views' . DS);
define('CONTROLLERS_FOLDER', MVC_FOLDER . 'controllers' . DS);

// Folder containing all constants for the framework and the website
define('CONFIG_FOLDER', APP_FOLDER . 'config' . DS);

// All the public resources
define('REL_IMG_FOLDER', 'img/');
define('REL_CSS_FOLDER', 'css/');

define('JSON_FOLDER', ROOT . DS . 'json' . DS);

// External libraries
define('LIB_FOLDER', ROOT . DS . 'lib' . DS);

// Constants
require_once (CONFIG_FOLDER . 'base.php');
require_once (CONFIG_FOLDER . 'db.php');
require_once (CONFIG_FOLDER . 'constants.php');

// Some mechanics (optional)
require_once (BASE_FOLDER . 'init.php'); 
setReporting();
removeMagicQuotes();
unregisterGlobals();

// Managing the URL
require_once (BASE_FOLDER . 'routing.php'); 
urlSetup();

// Loading necessary file following the URL analysis
require_once (BASE_FOLDER . 'loading.php'); 
callController();

?>