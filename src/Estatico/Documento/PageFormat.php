<?php

namespace Estatico\Documento;


use Symfony\Component\Finder\Finder;

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

    protected $resultSet;

    public function all()
    {
        $this->resetResultSet();

        // Use Sykfony Finder to look for files
        $finder = new Finder();


        $finder
            // We are interested only in files
            ->files()

            // located in the curent dir
            ->in($this->dir)

            // that doesn start with undercore
            ->notName('/^_/');

        // And with the registered extensions
        foreach ($this->getFormatExtensions() as $ext){
            
            $pattern = "*.${ext}";

            $finder->name($pattern);
        }

        // Every matched file will be converted into page
        foreach ($finder as $file) {
            $this->addToResultSet(new Page($file));
        }

        return $this->resultSet;
    }


    protected function addToResultSet(Page $page){
        $this->resultSet[] = $page;
    }


    protected function resetResultSet(){
        $this->resultSet = array();
    }
}
