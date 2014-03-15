<?php

namespace Estatico\Documento;

interface DocumentFormat
{
	/**
	 * Is Supported
	 *
	 * Having an SplFileInfo the format decides wheter it is suportted or not
	 */
	function isSupported(\SplFileInfo $file);
}
