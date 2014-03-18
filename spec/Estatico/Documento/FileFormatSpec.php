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

    function it_supports_almost_any_file_type_because_is_the_default_format(){

    	$paths = array(
    		'vendor/assets/bundle/css/style.css',
    		'_request_starting_with_underscores.txt',
            'javascript/main.js',
            'robots.txt',
            '.htaccess'
        );

        foreach ($paths as $path) {
            // var_dump($path);
            $this->shouldBeSupported($path);
        }
    }

    function it_doesnt_support_dirs(){
        $this->shouldNotBeSupported('/');
        $this->shouldNotBeSupported('/bundle/collection/');
    }


    function it_doesnt_support_certain_files(){
        $paths = array(
    		'phpFiles.php'
    	);

    	foreach ($paths as $path) {
    		$this->shouldNotBeSupported($path);
    	}
    }
}
