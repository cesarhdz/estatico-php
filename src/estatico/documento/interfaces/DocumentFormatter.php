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
	 * Read file info and returns a document
	 * 
	 * @param  SplFileInfo $file [description]
	 * @return DocumentMetadata 
	 */
	function format(\SplFileInfo $file);

}
