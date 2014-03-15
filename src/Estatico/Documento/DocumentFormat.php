<?php

namespace Estatico\Documento;

interface DocumentFormat
{
	/**
	 * Is Supported
	 *
	 * Having an SplFileInfo the format decides wheter it is suportted or not
	 * The format is the input
	 * 
	 * @param SplFileInfo $file
	 */
	function isSupported(\SplFileInfo $file);

	/**
	 * SetDir Dir lo look for files
	 * @param String $path 
	 * @return void
	 */
	function setDir($path);


	/**
	 * Exists
	 *
	 * Test if file exists
	 * @param  String $filePath A file path
	 * @return Boolean           Whether the file exists or not
	 */
	function exists($filePath);
}
