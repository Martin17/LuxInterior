<?php

namespace NotORM\Cache;

/**
 * Cache using "NotORM." prefix in APC
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 */
class APC implements \NotORM\Interfaces\Cache {

    function load($key) {
        $return = apc_fetch("NotORM.$key", $success);
        if (!$success) {
            return null;
        }
        return $return;
    }

    function save($key, $data) {
        apc_store("NotORM.$key", $data);
    }

}
