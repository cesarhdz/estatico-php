<?php

namespace estatico\indice;

class DocumentCrawler
{
	private $dir;

    public function __construct($dir)
    {
        $this->setDir($dir);
    }

    /**
     * 		
     * @return String Dir that document is Crawling
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param String $dir Only valid dirs are allowed
     */
	protected function setDir($dir){

		var_dump($dir);
		var_dump(is_dir($dir));

		if(is_dir($dir)) $this->dir = $dir;
	}
}
