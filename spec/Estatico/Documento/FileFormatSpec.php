<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

  require_once 'PHPUnit/Autoload.php';
  require_once 'PHPUnit/Framework/Assert/Functions.php';

require __DIR__ . '/../../helpers.php';

class FileFormatSpec extends ObjectBehavior
{
    function it_is_initializable(){
        $this->shouldHaveType('Estatico\Documento\FileFormat');
        $this->shouldImplement('Estatico\Documento\DocumentFormat');
    }

    function it_can_support_almost_any_file_type_because_is_the_default_format(){

    	$paths = array(
    		'vendor/assets/bundle/css/style.css',
    		'javascript/main.js',
    		'robots.txt',
            '.htaccess'
    	);

    	foreach ($paths as $path) {
    		$this->shouldBeSupported($path);
    	}
    }

    function it_doesnt_support_dirs(){
        $this->shouldNotBeSupported('/');
        $this->shouldNotBeSupported('/bundle/collection/');
    }


    function it_doesnt_support_certain_files(){
    	$paths = array(
    		'_privateFilesMarkedqithUndersacore.txt',
            'nested/private/_files.txt',
    		'phpFiles.php'
    	);

    	foreach ($paths as $path) {
    		$this->shouldNotBeSupported($path);
    	}
    }
}
