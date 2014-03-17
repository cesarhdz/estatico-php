<?php

namespace Estatico\Documento;

class DocumentFinder
{

	const PRIVATE_PREFIX = '_';

	protected $format;
	protected $dir;

	protected $uriName;
	protected $uriExtension;

	protected $includePrivateFiles;

	function __construct(DocumentFormat $format, $dir){
		$this->format = $format;
		$this->setDir($dir);

		$this->allowPrivateFiles(false);
	}



    public function setDir($path){
        // Make sure path has trailing slash
    	$this->dir = rtrim($path, '/') . '/';
    }

    public function getDir()
    {
        return $this->dir;
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
        $this->includePrivateFiles = !($val);
    }
}
