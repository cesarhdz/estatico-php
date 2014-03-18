<?php

namespace Estatico\Documento\Format;

class FileFormat extends AbstractDocumentFormat
{

	/**
	 * ExtensionBlackList Extensions that are not supported by this format
	 *
	 * php and directories (or files without extension) are not allowed
	 * @var array
	 */
	static $extensionBlackList = array('', 'php');

    public function format(\SplFileInfo $fileInfo){
        return new File($fileInfo);
    }
}
