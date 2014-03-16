<?php

namespace Estatico\Documento;

class PageFormat extends AbstractDocumentFormat
{

	static $extensionWhiteList = array('html');


	protected $formatExtensions = array('md', 'markdown', 'mdown');


    function get($filePath){
        $filePath = $this->getFilePathFor($filePath);

        // Only if file exists a document is returned
        if($filePath){
            $file = new \SplFileInfo($filePath);
            $doc = new Page($file);

            return $doc;
        }
    }


    function exists($filePath){
    	
    	$file = $this->getFilePathFor($filePath);

    	return ($file) ? true : false;
    }


    protected function getFilePathFor($relativePath){
    	// Remove extension
    	$filteredPath = str_replace('.html', '', $relativePath);

    	$basePath = $this->dir . $filteredPath;

    	$paths = array();

    	foreach ($this->getFormatExtensions() as $ext) {
            $path = $basePath . '.' . $ext;

            // If file exists returns the path
    		if(file_exists($path)) return $path;
    	}
    }


    function getFormatExtensions(){
    	return $this->formatExtensions;
    }
}
