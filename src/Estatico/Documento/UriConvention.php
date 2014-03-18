<?php

namespace Estatico\Documento;

class UriConvention
{

	const DEFAULT_COLLECTION = 'root';

	protected $uri;
	protected $CollectionName;


    public function __construct($uri)
    {
        $this->uri = $uri;

        $this->guessCollectionName();
    }

    /**
     * Get CollectionName
     * @return String collectionName
     */
    public function getCollectionName()
    {
        return $this->collectionName;
    }



    protected function guessCollectionName(){

    	// Removes initial slash from uri and explode
    	$chunks = explode('/', ltrim($this->uri, '/'));

		// If we have only one level, collectionName is set to default
		// if it has more chunks, then collection name is the firstone    	
    	$this->collectionName = (count($chunks) <= 1) ?
    		self::DEFAULT_COLLECTION : $chunks[0];

    }

}
