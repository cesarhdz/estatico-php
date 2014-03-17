<?php

namespace Estatico\Documento;

abstract class AbstractDocumentFormat implements DocumentFormat
{

	/**
	 * ExtensionBlackList Extensions that are not supported by this format
	 *
	 * php and directories (or files without extension) are not allowed
	 * @var array
	 */
	static $extensionBlackList;
    static $extensionWhiteList;

    const PRIVATE_PREFIX = '_';

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

        return $this->isValid($file);
    }



    protected function isValid(\SplFileInfo $file){
        if($this->isPrivate($file)) return false;

        if(! $this->hasValidExtension($file)) return false;

        return true;
    }


    protected function hasValidExtension(\SplFileInfo $file){
        // Test if this extension is allowed
        if(static::$extensionBlackList && is_array(static::$extensionBlackList)){
            if(in_array($file->getExtension(), static::$extensionBlackList)) 
                return false;
        }


        if(static::$extensionWhiteList && is_array(static::$extensionWhiteList)){
            if(! in_array($file->getExtension(), static::$extensionWhiteList)) 
                return false;
        }

        // White and Black luist passed
        return true;
    }


    protected function isPrivate(\SplFileInfo $file){
        // Only the first character is important to check
        $prefix =  $file->getFileName()[0];

        // If it starts with the prefix, it won't pass
        return ($prefix === static::PRIVATE_PREFIX);
    }

    function relativePaths($fileUri, $ext){
        // Returns the filename without any modification
        $path = ($ext) ? $fileUri . '.' . $ext : $fileUri;

        return array($path);
    }


    function constraints($finder){
        // By deafult no constraints are applied
    }


    abstract function format(\SplFileInfo $format);
}
