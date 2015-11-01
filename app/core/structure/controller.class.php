<?php

/**
 * This class is the top Controller class.
 *
 * It performs the main intialisations and provides the main building methods.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

class Controller {

    protected $_model;    
    protected $_controller;    
    protected $_action;    
    protected $_view;

    function __construct($model, $controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;
        //echo '<br>'.$controller.'<br>';
        //echo '<br>'.$action.'<br>';
        $this->$model = new $model;
        $this->_view = new View($controller,$action);
    }
    
    function set($name,$value) {    
        $this->_view->set($name,$value);    
    }    

    function buildMenus($pageCategory, $urlPrefix, $file, $uriQuery) {
        $this->buildMenu($pageCategory, $urlPrefix, $file, $uriQuery);
        //$this->buildFooterLinks($pageCategory, $urlPrefix, $file, $uriQuery);    
    }    

    function buildMenu($pageCategory, $urlPrefix, $file, $uriQuery) {
        $menuId['main']        = '';    
        $menuId['si']          = '';    
        $menuId[$pageCategory] = ' id="current"';

        $menuItems;    

        $menu = '<div id="menu" style="text-align:right;" ><ul>';    

        $menuItems['main']   = $urlPrefix.'main/display/'.$file.$uriQuery;    
        $menuItems['si']     = $urlPrefix.'si/display/'.$file.$uriQuery;

        $menuItems[$pageCategory] = '.';    

        $menu .= '<li><a'.$menuId['main'].' href="'.$menuItems['main'].'">Home</a></li>';    
        $menu .= ' | <li><a'.$menuId['si'].' href="'.$menuItems['si'].'">Space Invaders</a></li>';    

        $menu .= "</ul></div>";    
        $this->set('menu', $menu);    
        $this->set('menuItems', $menuItems);    
    }    
    /*    
    function buildFooterLinks($pageCategory, $urlPrefix, $file, $uriQuery) {
    
    $footerId['about']        = '';    
        $footerId['credits']      = '';    
        $footerId[$pageCategory]  = ' id="current"';    

        $footerItems;    
        $footerLinks = '';    

    $footerItems['about']     = $urlPrefix.'about/display/'.$file.$uriQuery;    
        $footerItems['credits']   = $urlPrefix.'credits/display/'.$file.$uriQuery;    
        $menuItems[$pageCategory] = '#';    

    // reuse for the slogan or vp link    
        //$footerLinks .= '<a'.$footerId['about'].' href="'.$footerItems['about'].'">About</a>';    
        //$this->set('footerLinks', $footerLinks);    
    }    
    */    
    function __destruct() {
        // The View is rendered after all the initialization done by the Controller
        $this->_view->render();    
    }
}

?>