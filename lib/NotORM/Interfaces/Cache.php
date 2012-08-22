<?php
namespace NotORM\Interfaces;

/**
 * Loading and saving data, it's only cache so load() does not need to block until save().
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 */
interface Cache {

    /** Load stored data
     * @param string
     * @return mixed or null if not found
     */
    function load($key);

    /** Save data
     * @param string
     * @param mixed
     * @return null
     */
    function save($key, $data);
}

?>
