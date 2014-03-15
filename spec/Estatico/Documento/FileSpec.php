<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileSpec extends ObjectBehavior
{
    function it_is_initializable(){
        $this->shouldHaveType('Estatico\Documento\File');
        $this->shouldImplement('Estatico\Documento\DocumentFormat');
    }

    function it_can_support_almost_any_file_type_because_is_the_default_format(){

    	$paths = array(
    		'style.css',
    		'main.js',
    		'robots.txt',
    		'noExtension'
    	);

    	foreach ($paths as $path) {
    		$file = new \SplFileInfo($path);
    		$this->shouldBeSupported($file);

    		echo "\t * $path\n";
    	}
    }
}
