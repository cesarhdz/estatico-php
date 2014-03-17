<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Estatico\Documento\FileFormat;
use Estatico\Documento\PageFormat;

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

    function it_test_file_existence(){
    	$this->initialize('file');

    	$this->setUri('robots.txt');
    	$this->exists()->shouldReturn(true);

    	$this->setUri('doesnt-exists.txt');
    	$this->exists()->shouldReturn(false);
    }

    function it_test_page_existence(){
    	$this->initialize('page', new PageFormat);

    	$this->setUri('about.html');
    	$this->exists()->shouldReturn(true);

    	$this->setUri('404.html');
    	$this->exists()->shouldReturn(false);
    }


    function it_includes_privates_files_based_on_include_private_value(){
    	$this->initialize('file');

        $this->setUri('_private_file.txt');
        $this->exists()->shouldReturn(false);

        $this->allowPrivateFiles(true);
        $this->exists()->shouldReturn(true);
    }




    /** -----------------------------------------
     *   Helpers...
     --------------------------------------------- */
    function initialize($dir = 'file', $format = null){
    	$dir = get_example_dir('documento/' . $dir);
    	$format = $format ?: new FileFormat;
    	$this->beConstructedWith($format, $dir);
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
