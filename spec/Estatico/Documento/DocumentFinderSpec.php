<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Estatico\Documento\Format\FileFormat;
use Estatico\Documento\Format\PageFormat;

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


    function it_includes_privates_files_based_on_include_private_files_value(){
    	$this->initialize('file');

        $this->setUri('_private_file.txt');
        
        $this->allowPrivateFiles(false);
        $this->exists()->shouldReturn(true);


        $this->allowPrivateFiles(true);
        $this->exists()->shouldReturn(false);

    }


    function it_should_read_all_files_in_a_gievn_dir(){
        $this->initialize('page', new PageFormat);

        $result = $this->getWrappedObject()->all();

        // var_dump($result);

        foreach($result as $page){
            $msg = 'After PageFormat:all() the result set must contain only Pages';
            assertInstanceOf('Estatico\Documento\Page', $page, $msg);
        }        

        $this->all()->shouldHaveCount(3);

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
