<?php

namespace Estatico\Documento;

class DocumentFinder
{

	protected $format;
	protected $dir;

	protected $uriName;
	protected $uriExtension;

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

    public function exists()
    {
        $relativePaths = $this->format->relativePaths($this->uriName, $this->uriExtension);

        foreach ($relativePaths as $uri) {
        	$file = $this->dir . $uri;
        	return file_exists($file);
        }
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
}
