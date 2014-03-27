<?php

namespace estatico\documento\interfaces;

/**
 * Document metadata can be indexed that's why
 * it extends Serializable.
 * It is also returned by DocumentFormatter::format method
 *
 */
interface DocumentMeta extends \Serializable
{

	/**
	 * It should be constructed with an array of data
	 * 
	 * @param array $data [description]
	 */
	function __construct(array $data);



	/**
	 * @return String Identifier of the document
	 */
	function getUri();

	/**
	 * @return String pa
	 */
	function getPath();


	/**
	 * Formatter ClassName that can be used to build a complete document
	 * 
	 * @return String classname
	 */
	function getFormatter();

	/**
	 * Checks if a variable is defined
	 * 
	 * @param  String  $key varaibleName
	 * @return boolean      
	 */
	function has($key);

	/**
	 * Retrieves the value of a key
	 * 
	 * @param  String $key
	 * @return mixed      
	 */
	function get($key);
}
