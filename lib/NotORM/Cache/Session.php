<?php
namespace NotORM\Cache;

/** 
 * Cache using $_SESSION["NotORM"]
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 * 
 */
class Session implements \NotORM\Interfaces\Cache {

    function load($key) {
        if (!isset($_SESSION["NotORM"][$key])) {
            return null;
        }
        return $_SESSION["NotORM"][$key];
    }

    function save($key, $data) {
        $_SESSION["NotORM"][$key] = $data;
    }

}

?>
