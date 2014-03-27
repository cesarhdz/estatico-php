<?php

namespace estatico\documento;

class DocumentFormatter implements interfaces\DocumentFormatter
{
	function isSupported(SplFileInfo $file){}

	function extractMetaData(SplFileInfo $file){}

	function buildDocument(interfaces\DocumentMeta $metaData){}
}
