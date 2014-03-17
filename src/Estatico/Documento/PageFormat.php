<?php

namespace Estatico\Documento;


class PageFormat extends AbstractDocumentFormat
{

    static $extensionWhiteList = array('html');


    protected $formatExtensions = array('md', 'markdown', 'mdown');


    function getFormatExtensions(){
        return $this->formatExtensions;
    }


    public function relativePaths($uri, $extUnused){
        $paths = array();

        foreach ($this->getFormatExtensions() as $ext)
            $paths[] = $uri . '.' . $ext;

        return $paths;
    }

    public function format(\SplFileInfo $fileInfo){
        return new Page($fileInfo);
    }
}
