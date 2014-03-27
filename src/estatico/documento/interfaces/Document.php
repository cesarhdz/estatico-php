<?php

namespace estatico\documento\interfaces;

/**
 * It's the resource that provides basic information
 * to be indexed, parsed and rendered
 *
 */
interface Document
{
	/**
	 * Retieves path where document is taken from
	 * 
	 * @return String path to source file
	 */
	function getPath();

	/**
	 * Retrieves the URI that allows application to find it
	 * @return String uri
	 */
	function getUri();

	/**
	 * Retrieves file conted already parsed
	 * @return String content
	 */	
	function getContent();
}
