<?php

namespace Estatico\Documento;

class PageCollection
{

	protected $dir;
	protected $name;

    public function __construct($dir, $name)
    {
        $this->setDir($dir);
        $this->name = $name;
    }

    public function getDir()
    {
        return $this->dir;
    }

    public function getName()
    {
        return $this->name;
    }


    /**
     * Assigns dir to collection
     * @param void
     *
     * @throws InvalidArgumentException if argument is not a dir
     */
    protected function setDir($dir){
    	if(! is_dir($dir)){
    		$msg = "${dir} is not a valid dir, check if it exists and has read permission";
    		throw new \InvalidArgumentException($msg);
    	}

    	$this->dir = $dir;
    }
}
