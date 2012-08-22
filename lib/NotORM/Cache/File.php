<?php

namespace NotORM\Cache;

/** 
 * Cache using file.
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 */
class File implements \NotORM\Interfaces\Cache {

    private $filename, $data = array();

    function __construct($filename) {
        $this->filename = $filename;
        $this->data = unserialize(@file_get_contents($filename)); // @ - file may not exist
    }

    function load($key) {
        if (!isset($this->data[$key])) {
            return null;
        }
        return $this->data[$key];
    }

    function save($key, $data) {
        if (!isset($this->data[$key]) || $this->data[$key] !== $data) {
            $this->data[$key] = $data;
            file_put_contents($this->filename, serialize($this->data), LOCK_EX);
        }
    }

}

