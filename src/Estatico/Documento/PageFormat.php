<?php

namespace Estatico\Documento;

class PageFormat implements DocumentFormat
{

	static $extensionWhiteList = array('html');

    function isSupported($uri)
    {
        $file = new \SplFileInfo($uri);
        $ext = $file->getExtension();

        if(in_array($ext, self::$extensionWhiteList)) return true;
    }


    function setDir($dir){

    }


    function exists($filePath){

    }
}
