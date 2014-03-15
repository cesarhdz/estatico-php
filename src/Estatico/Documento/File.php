<?php

namespace Estatico\Documento;

class File implements DocumentFormat
{

	/**
	 * ExtensionBlackList Extensions that are not supported by this format
	 * @var array
	 */
	static $extensionBlackList = array('php');

	/**
	 * $prefixBlackList Prefixes not supported by this format
	 * @var array
	 */
	static $prefixBlackList = array('_', '.');


	protected $dir;


    /**
     * Is Supported
     * 
     * @param  SplFileInfo $file FileInfo to test
     * @return boolean           Whether file is supported or not
     */
    public function isSupported(\SplFileInfo  $file)
    {
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
    	$file = new \SplFileInfo($this->dir . $filePath);

    	var_dump($file->getPath());

    	return ($file->isFile() && $file->isReadable());
    }
}
