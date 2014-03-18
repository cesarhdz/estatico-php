<?php

namespace Estatico\Documento;

class PageCollection
{

	protected $dir;
	protected $name;

    public function __construct($dir, $name)
    {
        $this->dir = $dir;
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
}
