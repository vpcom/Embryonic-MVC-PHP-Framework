<?php

/**
 * This function calls the apropriate controller method and holds the
 * __autoload function.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

/* Main Call Function */
function callController() {
	//global $url;
	global $uri;
	global $url_parameters;
	global $urlArray;
	global $controllerName;
	global $actionName;

	$queryString = $urlArray;

	
	$controllerName = ucwords($controllerName);
	$modelName = $controllerName;
	$viewName = strtolower($modelName);
	$controllerName .= 'Controller';
	/*
    print("-----");
	echo $modelName;
    print("-");
	echo $viewName;
    print("-");
	echo $actionName;
    print("-");
	echo $controllerName;
    print("-----");*/

    /*****************************************************
     * Finally, it calls the controller
     ***************************************************/
    // __autoload loads the necessaary file
	$controller = new $controllerName($modelName, $viewName, $actionName);
    // calls the method $actionName from the class $controller with the 
    // $queryString parameters
	if ((int)method_exists($controllerName, $actionName)) {
		call_user_func_array(array($controller, $actionName), $queryString);
	} else {
		/* Error Generation Code Here */
	}
}

/* Autoload any classes that are required */
function __autoload($className) {
	if (file_exists(STRUCTURE_FOLDER . strtolower($className) . '.class.php')) {
		require_once(STRUCTURE_FOLDER . strtolower($className) . '.class.php');
	} else if (file_exists(CONTROLLERS_FOLDER . strtolower($className) . '.php')) {
		require_once(CONTROLLERS_FOLDER . strtolower($className) . '.php');
	} else if (file_exists(MODELS_FOLDER . strtolower($className) . '.php')) {
		require_once(MODELS_FOLDER . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
        print("Error: can't find classes to load");
	}
}

?>