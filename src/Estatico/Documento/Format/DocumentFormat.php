<?php

namespace Estatico\Documento\Format;

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
	function isSupported($file);



	function relativePaths($fileUri, $ext);


	/**
	 * Constraint finder
	 * @param  Finder $finder 
	 * @return void         
	 */
	function constraints($finder);

	/**
	 * Converts an SplFileInfo into a Document
	 * @param  SplFileInfo $file 
	 * @return Document
	 */
	function format(\SplFileInfo $file);
}
