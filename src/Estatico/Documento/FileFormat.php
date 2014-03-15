<?php

namespace Estatico\Documento;

class FileFormat implements DocumentFormat
{

	/**
	 * ExtensionBlackList Extensions that are not supported by this format
	 *
	 * php and directories (or files without extension) are not allowed
	 * @var array
	 */
	static $extensionBlackList = array('', 'php');

	/**
	 * $prefixBlackList Prefixes not supported by this format
	 * @var array
	 */
	static $prefixBlackList = array('_');


	protected $dir;


    /**
     * Is Supported
     * 
     * @param  String $file FileInfo to test
     * @return boolean           Whether file is supported or not
     */
    public function isSupported($uri)
    {
    	// Trnsofrm URI into SplInfo to perform validation
    	$file = new \SplFileInfo($uri);

    	// Test if this extension is allowed
        if(in_array($file->getExtension(), self::$extensionBlackList)) 
        	return false;

        // Only the first character is important to check
        $prefix =  $file->getFileName()[0];

        // If it starts with the prefix, it won't pass
        if(in_array($prefix, self::$prefixBlackList))
        	return false;

        return true;
    }



    public function setDir($path){
    	$this->dir = $path;
    }

    public function exists($filePath)
    {
    	$this->testDirIsSet('exists');
    	
    	$file = new \SplFileInfo($this->pathFor($filePath));
    	return ($file->isFile() && $file->isReadable());
    }


    public function get($filePath){
    	if(! $this->exists($filePath)) return null;
    	
    	// Get FileInfo	
    	$file = new \SplFileInfo($this->pathFor($filePath));
        $doc = new File($file);

    	// Return the document	
    	return $doc;
    }


    protected function pathFor($path){
    	return $this->dir . $path;
    }


    protected function testDirIsSet($method){
    	if(is_null($this->dir)){
    		throw new \LogicException("In order to use File::${method}() you first need to use File::setDir()");
    	} 
    }
}
