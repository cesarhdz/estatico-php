<?php

namespace estatico\documento\interfaces;

/**
 * Defines document behaviour
 */
interface DocumentFormatter
{
	/**
	 * Checks whether the file is supported by the formatter
	 *
	 * @param \SplFileInfo $file
	 * @return boolean
	 */
	function isSupported(\SplFileInfo $file);

	/**
	 * Retrieve metada of the file, it can be used to be indexed
	 *
	 * @param SplFileInfo Reads the file and extracts metadata
	 * @return DocumentMeta
	 */
	function extractMetaData(\SplFileInfo $file);


	/**
	 * Retrieves a complete Document when a DocumentMetaData is given
	 *
	 * @param DocumentMeta $metaData metadata usually retrieved from index
	 * @return Document 
	 */
	function buildDocument(DocumentMeta $metaData);


}
