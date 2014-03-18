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

    /**
     * Converts an SplFileInfo into a Document
     *
     * Children must implement this method
     * 
     * @param  SplFileInfo $fileInfo 
     * @return Document    Document ready to be parsed or rendered
     */
    abstract function format(\SplFileInfo $fileInfo);

    /**
     * Tests if the format supports the given uri
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

    /**
     * Constraints search before finder trigger search
     * @param  Finder $finder 
     * @return void         
     */
    function constraints($finder){
        // By deafult no constraints are applied
    }

    protected function isValid(\SplFileInfo $file){
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


    function relativePaths($fileUri, $ext){
        // Returns the filename without any modification
        $path = ($ext) ? $fileUri . '.' . $ext : $fileUri;

        return array($path);
    }
}
