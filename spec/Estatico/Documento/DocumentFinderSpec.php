<?php

namespace Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

require __DIR__ . '/../../helpers.php';


class DocumentFinderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
    	$this->initialize();
        $this->shouldHaveType('Estatico\Documento\DocumentFinder');
    }


    function initialize($dir = ''){
    	$dir = get_example_dir($dir);
    	$this->beConstructedWith(new FileFormat, $dir);
    }
}
