<?php

class Console {

	public function __construct() {
		// set up a fatal error catcher
		// PHP 5.2+
		register_shutdown_function(array($this, 'logFatalError'));	
	}

	public function log() {
		$args = func_get_args();
		echo $this->createLog('log', $args);
	}
	
	public function warn() {
		$args = func_get_args();
		echo $this->createLog('warn', $args);
	}
	
	public function error() {
		$args = func_get_args();
		echo $this->createLog('error', $args);
	}

	private function createLog($type, $list) {
		$tag = '<script type="text/javascript">';
		
		for ($i = 0, $len = count($list); $i < $len; $i++) {
			$datatype = gettype($list[$i]);
			$tag .= 'console.' . $type . '(';
			switch ($datatype) {
				case 'string':
					$tag .= '"' . $list[$i] . '");';
					break;
				case 'array':
				case 'object':
					$tag .= json_encode($list[$i]) . ');';
					break;
				case 'boolean':
					$tag .= ($list[$i] ? 'true' : 'false') . ');';
					break;
				case 'NULL':
                                        $tag .= 'null);';
                                        break;
				default:
					$tag .= $list[$i] . ');';
					break;
			}
		}
	
		return $tag .= '</script>\n';
	}

	// this is public because of register_shutdown_function
	public function logFatalError() {
		$error = error_get_last();

		if (!$error) {
			// no error
			return;
		}

		$this->error('<fatal error>', $error);
	}
}
