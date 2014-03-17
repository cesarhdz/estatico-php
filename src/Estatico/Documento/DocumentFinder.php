<?php

namespace Estatico\Documento;

class DocumentFinder
{

	protected $format;
	protected $dir;

	function __construct(DocumentFormat $format, $dir){
		$this->format = $format;
		$this->setDir($dir);
	}



    public function setDir($path){
        // Make sure path has trailing slash
    	$this->dir = rtrim($path, '/') . '/';
    }

    public function getDir()
    {
        return $this->dir;
    }
}
