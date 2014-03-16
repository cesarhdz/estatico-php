<?php

namespace Estatico\Documento;

class PageFormat extends AbstractDocumentFormat
{

	static $extensionWhiteList = array('html');


	protected $formatExtensions = array('md', 'markdown', 'mdown');


    function get($dir){

    }


    function exists($filePath){
    	
    	$paths = $this->pathsFor($filePath);

    	foreach ($paths as $path){
    	 	if(file_exists($path)) return true;
    	}

    	return false;
    }


    protected function pathsFor($relativePath){
    	// Remove extension
    	$filteredPath = str_replace('.html', '', $relativePath);

    	$basePath = $this->dir . $filteredPath;

    	$paths = array();

    	foreach ($this->getFormatExtensions() as $ext) {
    		$paths[] = $basePath . '.' . $ext;
    	}

    	return $paths;
    }


    function getFormatExtensions(){
    	return $this->formatExtensions;
    }
}
