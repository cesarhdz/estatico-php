<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

require __DIR__ . '/../../helpers.php';

class FileSpec extends ObjectBehavior
{
    function it_is_initializable(){
        $this->shouldHaveType('Estatico\Documento\File');
        $this->shouldImplement('Estatico\Documento\DocumentFormat');
    }

    function it_can_support_almost_any_file_type_because_is_the_default_format(){

    	$paths = array(
    		'vendor/assets/bundle/css/style.css',
    		'javascript/main.js',
    		'robots.txt',
            '.htaccess'
    	);

    	echo "\n";

    	foreach ($paths as $path) {
    		$this->shouldBeSupported($path);

    		echo "\t * $path\n";
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
    		echo "\t * $path\n";
    		$this->shouldNotBeSupported($path);

    	}
    }


    function it_should_test_file_existance(){

        $this->setDir(get_example_dir('documento/file/'));

        $filepath = 'robots.txt';
        $this->exists($filepath)->shouldReturn(true);
    }
}
