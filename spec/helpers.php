<?php

if(!function_exists('get_example_dir')){
	function get_example_dir($dirName){
		return __DIR__ . '/fixtures/' . $dirName;
	}
}