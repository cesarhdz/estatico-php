<?php

namespace Estatico\Documento;

class UriConvention
{

	const DEFAULT_COLLECTION_NAME = 'pages';
	const DEFAULT_FILE_NAME = 'index';

	protected $uri;

	protected $CollectionName;
	protected $fileName;


    public function __construct($uri)
    {
        $this->uri = $uri;

        $this->guessCollectionName();
        $this->guessFileName();
    }

    /**
     * Get CollectionName
     * @return String collectionName
     */
    public function getCollectionName()
    {
        return $this->collectionName;
    }

    public function getFileName()
    {
        return $this->fileName;
    }


    protected function guessCollectionName(){

    	// Removes initial slash from uri and explode
    	$chunks = explode('/', ltrim($this->uri, '/'));

		// If we have only one level, collectionName is set to default
		// if it has more chunks, then collection name is the firstone    	
    	$this->collectionName = (count($chunks) <= 1) ?
    		self::DEFAULT_COLLECTION_NAME : $chunks[0];

    }

    /**
     * Filenamed is guessed using SplFileInfo
     * if no one is found, then it fallsback to DEFAULT_FILE_NAME
     * 		
     * @return void
     */
    public function guessFileName()
    {	
    	$file = new \SplFileInfo($this->uri);
    	$ext = $file->getExtension();

    	$extPattern = $ext ? ".${ext}" : '';


        $this->fileName = $file->getBaseName($extPattern) ?: self::DEFAULT_FILE_NAME;
    }

}
