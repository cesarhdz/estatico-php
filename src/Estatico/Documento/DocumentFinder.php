<?php

namespace Estatico\Documento;

use Symfony\Component\Finder\Finder;
use Estatico\Documento\Format\DocumentFormat;

class DocumentFinder
{

	const PRIVATE_PREFIX = '_';

	protected $format;
	protected $dir;

	protected $uriName;
	protected $uriExtension;

	protected $includePrivateFiles;

	protected $finder;
	protected $resultset;

	function __construct(DocumentFormat $format, $dir){
		$this->format = $format;
		$this->setDir($dir);

		$this->allowPrivateFiles(false);
	}



    protected function setDir($path){
        // Make sure path has trailing slash
    	$this->dir = rtrim($path, '/') . '/';
    }

    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Look for all files in a given dir
     * 
     * @return array An array containing all matched files
     */
    public function all()
    {
    	$this->initFinder();

    	$this->format->constraints($this->finder);

    	// Every matched file will be converted into page
        foreach ($this->finder as $file) {
            $this->resultset[] = $this->format->format($file);
        }

        return $this->resultset;
    }

    /**
     * Test wheter a previusly defined uri has a file
     * based on format config
     * 			
     * @return boolean
     */
    public function exists()
    {
    	if($this->includePrivateFiles && $this->isPrivate())
    		return false;


        $relativePaths = $this->format->relativePaths($this->uriName, $this->uriExtension);

        foreach ($relativePaths as $uri) {
        	$file = $this->dir . $uri;
        	return file_exists($file);
        }
    }


    /**
     * Test if a previously defined uri is private
     * @return boolean 
     */
    protected function isPrivate(){
    	$file = new \SplFileInfo($this->uri);

        // Only the first character is important to check
        $prefix =  $file->getFileName()[0];

        // If it starts with the prefix, it won't pass
        return ($prefix === static::PRIVATE_PREFIX);
    }

    public function setUri($uri)
    {
        $this->uri = $uri;

        // Get file info and 
        $file = new \SplFileInfo($uri);

        // Remove extension
        $this->uriExtension = $file->getExtension();
        $this->uriName = str_replace('.' . $file->getExtension(), '', $uri);
    }

	/**
	 * Set includesPrivateFiles to the inverse  value given
	 * @param  boolean $val Whether private files are allowed or not
	 * @return void      
	 */
    public function allowPrivateFiles($val)
    {
        $this->includePrivateFiles = (boolean) $val;
    }




    protected function initFinder(){
        // Init finder
        $this->finder = new Finder;
        $this->finder->files()->in($this->dir);
    	
        // Limit to public files if include privates is false
        if(! $this->includePrivateFiles)
            $this->finder->notName('/^' . self::PRIVATE_PREFIX . '/');

        // Init resultset
        $this->resultset = array();
    }
}
