<?php

namespace Estatico\Documento;

class FileFormat extends AbstractDocumentFormat
{

	/**
	 * ExtensionBlackList Extensions that are not supported by this format
	 *
	 * php and directories (or files without extension) are not allowed
	 * @var array
	 */
	static $extensionBlackList = array('', 'php');

    public function exists($filePath)
    {
    	$this->testDirIsSet('exists');
    	
    	$file = new \SplFileInfo($this->pathFor($filePath));
    	return ($file->isFile() && $file->isReadable());
    }


    public function get($filePath){
    	if(! $this->exists($filePath)) return null;
    	
    	// Get FileInfo	
    	$file = new \SplFileInfo($this->pathFor($filePath));
        $doc = new File($file);

    	// Return the document	
    	return $doc;
    }
}
