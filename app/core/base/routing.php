<?php

/**
 * This function analyses the URL to figure out the aim of the request.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

/*
$urlArray;
$controllerName;
$actionName;
*/

function urlSetup() {

	global $urlArray;
	global $controllerName;
	global $actionName;
    
    /****************************************
     * Capturing the different types of URL
     ****************************************/
    $url;
    $urlPrefix;
    // Standard case 
    // Getting the URL transmitted as a parametter to index.php
    if (isset($_GET['url'])) {
        $urlPrefix = '../../'; // this file is to level down
        $url = $_GET['url'];  
    }
    
    // Normal case when entering the site 
    if (!isset($url) || $url == '') {
        $urlPrefix = '';
        $url = 'main/display/';  // default URL
    }

    // Case without slash
    if (strpos($url, '/') === false) {
        $urlPrefix = '';
        $url = 'main/display/';
    }

    // Case with a slash at the last position and there is only one slash.
    if (strpos($url, '/') === strlen($url) - 1
        && substr_count($url, '/') == 1) {
        $urlPrefix = '../';
        
        if ($url == 'cv/') {
            $url .= 'download/';
        }
        else {
            $url .= 'display/';
        }
    }

    // Case with a slash not at the last position but none at the last position.
    if (   strpos($url, '/') !== strlen($url) - 1
        && strrpos($url, '/') !== strlen($url) - 1
        && strpos($url, '.php') === false) {
        $urlPrefix = '../';
        $url .= '/';
    }

    /**************************************************************************
     * Decomposing the URL so that we can later request the correct views and 
     * controllers
     *************************************************************************/
    $uri;
    $uri_unfiltered =  parse_url($_SERVER['REQUEST_URI']);

    // filtering the parameters
    foreach ($uri_unfiltered as $key => $value) {
        $uri[$key] = htmlentities($value);
    }
    /*
    echo '<pre>';
    print_r($uri);
    echo '</pre>';
    */
    
    // filtering the parameters and the ampersand if present
    $url_parameters;
    if (array_key_exists('query', $uri))
    {
        parse_str($uri['query'], $url_parameters_unfiltered);
        foreach ($url_parameters_unfiltered as $key => $value) {
            $url_parameters[str_replace('amp;', '', $key)] = htmlentities($value);
        }
    }
    else
    {
        $url_parameters[] = '';
    } 
    /*
    echo '<pre>';
    print_r($url_parameters);
    echo '</pre>';
    */

	$urlArray = array();
	$urlArray = explode("/",$url);

	$controllerName = $urlArray[0];
	array_shift($urlArray);
	
	$actionName = $urlArray[0];
	array_shift($urlArray);
	
    $urlArray[] = $urlPrefix;
    
    if (array_key_exists('query', $uri))
    {
        // Remove the query if it is an empty case
		if ($uri['query'] == 'key=') {
		    $urlArray[] = '';
		}
		else {
            $urlArray[] = '?'.$uri['query'];
		}
    }
    else
    {
        $urlArray[] = '';
    }

    if (array_key_exists('key', $url_parameters))
    {
        $urlArray[] = $url_parameters['key'];
    }
    else
    {
        $urlArray[] = '';
    }

	/*
	if (count($urlArray) > 0) echo $urlArray[0].'<br>';
	if (count($urlArray) > 1) echo $urlArray[1].'<br>';
	if (count($urlArray) > 2) echo $urlArray[2].'<br>';
	if (count($urlArray) > 3) echo $urlArray[3].'<br>';
	*/
}
