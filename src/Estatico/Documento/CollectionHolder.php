<?php

namespace Estatico\Documento;

class CollectionHolder
{

	protected $collections;

    public function __construct($dir)
    {
        $this->dir = $dir;
        $this->collections = array();
    }

    public function getCollections()
    {
        return $this->collections;
    }
}
