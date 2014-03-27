<?php

namespace estatico\documento\interfaces;

/**
 * A documetn collection
 */
interface DocumentCollection
{

	/**
	 * Collections must be constructed with an uri and dir
	 * 
	 * @param String uri
	 * @param String dir
	 */
	function __construct($uri, $path);


	/**
	 * @return String uri
	 */
	function getUri();

	/**
	 * @return String dir
	 */
	function getPath();

	/**
	 * Return formatters that will allow indexing documetns
	 * 
	 * @return array<String> Array containing classNames of formatters
	 */
	function getFormatters();

}