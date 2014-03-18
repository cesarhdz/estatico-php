<?php

namespace Estatico\Documento;

class UriConvention
{

	const DEFAULT_COLLECTION = 'root';



    /**
     * Get CollectionName
     * @return String collectionName
     */
    public function getCollectionName()
    {
        return self::DEFAULT_COLLECTION;
    }
}
