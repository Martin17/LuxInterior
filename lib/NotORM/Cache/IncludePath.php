<?php

namespace NotORM\Cache;

/** 
 * Cache using PHP include
 * Modified to use PHP namespeces by Martín Panizzo <martin@fotolounge.com.ar>
 * @author Jakub Vrána <vrana@php.net>
 */
class IncludePath implements \NotORM\Interfaces\Cache {

	private $filename, $data = array();
	
	function __construct($filename) {
		$this->filename = $filename;
		$this->data = @include realpath($filename); // @ - file may not exist, realpath() to not include from include_path //! silently falls with syntax error and fails with unreadable file
		if (!is_array($this->data)) { // empty file returns 1
			$this->data = array();
		}
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
			file_put_contents($this->filename, '<?php return ' . var_export($this->data, true) . ';', LOCK_EX);
		}
	}
	
}