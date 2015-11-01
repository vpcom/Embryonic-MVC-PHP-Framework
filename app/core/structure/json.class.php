<?php

/**
 * This class is the top Model class.
 *
 * It provides with the method to read a JSON file to feed the website with data.
 *
 * PHP5
 *
 * @author     Vincent Perrin <contact@vincentperrin.com>
 * @copyright  2012-2015 vincentperrin.com
 * @license    MIT
 */

class JSon {

    function getAll($file) {
        $content = file_get_contents(JSON_FOLDER . $file);
        $decoded_content = json_decode($content, true);

        return $decoded_content;
    }
}

?>