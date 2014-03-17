<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Estatico\Documento\FileFormat;

require __DIR__ . '/../../helpers.php';


class DocumentFinderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
    	$this->initialize();
        $this->shouldHaveType('Estatico\Documento\DocumentFinder');
    }


    function it_sets_dir_and_adds_trailing_slash(){
    	$this->initialize('noSlash');
    	$this->getDir()->shouldBeString();
    	$this->getDir()->shouldEndsWith('noSlash/');
    }


    function initialize($dir = ''){
    	$dir = get_example_dir($dir);
    	$this->beConstructedWith(new FileFormat, $dir);
    }


    function getMatchers(){
    	return [
    		// see http://stackoverflow.com/a/10473026/915034
    		'endsWith' => function($haystack, $needle){
    			return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
    		}
    	];
    }
}
