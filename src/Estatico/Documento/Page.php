<?php

namespace Estatico\Documento;

class Page implements Document
{

	var $name;

	function __construct(\SplFileInfo $file){
		$this->name = $file->getFileName();
		// $this->name = $file->getRelativePath();
	}
}
