<?php

namespace NotORM;

/**
 * Description of Base.
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 * @abstract
 */
abstract class Base {
	protected $connection, $driver, $structure, $cache;
	protected $notORM, $table, $primary, $rows, $referenced = array();
	
	protected $debug = false;
	protected $freeze = false;
	protected $rowClass = 'NotORM_Row';
	
	protected function access($key, $delete = false) {
	}
}

?>
