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

}
