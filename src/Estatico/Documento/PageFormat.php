<?php

namespace Estatico\Documento;


use Symfony\Component\Finder\Finder;

class PageFormat extends AbstractDocumentFormat
{

    const PRIVATE_REGEX = '/^_/';

    static $extensionWhiteList = array('html');


    protected $formatExtensions = array('md', 'markdown', 'mdown');


    protected $finder;
    
    protected $resultSet;


    function __construct(){
        // Private file are not include by default
        $this->setIncludePrivate(false);
    }


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


    public function all()
    {
        $this->initSearch();

        // Every matched file will be converted into page
        foreach ($this->finder as $file) {
            $this->addToResultSet(new Page($file));
        }

        return $this->resultSet;
    }


    protected function initSearch(){
        // Init finder
        $this->finder = new Finder;
        $this->finder->files()->in($this->dir);

        // Limit to public files if include privates is false
        if(! $this->includePrivate)
            $this->finder->notName(self::PRIVATE_REGEX);

        // And with the registered extensions
        foreach ($this->getFormatExtensions() as $ext){
            $pattern = "*.${ext}";

            $this->finder->name($pattern);
        }

        // Reset ResultSet
        $this->resetResultSet();
    }


    protected function addToResultSet(Page $page){
        $this->resultSet[] = $page;
    }


    protected function resetResultSet(){
        $this->resultSet = array();
    }

    public function setIncludePrivate($value)
    {
        $this->includePrivate = $value;
    }

    public function relativePaths($uri, $extUnused){
        $paths = array();

        foreach ($this->getFormatExtensions() as $ext)
            $paths[] = $uri . '.' . $ext;

        return $paths;
    }
}
